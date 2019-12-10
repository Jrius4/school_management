<?php

namespace App;

use App\Career;
use Illuminate\Database\Eloquent\Model;

class CareerCategory extends Model
{
    protected $fillable=['title','slug','description'];

    public function careers()
    {
        return $this->hasMany(Career::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
