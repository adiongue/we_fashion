<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

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
            
            // Associate this product to the category got
            $product->category()->associate($category);

            if ($category->name === 'homme') {
                $files = Storage::allFiles('hommes');
            } else {
                $files = Storage::allFiles('femmes');
            }
            
            $fileIndex = array_rand($files);
            $file = $files[$fileIndex];
            $filename = basename($file);
            $product->picture()->create([
                'title' => $filename,
                'link' => $file
            ]);

            $product->save();
        });
    }
}
