<?php

namespace App\Actions\Dashboard\CategoryBuku;

use App\Models\CategoryBuku;



class ActionDeleteCategoryBuku
{
    public function execute($slug)
    {
        $categoryBuku = CategoryBuku::where('slug', $slug)->firstOrFail();
        $categoryBuku->delete();
    }

}
