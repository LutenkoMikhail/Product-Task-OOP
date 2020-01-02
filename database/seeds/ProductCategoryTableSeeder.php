<?php

use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idProduct = \App\Product::all('id')->toArray();
        $idCategory = \App\Category::all('id')->toArray();

        foreach ($idProduct as $index => $item) {
            mt_srand(time() * 100000);
            shuffle($idCategory);
            $maxCategory = mt_rand(2, count($idCategory) - 1);

            for ($i = 0; $i < $maxCategory; $i++) {
                factory(\App\ProductCategory::class)
                    ->create(['product_id' => $item['id'], 'category_id' => $idCategory[$i]['id']]);
            }
        }
    }
}
