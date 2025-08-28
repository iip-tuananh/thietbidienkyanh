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

class CategoryImport implements ToCollection, WithStartRow, WithMultipleSheets
{
    private $import_rows = 0;
    private $skip_rows = 0;
    private $invalid_rows = [];

    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            $errors = [];
            if (empty($row[1]) || empty($row[2])) {
                $this->skip_rows++;
                continue;
            }
            $id = trim($row[0]);
            $name = trim($row[1]);
            $slug = trim($row[2]);
            $content = trim($row[3]);
            $parent_id = trim($row[5]);
            $string_images = trim($row[6]);

            $images = explode(',', $string_images);
            $sort_order = 0;

            $category = Category::where('id', $id)->first();
            if (!$category) {
                if (!empty($id)) {
                    $category = new Category();
                    $category->id = $id;
                    $category->name = $name;
                    $category->type = 1;
                    $category->level = $parent_id ? 1 : 0;
                    $category->sort_order = 0;
                    $category->parent_id = $parent_id;
                    $category->intro = $content;
                    $category->slug = $slug;
                    $category->show_home_page = 1;
                    $category->save();


                    if (count($images)) {
                        if ($category->image) {
                            FileHelper::forceDeleteFiles($category->image->id, $category->id, Category::class, 'image');
                        }
                        $image_file_data = $this->downloadImage(trim($images[0]), 'categories');
                        if ($image_file_data) {
                            $image_file_data['model_id'] = $category->id;
                            $image_file_data['model_type'] = Category::class;
                            $image_file_data['custom_field'] = 'image';
                            $category_image = new FileModel($image_file_data);
                            $category_image->save();
                        }
                    }
                } else {
                    $errors[] = 'Danh mục không tồn tại';
                }
            } else {
                // Làm sạch content
                // $intro = trim($content, '"');
                // $category->intro = $intro;
                $category->slug = $slug;
                $category->save();
            }
            $this->import_rows++;
        }
    }

    public function downloadImage($url, $folder)
    {

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $contents = curl_exec($ch);
        curl_close($ch);

        if (!$contents) {
            return null;
        }

        $name = basename(parse_url($url, PHP_URL_PATH)); // Lấy tên file từ URL
        $path = public_path('uploads/' . $folder . '/' . $name);

        File::put($path, $contents); // Lưu ảnh vào thư mục uploads

        $file_data = [
            'name' => $name,
            'path' => '/uploads/' . $folder . '/' . $name,
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
