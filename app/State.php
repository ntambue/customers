<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class State extends Model
{
    use SoftDeletes;

    public $table = 'states';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'country',
        'name_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function nameCities()
    {
        return $this->hasMany(City::class, 'name_id', 'id');
    }

    public function name()
    {
        return $this->belongsTo(Country::class, 'name_id');
    }
}
