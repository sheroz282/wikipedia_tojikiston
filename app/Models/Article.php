<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $table = 'articles';

    protected $fillable = [
        'title',
        'img',
        'description',
        'status',
        'created_by',
        'category_id',
        'updated_by',
        'deleted_by',
        'deleted_at'
    ];

    public function category()
    {
        return $this->hasOne(Category::class,'id');
    }
}
