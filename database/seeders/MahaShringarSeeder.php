<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MahaShringarSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();
        Product::truncate();
        Banner::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Categories
        $catDresses = Category::create(['name' => 'Laddu Gopal Dresses', 'slug' => 'laddu-gopal-dresses', 'image' => 'mahashringar_assets/Premium-Flower-Multicolor-Laddu-Gopal-Dress.webp', 'is_active' => 1]);
        $catOrnaments = Category::create(['name' => 'Ornaments', 'slug' => 'ornaments', 'image' => 'mahashringar_assets/laddu-gopal-blue-stone-designer-earrings.webp', 'is_active' => 1]);
        $catAccessories = Category::create(['name' => 'Accessories', 'slug' => 'accessories', 'image' => 'mahashringar_assets/Laddu-Gopal-Bansuri.webp', 'is_active' => 1]);

        $products = [
            [
                'name' => 'Premium Flower Multicolor Laddu Gopal Dress',
                'img' => 'mahashringar_assets/Premium-Flower-Multicolor-Laddu-Gopal-Dress.webp',
                'price' => 299.00,
                'discount' => 199.00,
                'cat' => $catDresses->id,
                'is_featured' => 1,
                'is_bestseller' => 1
            ],
            [
                'name' => 'Blue Stone Designer Earrings for Kanha Ji',
                'img' => 'mahashringar_assets/laddu-gopal-blue-stone-designer-earrings.webp',
                'price' => 150.00,
                'discount' => 99.00,
                'cat' => $catOrnaments->id,
                'is_featured' => 1,
                'is_bestseller' => 0
            ],
            [
                'name' => 'Heavy Blue Designer Dress (Size 2-5)',
                'img' => 'mahashringar_assets/laddu-gopal-designer-dress-heavy-blue-front-view-size-2-4-5.webp',
                'price' => 399.00,
                'discount' => 299.00,
                'cat' => $catDresses->id,
                'is_featured' => 1,
                'is_bestseller' => 1
            ],
            [
                'name' => 'Floral Designer Stone Stud Earrings',
                'img' => 'mahashringar_assets/Laddu-Gopal-Earrings-Floral-Designer-Stone-Stud-Earrings-for-Kanha-Ji.webp',
                'price' => 120.00,
                'discount' => 79.00,
                'cat' => $catOrnaments->id,
                'is_featured' => 0,
                'is_bestseller' => 1
            ],
            [
                'name' => 'Pink Summer Cotton Dress',
                'img' => 'mahashringar_assets/laddu-gopal-summer-cotton-dress-pink-front.webp',
                'price' => 199.00,
                'discount' => 149.00,
                'cat' => $catDresses->id,
                'is_featured' => 0,
                'is_bestseller' => 1
            ],
            [
                'name' => 'Radhe Krishna Bansuri (Flute)',
                'img' => 'mahashringar_assets/Mahashringar-Radhe-Krishna-Bansuri-for-Laddu-Gopal-Kanha-Ji-Thakur-Ji-Radhe-Naam-Flute-Size-0-1.webp',
                'price' => 89.00,
                'discount' => null,
                'cat' => $catAccessories->id,
                'is_featured' => 1,
                'is_bestseller' => 1
            ],
            [
                'name' => 'Multicolor Cotton Laddu Gopal Poshak',
                'img' => 'mahashringar_assets/multicolor-cotton-laddu-gopal-poshak.webp',
                'price' => 249.00,
                'discount' => 189.00,
                'cat' => $catDresses->id,
                'is_featured' => 0,
                'is_bestseller' => 0
            ],
            [
                'name' => 'Pink Summer Dress',
                'img' => 'mahashringar_assets/pink-laddu-gopal-summer-dress-front.webp',
                'price' => 180.00,
                'discount' => 140.00,
                'cat' => $catDresses->id,
                'is_featured' => 1,
                'is_bestseller' => 0
            ],
            [
                'name' => 'Red & Purple Poshak',
                'img' => 'mahashringar_assets/red-purple-laddu-gopal-dress-front-view.webp',
                'price' => 210.00,
                'discount' => 160.00,
                'cat' => $catDresses->id,
                'is_featured' => 0,
                'is_bestseller' => 1
            ],
            [
                'name' => 'Red Velvet Winter Dress',
                'img' => 'mahashringar_assets/red-velvet-laddu-gopal-dress-front.webp',
                'price' => 350.00,
                'discount' => 280.00,
                'cat' => $catDresses->id,
                'is_featured' => 1,
                'is_bestseller' => 1
            ],
            [
                'name' => 'Royal Blue Butterfly Summer Dress',
                'img' => 'mahashringar_assets/royal-blue-butterfly-laddu-gopal-summer-dress.webp',
                'price' => 220.00,
                'discount' => 170.00,
                'cat' => $catDresses->id,
                'is_featured' => 1,
                'is_bestseller' => 0
            ],
            [
                'name' => 'Sky Blue Butterfly Dress',
                'img' => 'mahashringar_assets/sky-blue-butterfly-laddu-gopal-summer-dress.webp',
                'price' => 220.00,
                'discount' => null,
                'cat' => $catDresses->id,
                'is_featured' => 0,
                'is_bestseller' => 1
            ],
            [
                'name' => 'Sky Blue Summer Dress',
                'img' => 'mahashringar_assets/sky-blue-laddu-gopal-summer-dress-1.webp',
                'price' => 190.00,
                'discount' => 145.00,
                'cat' => $catDresses->id,
                'is_featured' => 0,
                'is_bestseller' => 1
            ],
            [
                'name' => 'Traditional Bandhani Dress with Safa',
                'img' => 'mahashringar_assets/Traditional-Bandhani-Laddu-Gopal-Dress-with-Matching-Safa---Multicolor-Cotton-Poshak.webp',
                'price' => 280.00,
                'discount' => 220.00,
                'cat' => $catDresses->id,
                'is_featured' => 1,
                'is_bestseller' => 1
            ],
            [
                'name' => 'Yellow Floral Cotton Summer Poshak',
                'img' => 'mahashringar_assets/Yellow-Floral-Cotton-Laddu-Gopal-Dress---Designer-Summer-Poshak.webp',
                'price' => 230.00,
                'discount' => 175.00,
                'cat' => $catDresses->id,
                'is_featured' => 1,
                'is_bestseller' => 0
            ],
            [
                'name' => 'Yellow & Pink Cotton Dress',
                'img' => 'mahashringar_assets/yellow-pink-laddu-gopal-dress-front.webp',
                'price' => 199.00,
                'discount' => 159.00,
                'cat' => $catDresses->id,
                'is_featured' => 0,
                'is_bestseller' => 1
            ],
        ];

        foreach ($products as $p) {
            Product::create([
                'category_id' => $p['cat'],
                'name' => $p['name'],
                'slug' => Str::slug($p['name']) . '-' . rand(100,999),
                'price' => $p['price'],
                'sale_price' => $p['discount'],
                'quantity' => rand(10, 50),
                'is_active' => 1,
                'is_featured' => $p['is_featured'],
                'is_bestseller' => $p['is_bestseller'],
                'description' => 'Beautiful ' . $p['name'] . ' for your Kanha Ji. Perfect for daily wear and festivals.',
                'sku' => strtoupper(Str::random(6)),
                'weight' => 0.1,
                'length' => 10,
                'width' => 10,
                'height' => 5,
                'images' => json_encode([$p['img']])
            ]);
        }
    }
}
