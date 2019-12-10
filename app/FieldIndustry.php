<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\SoftDeletes;

class FieldIndustry extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','slug','description'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getDescriptionHtmlAttribute($value)
    {
        return $this->description ? Markdown::convertToHtml(e($this->description)) : NULL;
    }


}
