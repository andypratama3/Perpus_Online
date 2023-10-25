<?php
namespace App\Actions\Dashboard\Buku;

use App\Models\Buku;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ActionBuku
{
    public function execute($BukuData)
    {
        $file_buku = $BukuData->buku;
        $ext = $file_buku->getClientOriginalExtension();


        $upload_path = public_path('storage/img/buku/');
        $picture_name = 'Buku'.Str::slug($BukuData->name).'_'.date('YmdHis').".$ext";
        $file_buku->move($upload_path, $picture_name);

        //get Auth ID
        $buku = Buku::updateOrCreate(
            ['slug' => $BukuData->slug],
            [
                'name' => $BukuData->name,
                'penerbit' => $BukuData->penerbit,
                'tahun_terbit' => $BukuData->tahun_terbit,
                'penulis' => $BukuData->penulis,
                'user_add' => Auth::id(),
                'buku' => $picture_name,
            ]
        );
        if (empty($BukuData->slug)) {
            $buku_category->category_bukus()->attach($BukuData->kategori_buku);
        } else {
            $buku_category->category_bukus()->sync($BukuData->kategori_buku);
        }
    }
}
