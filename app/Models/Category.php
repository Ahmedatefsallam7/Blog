<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements TranslatableContract

{
    use HasFactory, Translatable, SoftDeletes;
    protected $table = 'categories';
    public $translatedAttributes = ['title', 'content'];
    protected $fillable = ['image', 'parent'];


    function parent()
    {
        return $this->belongsTo(Self::class, 'parent');
    }
    function child()
    {
        return $this->hasMany(Self::class, 'parent');
    }
    function post()
    {
        return $this->hasMany(Post::class);
    }
}