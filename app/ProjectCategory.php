<?php

namespace App;

use App\Project;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected $fillable = ['title','slug','description'];

    public function projects(){
        return $this->hasMany(Project::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
