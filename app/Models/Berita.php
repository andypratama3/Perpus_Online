<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\UsesUuid;
use App\Http\Traits\NameHasSlug;
class Berita extends Model
{
    use HasFactory;
    use UsesUuid;
    use NameHasSlug;

    protected $tables = 'beritas';

    protected $fillable = [
        'name',
        'body',
        'foto',
        'slug',
    ];
}
