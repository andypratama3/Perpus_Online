<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuView extends Model
{
    use HasFactory;
    use UsesUuid;
    use NameHasSlug;
    protected $tables = 'buku_views';
    protected $fillable = [
        'name',
        'description',
        'penerbit',
        'tahun_terbit',
        'penulis',
        'seri_buku',
        'buku',
        'user_add',
        'cover',
        'slug',
    ];
}
