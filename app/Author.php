<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','first_name','last_name','avatar','description','slug'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get articles for the author.
     */
    public function articles()
    {
        return $this->hasMany('App\Articles');
    }
  
    /**
     * Get User
     *
     **/
     public function user() {
        return $this->belongsTo('App\User');
     }

}
