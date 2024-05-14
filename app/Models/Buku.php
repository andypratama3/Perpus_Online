<?php

namespace App\Models;

use App\Models\User;
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
        'description',
        'penerbit',
        'tahun_terbit',
        'penulis',
        'seri_buku',
        'buku',
        'user_add',
        'role_id',
        'jumlah_pengunjung',
        'cover',
        'slug',
    ];
    protected $dates = ['deleted_at'];

    public function incrementClickCount()
    {
        $this->jumlah_pengunjung++;
        $this->save();
    }


    public function categoryBukus()
    {
        return $this->belongsToMany(CategoryBuku::class, 'bukus_categorys');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_add');
    }

    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

}
