<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $table = 'categories';

    protected $fillable = [
        'title',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
        'deleted_at',
        'created_at'
    ];

    public function articles()
    {
        return $this->hasMany(Article::class,'category_id',);
    }
}
