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


    /**
     * Get the buku that owns the View
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'viewable_id', 'id');
    }


    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
