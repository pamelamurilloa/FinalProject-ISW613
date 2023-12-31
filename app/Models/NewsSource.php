<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsSource extends Model
{
    use HasFactory;

    protected $table = 'news_sources';
    protected $primaryKey = 'id';

    protected $fillable = [
        'url',
        'name',
        'category_id',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
