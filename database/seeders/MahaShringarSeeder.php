<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;

class MahaShringarSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();
        Product::truncate();
        ProductImage::truncate();
        Banner::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $c1 = Category::create(['name'=>'Laddu Gopal Dresses', 'slug'=>'laddu-gopal-dresses', 'is_active'=>1]);
        $c2 = Category::create(['name'=>'Accessories', 'slug'=>'accessories', 'is_active'=>1]);
        $c3 = Category::create(['name'=>'Ornaments', 'slug'=>'ornaments', 'is_active'=>1]);

        $p1 = Product::create(['category_id'=>$c1->id,'name'=>'Pink Laddu Gopal Summer Dress','slug'=>'pink-laddu-gopal-summer-dress','price'=>150.00,'quantity'=>50,'is_active'=>1]);
        $p2 = Product::create(['category_id'=>$c1->id,'name'=>'Red Velvet Laddu Gopal Dress','slug'=>'red-velvet-laddu-gopal-dress','price'=>250.00,'quantity'=>30,'is_active'=>1]);
        $p3 = Product::create(['category_id'=>$c1->id,'name'=>'Sky Blue Laddu Gopal Summer Dress','slug'=>'sky-blue-laddu-gopal-summer-dress','price'=>180.00,'quantity'=>40,'is_active'=>1]);
        $p4 = Product::create(['category_id'=>$c3->id,'name'=>'Designer Mukut for Laddu Gopal','slug'=>'designer-mukut','price'=>120.00,'quantity'=>15,'is_active'=>1]);

        ProductImage::create(['product_id'=>$p1->id,'image_path'=>'images/pink-laddu-gopal-summer-dress-front.webp','is_primary'=>1]);
        ProductImage::create(['product_id'=>$p2->id,'image_path'=>'images/red-velvet-laddu-gopal-dress-front.webp','is_primary'=>1]);
        ProductImage::create(['product_id'=>$p3->id,'image_path'=>'images/sky-blue-laddu-gopal-summer-dress-1.webp','is_primary'=>1]);
        ProductImage::create(['product_id'=>$p4->id,'image_path'=>'images/mukut.webp','is_primary'=>1]);

        Banner::create(['title'=>'Janmashtami Special', 'image_path'=>'images/janmasthmi-banner.webp', 'link'=>'/shop', 'is_active'=>1]);
        Banner::create(['title'=>'Summer Collection', 'image_path'=>'images/summer.webp', 'link'=>'/shop', 'is_active'=>1]);
    }
}
