<?php
$file = 'resources/views/frontend/product.blade.php';
$content = file_get_contents($file);

$oldImagesBlock = <<<HTML
            @if(\$product->images && count(\$product->images) > 0)
            <div class="grid grid-cols-4 gap-4">
                @foreach(\$product->images as \$image)
                <div class="bg-white rounded-lg border border-gray-100 p-2 cursor-pointer hover:border-[#b71c1c]">
                    <img src="{{ asset(\$image->image_url) }}" alt="{{ \$product->name }}" class="w-full h-24 object-cover rounded">
                </div>
                @endforeach
            </div>
            @endif
HTML;

$newImagesBlock = <<<HTML
            @php
                \$allImages = \$product->all_image_urls ?? [];
            @endphp
            @if(count(\$allImages) > 1)
            <div class="grid grid-cols-4 gap-4 mt-4">
                @foreach(\$allImages as \$imgUrl)
                <div class="bg-white rounded-lg border border-gray-100 p-2 cursor-pointer hover:border-[#b71c1c]">
                    <img src="{{ \$imgUrl }}" alt="{{ \$product->name }}" class="w-full h-24 object-contain rounded">
                </div>
                @endforeach
            </div>
            @endif
HTML;

$content = str_replace($oldImagesBlock, $newImagesBlock, $content);
file_put_contents($file, $content);
echo "product.blade.php updated!\n";
