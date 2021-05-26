<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create two categories, male and female
        App\Category::create(['name' => "homme"]);
        App\Category::create(['name' => "femme"]);

        factory(App\Product::class, 80)->create()->each(function($product) {
            // Get a random category
            $category = App\Category::find(rand(1,2));
            print($category);
            
            // Associate this product to the category got
            $product->category()->associate($category);

            $product->save();
        });
    }
}
