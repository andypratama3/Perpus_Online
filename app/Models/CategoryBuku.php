<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryBuku extends Model
{
    use UsesUuid;
    use NameHasSlug;
    use HasFactory;
    protected $tables = 'category_bukus';
    protected $fillable = [
        'name',
        'slug',
    ];
    protected $dates = ['deleted_at'];


    public function bukus(): BelongsToMany
    {
        return $this->belongsToMany(Buku::class, 'bukus_categorys');
    }
}
