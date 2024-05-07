<?php
namespace App\Actions\Dashboard\Buku;

use App\Models\Buku;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ActionBuku
{
    public function execute($BukuData)
    {
        $old_buku = Buku::where('slug', $BukuData->slug)->first();
        if($file_buku = $BukuData->buku)
        {
            $ext = $file_buku->getClientOriginalExtension();

            $upload_path = public_path('storage/buku/');
            $file_name = 'Buku'.Str::slug($BukuData->name).'_'.date('YmdHis').".$ext";
            $file_buku->move($upload_path, $file_name);
        }else{
            $file_name = $old_buku->buku;
        }
        // Handle cover images
        if ($BukuData->cover) {
            $coverFiles = $BukuData->cover;
            $coverFileNames = [];

            foreach ($coverFiles as $coverFile) {
                $ext = $coverFile->getClientOriginalExtension();
                $upload_path = public_path('storage/buku/cover/');
                $file_name_cover = 'Cover' . Str::slug($BukuData->name) . '_' . date('YmdHis') . ".$ext";
                $coverFile->move($upload_path, $file_name_cover);
                $coverFileNames[] = $file_name_cover;
            }
        }else{
            $coverFileNames[] = $old_buku->cover;
        }

        $role_id = implode(',' , $BukuData->role_id);
        
        //get Auth ID
        $buku = Buku::updateOrCreate(
            ['slug' => $BukuData->slug],
            [
                'name' => $BukuData->name,
                'description' => $BukuData->description,
                'penerbit' => $BukuData->penerbit,
                'tahun_terbit' => $BukuData->tahun_terbit,
                'penulis' => $BukuData->penulis,
                'seri_buku' => $BukuData->seri_buku,
                'cover' => implode(',', $coverFileNames),
                'role_id' => $role_id,
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
