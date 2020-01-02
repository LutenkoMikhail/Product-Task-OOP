<?php

use Illuminate\Database\Seeder;

class ProductGalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idProducty = \App\Product::all('id')->toArray();

        foreach ($idProducty as $index => $item) {
            factory(\App\ProductGallery::class, rand(2, 6))->create(['product_id' => $item['id']]);
        }
    }
}
