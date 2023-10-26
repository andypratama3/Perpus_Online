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
        $file_name = 'Buku'.Str::slug($BukuData->name).'_'.date('YmdHis').".$ext";
        $file_buku->move($upload_path, $file_name);

        //get Auth ID
        $buku = Buku::updateOrCreate(
            ['slug' => $BukuData->slug],
            [
                'name' => $BukuData->name,
                'penerbit' => $BukuData->penerbit,
                'tahun_terbit' => $BukuData->tahun_terbit,
                'penulis' => $BukuData->penulis,
                'seri_buku' => $BukuData->seri_buku,
                'user_add' => Auth::id(),
                'buku' => $file_name,
            ]
        );
        if (empty($BukuData->slug)) {
            $buku->categoryBukus()->attach($BukuData->categoryBukus);
        } else {
            $buku->categoryBukus()->sync($BukuData->categoryBukus);
        }
    }
}
