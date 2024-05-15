<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurnal extends Model
{
    use HasFactory;
    use UsesUuid;
    use NameHasSlug;
    protected $table = 'jurnals';

    protected $fillable = [
        'name',
        'jurnal',
        'user_add',
        'slug',
    ];

    public function incrementClickCount()
    {
        $this->jumlah_pengunjung++;
        $this->save();
    }


    public function jurnals_category()
    {
        return $this->belongsToMany(CategoryBuku::class, 'jurnal_categorys');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_add');
    }
}
