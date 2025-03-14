<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Topic extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "topic";
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
