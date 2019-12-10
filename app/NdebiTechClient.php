<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NdebiTechClient extends Model
{
    use SoftDeletes;
    protected $fillable = ['logo','name'];


    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";

        if ( ! is_null($this->logo))
        {
            $directory = config('cms.image.directory');
            $imagePath = public_path() . "/{$directory}/" . $this->logo;
            if (file_exists($imagePath)) $imageUrl = asset("{$directory}/" . $this->logo);
        }

        return $imageUrl;
    }


    public function getImageThumbUrlAttribute($value)
    {
        $imageUrl = "";

        if ( ! is_null($this->logo))
        {
            $directory = config('cms.image.directory');
            $ext       = substr(strrchr($this->logo, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->logo);
            $imagePath = public_path() . "/{$directory}/" . $thumbnail;
            if (file_exists($imagePath)) $imageUrl = asset("{$directory}/" . $thumbnail);
        }

        return $imageUrl;
    }

}
