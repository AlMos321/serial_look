<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use DB;


class Epizod extends Model implements SluggableInterface
{
    use SluggableTrait;

    public $table = "epizodes";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'date_start',
        'images',
        'directed',
        'production',
        'producer',
        'running_time',
        'season_id',
        'serial_id',
        'number',
        'user_id'
    ];


    protected $sluggable = [
        'build_from' => ['name'],
        'save_to' => 'slug',
    ];

    public function season()
    {
        $this->numberValidation();
        return $this->belongsTo('App\Season');
    }

    public function serial()
    {
        return $this->belongsTo('App\Serial');
    }


    /**
     * Validation rules
     */
    public static $rules = array(
        'name' => 'required',
        'description' => 'required',
        'season_id' => 'required',
        'date_start' => 'required|date',
        'number' => 'required|integer',
    );

    /*
    * Unique number for current season_id
    */
    private function numberValidation()
    {
        if (isset($_POST['season'])) {
            static::$rules['number'] = 'required|integer|unique:epizodes,number,NULL,id,season_id,' . $_POST['season'];
        }
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $serial_id = DB::table('seasons')->select('serial_id')->where('id', '=', $post->season_id)->get();
            $post->serial_id = $serial_id[0]->serial_id;
            $post->user_id = Auth::user()->id;
        });
    }

}
