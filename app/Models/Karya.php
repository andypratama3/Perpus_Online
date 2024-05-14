<?php

namespace App\Models;
use Str;
use App\Http\Traits\UsesUuid;
// use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    use HasFactory;
    use UsesUuid;
    // use NameHasSlug;

    protected $table = 'karyas';

    protected $fillable = [
        'title',
        'abstrack',
        'file_karya',
        'status',
        'role_id',
        'cover_karya',
        'slug',
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function roles()
    {
        return $this->BelongsTo(Role::class, 'role_id', 'id');
    }

}
