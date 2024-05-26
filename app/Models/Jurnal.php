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

    protected $dates = ['deleted_at'];

    public function jurnals_category()
    {
        return $this->belongsToMany(CategoryBuku::class, 'jurnal_categorys');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_add');
    }
    public function view()
    {
        return $this->belongsTo(View::class, 'viewable_id', 'id');
    }
}
