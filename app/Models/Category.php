<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Queue\SerializesModels;

class Category extends Model
{
    use HasFactory;
    use Sluggable;
    use SerializesModels;


    protected $fillable = ['title','slug'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
}
