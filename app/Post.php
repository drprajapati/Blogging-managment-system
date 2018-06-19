<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title','contents', 'category_id','featured','slug'
    ];
    protected $dates = ['deleted_at'];

    public function getFeaturedAttribute($featured){
        return asset($featured);
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }

}
