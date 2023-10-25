<?php

namespace App\Actions\Dashboard\Buku;

use App\Models\Buku;

class ActionDeleteBuku
{
    public function execute($slug)
    {
        $buku = Buku::where('slug', $slug)->firstOrFail();
        $buku->delete();
    }

}
