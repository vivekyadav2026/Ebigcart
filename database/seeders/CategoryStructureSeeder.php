<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $structure = [
            [
                'name' => 'Laddu Gopal',
                'slug' => 'laddu-gopal',
                'children' => [
                    [
                        'name' => 'Dresses',
                        'slug' => 'laddu-gopal-dresses',
                        'children' => [
                            ['name' => 'Designer Dresses', 'slug' => 'laddu-gopal-designer-dresses'],
                            ['name' => 'Summer Dresses', 'slug' => 'laddu-gopal-summer-dresses'],
                            ['name' => 'Winter Dresses', 'slug' => 'laddu-gopal-winter-dresses'],
                            ['name' => 'Phool Kurta', 'slug' => 'laddu-gopal-phool-kurta'],
                        ]
                    ],
                    [
                        'name' => 'Ornaments',
                        'slug' => 'laddu-gopal-ornaments',
                        'children' => [
                            ['name' => 'Mukut', 'slug' => 'laddu-gopal-mukut'],
                            ['name' => 'Earrings', 'slug' => 'laddu-gopal-earrings'],
                            ['name' => 'Kangan', 'slug' => 'laddu-gopal-kangan'],
                            ['name' => 'Mala', 'slug' => 'laddu-gopal-mala'],
                            ['name' => 'Tilak', 'slug' => 'laddu-gopal-tilak'],
                            ['name' => 'Nupur / Payal', 'slug' => 'laddu-gopal-nupur-payal'],
                        ]
                    ],
                    [
                        'name' => 'Accessories',
                        'slug' => 'laddu-gopal-accessories',
                        'children' => [
                            ['name' => 'Bansuri', 'slug' => 'laddu-gopal-bansuri-acc'],
                            ['name' => 'Toys', 'slug' => 'laddu-gopal-toys'],
                            ['name' => 'Asan', 'slug' => 'laddu-gopal-asan'],
                            ['name' => 'Netra', 'slug' => 'laddu-gopal-netra'],
                            ['name' => 'Chowki', 'slug' => 'laddu-gopal-chowki'],
                            ['name' => 'Singhasana', 'slug' => 'laddu-gopal-singhasana'],
                            ['name' => 'Crown Set', 'slug' => 'laddu-gopal-crown-set'],
                        ]
                    ],
                    [
                        'name' => 'Pooja Items',
                        'slug' => 'laddu-gopal-pooja-items',
                        'children' => [
                            ['name' => 'Pooja Diya', 'slug' => 'laddu-gopal-pooja-diya'],
                            ['name' => 'Pooja Bell', 'slug' => 'laddu-gopal-pooja-bell'],
                            ['name' => 'Pooja Kalash', 'slug' => 'laddu-gopal-pooja-kalash'],
                        ]
                    ],
                    [
                        'name' => 'Bags',
                        'slug' => 'laddu-gopal-bags',
                    ],
                ]
            ],
            [
                'name' => 'Bansuri',
                'slug' => 'bansuri',
                'children' => [
                    ['name' => 'Krishna Bansuri', 'slug' => 'krishna-bansuri'],
                    ['name' => 'Laddu Gopal Bansuri', 'slug' => 'laddu-gopal-bansuri'],
                    ['name' => 'Decorative Bansuri', 'slug' => 'decorative-bansuri'],
                ]
            ],
            [
                'name' => 'Dresses',
                'slug' => 'dresses',
                'children' => [
                    ['name' => 'Designer Dresses', 'slug' => 'dresses-designer'],
                    ['name' => 'Summer Dresses', 'slug' => 'dresses-summer'],
                    ['name' => 'Winter Dresses', 'slug' => 'dresses-winter'],
                    ['name' => 'Kids / Baby Dresses', 'slug' => 'kids-baby-dresses'],
                    ['name' => 'Traditional Dresses', 'slug' => 'traditional-dresses'],
                ]
            ],
            [
                'name' => 'Quilts & Razai',
                'slug' => 'quilts-razai',
                'children' => [
                    ['name' => 'Quilts', 'slug' => 'quilts'],
                    ['name' => 'Razai', 'slug' => 'razai'],
                    ['name' => 'Baby Quilts', 'slug' => 'baby-quilts'],
                    ['name' => 'Decorative Quilts', 'slug' => 'decorative-quilts'],
                ]
            ],
            [
                'name' => 'Mukut & Payal',
                'slug' => 'mukut-payal',
                'children' => [
                    ['name' => 'Mukut', 'slug' => 'mukut'],
                    ['name' => 'Payal', 'slug' => 'payal'],
                    ['name' => 'Krishna Mukut', 'slug' => 'krishna-mukut'],
                    ['name' => 'Laddu Gopal Payal', 'slug' => 'laddu-gopal-payal'],
                ]
            ],
            [
                'name' => 'Pooja & Decoration',
                'slug' => 'pooja-decoration',
                'children' => [
                    ['name' => 'Pooja Diya', 'slug' => 'pooja-diya'],
                    ['name' => 'Pooja Bell', 'slug' => 'pooja-bell'],
                    ['name' => 'Pooja Kalash', 'slug' => 'pooja-kalash'],
                    ['name' => 'Chowki', 'slug' => 'chowki'],
                    ['name' => 'Singhasana', 'slug' => 'singhasana'],
                    ['name' => 'Decorative Items', 'slug' => 'decorative-items'],
                ]
            ],
            [
                'name' => 'Statues & Idols',
                'slug' => 'statues-idols',
                'children' => [
                    ['name' => 'Laddu Gopal', 'slug' => 'statues-laddu-gopal'],
                    ['name' => 'Bal Gopal', 'slug' => 'statues-bal-gopal'],
                    ['name' => 'Krishna Idols', 'slug' => 'krishna-idols'],
                    ['name' => 'Decorative Idols', 'slug' => 'decorative-idols'],
                ]
            ],
            [
                'name' => 'Japa Mala & Pooja',
                'slug' => 'japa-mala-pooja',
                'children' => [
                    ['name' => 'Japa Mala', 'slug' => 'japa-mala'],
                    ['name' => 'Pooja Accessories', 'slug' => 'pooja-accessories'],
                    ['name' => 'Pooja Bags', 'slug' => 'pooja-bags'],
                ]
            ],
        ];

        foreach ($structure as $parentData) {
            $parent = Category::updateOrCreate(
                ['slug' => $parentData['slug']],
                [
                    'name' => $parentData['name'],
                    'parent_id' => null,
                    'is_active' => true,
                ]
            );

            if (isset($parentData['children']) && is_array($parentData['children'])) {
                foreach ($parentData['children'] as $childData) {
                    $child = Category::updateOrCreate(
                        ['slug' => $childData['slug']],
                        [
                            'name' => $childData['name'],
                            'parent_id' => $parent->id,
                            'is_active' => true,
                        ]
                    );

                    if (isset($childData['children']) && is_array($childData['children'])) {
                        foreach ($childData['children'] as $subChildData) {
                            Category::updateOrCreate(
                                ['slug' => $subChildData['slug']],
                                [
                                    'name' => $subChildData['name'],
                                    'parent_id' => $child->id,
                                    'is_active' => true,
                                ]
                            );
                        }
                    }
                }
            }
        }

        // Clean up legacy categories if they exist
        $legacyOrnaments = Category::where('slug', 'ornaments')->whereNull('parent_id')->first();
        $newOrnaments = Category::where('slug', 'laddu-gopal-ornaments')->first();
        if ($legacyOrnaments && $newOrnaments) {
            \App\Models\Product::where('category_id', $legacyOrnaments->id)->update(['category_id' => $newOrnaments->id]);
            $legacyOrnaments->delete();
        }

        $legacyAccessories = Category::where('slug', 'accessories')->whereNull('parent_id')->first();
        $newAccessories = Category::where('slug', 'laddu-gopal-accessories')->first();
        if ($legacyAccessories && $newAccessories) {
            \App\Models\Product::where('category_id', $legacyAccessories->id)->update(['category_id' => $newAccessories->id]);
            $legacyAccessories->delete();
        }
    }
}
