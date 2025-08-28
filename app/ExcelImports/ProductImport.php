<?php

namespace App\ExcelImports;

use App\Helpers\FileHelper;
use App\Model\Admin\Category;
use App\Model\Admin\Origin;
use App\Model\Admin\Product;
use App\Model\Admin\ProductGallery;
use DateTime;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Model\Common\File as FileModel;
use Illuminate\Support\Facades\Auth;

class ProductImport implements ToCollection, WithStartRow, WithMultipleSheets
{
    private $import_rows = 0;
    private $skip_rows = 0;
    private $invalid_rows = [];

    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            $errors = [];
            if (empty($row[1]) || empty($row[3]) || empty($row[0])) {
                $this->skip_rows++;
                continue;
            }
            $product_name = trim($row[0]);
            $slug = trim($row[1]);
            $id = trim($row[3]);
            $body = trim($row[4]);
            $intro = $row[5];
            $sku = $row[12];
            $base_price = $row[16];
            $price = $row[17];
            $string_images = $row[22];
            $origin_link = trim($row[24]);
            $string_category = trim($row[29]);

            preg_match('/https?:\/\/\S+\.(jpg|jpeg|png|gif)/i', $string_images, $matches);
            $images = [$matches[0] ?? null];

            $cate_parts = explode(">", $string_category);
            // Lấy phần tử cuối cùng và trim bỏ khoảng trắng
            $cate_name = trim(end($cate_parts));
            $arr = [382,383,384,385,386,387,388,389,390,391,392,393,394,395,396,397,398,399,400,401,402,403,404];
            if (in_array($index, $arr)) {
                $firstPart = explode('|', $cate_name)[0];
                $cate_name = $firstPart;
            }

            $cate = Category::query()->where('name', $cate_name)->first();
            if (!$cate) {
                $this->invalid_rows[] = $index;
                $this->skip_rows++;
                continue;
            }

            $product = Product::query()->where('id', $id)->first();
            if ($product) {
                $product->name = $product_name;
                $product->slug = $slug;
                $product->sku = $sku;
                $product->base_price = intval($base_price) ?? 0;
                $product->price = intval($price) ?? 0;
                $product->intro = $intro;
                $product->body = $body;
                $product->cate_id = $cate->id;
                $product->origin_link = $origin_link;
                $product->status = Product::STATUS_SUCCESS;
                $product->state = Product::CON_HANG;
                $product->save();
            } else {
                $product = new Product();
                $product->id = $id;
                $product->name = $product_name;
                $product->slug = $slug;
                $product->sku = $sku;
                $product->base_price = intval($base_price) ?? 0;
                $product->price = intval($price) ?? 0;
                $product->intro = $intro;
                $product->body = $body;
                $product->cate_id = $cate->id;
                $product->origin_link = $origin_link;
                $product->status = Product::STATUS_SUCCESS;
                $product->state = Product::CON_HANG;
                $product->save();

                if (count($images)) {
                    if ($product->image) {
                        FileHelper::forceDeleteFiles($product->image->id, $product->id, Product::class, 'image');
                    }
                    if (isset($product->galleries)) {
                        foreach ($product->galleries as $gallery) {
                            if ($gallery->image) {
                                FileHelper::forceDeleteFiles($gallery->image->id, $gallery->id, ProductGallery::class, null);
                                $gallery->image->removeFromDB();
                            }
                            $gallery->removeFromDB();
                        }
                    }
                    $image_file_data = $this->downloadImage(trim($images[0]), 'products');
                    if ($image_file_data) {
                        $image_file_data['model_id'] = $product->id;
                        $image_file_data['model_type'] = Product::class;
                        $image_file_data['custom_field'] = 'image';
                        $product_image = new FileModel($image_file_data);
                        $product_image->save();
                    }
                    for ($i = 1; $i < count($images); $i++) {
                        $gallery = new ProductGallery();
                        $gallery->product_id = $product->id;
                        $gallery->sort = $i;
                        $gallery->save();
                        $gallery_image_data = $this->downloadImage(trim($images[$i]), 'product_gallery');
                        if ($gallery_image_data) {
                            $gallery_image_data['model_id'] = $gallery->id;
                            $gallery_image_data['model_type'] = ProductGallery::class;
                            $gallery_image_data['custom_field'] = null;
                            $gallery_image = new FileModel($gallery_image_data);
                            $gallery_image->save();
                        }
                    }
                }
            }
            $this->import_rows++;
        }
    }

    public function downloadImage($url, $folder)
    {

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $contents = curl_exec($ch);
        curl_close($ch);

        if (!$contents) {
            return null;
        }

        $name = basename(parse_url($url, PHP_URL_PATH)); // Lấy tên file từ URL

        // Chuẩn hóa tên file để tránh lỗi encoding
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $base = pathinfo($name, PATHINFO_FILENAME);

        // Đổi tên file an toàn (loại bỏ ký tự đặc biệt)
        $safeName = Str::slug($base) . '.' . $ext;

        $uploadPath = public_path('uploads/' . $folder);

        // Tạo thư mục nếu chưa tồn tại
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        $path = $uploadPath . '/' . $safeName;

        File::put($path, $contents); // Lưu ảnh vào thư mục uploads

        $file_data = [
            'name' => $safeName,
            'path' => '/uploads/' . $folder . '/' . $safeName,
        ];

        return $file_data;
    }

    public function startRow(): int
    {
        return 2;
    }

    public function sheets(): array
    {
        return [
            0 => $this,
        ];
    }

    public function getImportCount(): int
    {
        return $this->import_rows;
    }

    public function getSkipCount(): int
    {
        return $this->skip_rows;
    }

    public function getInvalidRow()
    {
        return $this->invalid_rows;
    }
}
