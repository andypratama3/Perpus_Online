<?php

namespace App\Models;

use App\Models\CategoryBuku;
use App\Http\Traits\UsesUuid;
use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;
    use UsesUuid;
    use NameHasSlug;
    protected $tables = 'bukus';
    protected $fillable = [
        'name',
        'penerbit',
        'tahun_terbit',
        'penulis',
        'seri_buku',
        'buku',
        'user_add',
        'slug',
    ];
    protected $dates = ['deleted_at'];


    public function categoryBukus()
    {
        return $this->belongsToMany(CategoryBuku::class, 'bukus_categorys');
    }
}
