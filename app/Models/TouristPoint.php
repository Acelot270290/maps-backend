<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristPoint extends Model
{
    use HasFactory;

    protected $table = 'tourist_points';

    protected $fillable = [
        'uid',
        'author',
        'latitude',
        'longitude',
        'descricao'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $dateFormat = 'Y-m-d H:i:s';

    public function setCreatedAt($value)
    {
        $this->attributes['created_at'] = \Carbon\Carbon::parse($value)->format($this->dateFormat);
    }

    public function setUpdatedAt($value)
    {
        $this->attributes['updated_at'] = \Carbon\Carbon::parse($value)->format($this->dateFormat);
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d\TH:i:sP');
    }

    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d\TH:i:sP');
    }
}
