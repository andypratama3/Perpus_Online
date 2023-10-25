<?php
namespace App\Actions\Dashboard\CategoryBuku;

use App\Models\CategoryBuku;
class ActionCategoryBuku
{
    public function execute($categoryBukuData)
    {
        $categoryBuku = CategoryBuku::updateOrCreate(
            ['slug' => $categoryBukuData->slug],
            [
                'name' => $categoryBukuData->name,
            ]
        );
        return $categoryBuku;
    }
}
