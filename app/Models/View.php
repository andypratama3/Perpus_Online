<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\UsesUuid;

class View extends Model
{
    use HasFactory, UsesUuid;

    protected $table = 'views';

    protected $guarded = [];
}
