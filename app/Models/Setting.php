<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model implements TranslatableContract
{
    use HasFactory, Translatable, SoftDeletes;

    public $translatedAttributes = ['title', 'content', 'address'];
    protected $fillable = ['logo', 'favicon', 'facebook', 'instagram', 'phone', 'email'];

    static function checkSettings()
    {
        $settings = Self::all();

        if (count($settings) < 1) {

            $data = [
                'id' => 1,
            ];

            foreach (config('app.languages') as $key => $value) {
                $data[$key]['title'] = $value;
            }
            Self::create($data);
        } else {
            return Self::first();
        }
    }
}