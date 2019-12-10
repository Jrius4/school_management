<?php

namespace App;

use App\FieldIndustry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuoteRequest extends Model
{
    use SoftDeletes;
    protected $fillable = [
    'name',
    'email',
    'company',
    'telephone',
    'idea',
    'description',
    'budget',
    'time_done',
    'field_industry_id'];

    public function fieldIndustry()
    {
        return $this->belongsTo(FieldIndustry::class);
    }

}
