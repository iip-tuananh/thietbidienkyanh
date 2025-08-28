<?php

use App\Model\Common\File;
use Illuminate\Database\Seeder;


class TruncateCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            File::query()->where('model_type', 'App\Model\Admin\Category')->delete();
            File::query()->where('model_type', 'App\Model\Admin\Product')->delete();
            File::query()->where('model_type', 'App\Model\Admin\ProductGallery')->delete();
            DB::table('categories')->truncate();
            DB::table('product_galleries')->truncate();
            DB::table('products')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }
}
