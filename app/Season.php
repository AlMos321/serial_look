<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Season extends Model implements SluggableInterface
{
    use SluggableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country',
        'count_epizodes',
        'date_start',
        'date_end',
        'description',
        'serial_id',
        'number'
    ];


    protected $sluggable = [
        'build_from' => ['serial.name', 'id'],
        'save_to' => 'slug',
    ];

    /**
     * Get epizodes for serial.
     */
    public function epizodes()
    {
        return $this->hasMany('App\Epizod');
    }

    public function serial()
    {
        $this->numberValidation();
        return $this->belongsTo('App\Serial');
    }

    /**
     * Validation rules
     */
    public static $rules = array(
        'country' => 'required',
        'description' => 'required',
        'date_start' => 'date',
        'date_end' => 'date|after:date_start',
        'serial_id' => 'required',
        'count_epizodes' => 'integer',
    );

    /*
     * Unique number for current serial_id
     */
    private function numberValidation()
    {
        if (isset($_POST['serial'])) {
            static::$rules['number'] = 'required|integer|unique:seasons,number,NULL,id,serial_id,' . $_POST['serial'];
        }
    }

}
