<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostCategory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title', 'decription', 'image'];

    protected $searchableFields = ['*'];

    protected $table = 'post_categories';

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}