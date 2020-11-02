<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
	protected $guarded = [];

	public function getUrlAttribute($value)
    {
        return 'storage/'.$value;
    }
    public function getRealPathAttribute()
    {
    	$photoPath = str_replace('storage/','',$this->url);
    	return $photoPath;
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($photo){
            Storage::disk('public')->delete($photo->real_path);
        });
    }
}
