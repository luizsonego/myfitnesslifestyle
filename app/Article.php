<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
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
    protected $fillable = ['slug','images','name','title','summary','content','category_id','author_id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the category for the article.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the author for the article.
     */
    public function author()
    {
        return $this->belongsTo('App\Author');
    }

   /**
    * Get the images for the article
    *
    * @param json
    * @return Images in an array
    */
    public function getImagesAttribute($value)
    {
	return json_decode($value);
    }

    /**
     * Set images for the article
     *
     * @param array
     * @return json
     */
     public function setImagesAttribute($images)
     {
	$this->attributes['images'] = json_encode($images);
     }

}
