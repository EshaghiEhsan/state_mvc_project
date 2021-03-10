<?php

namespace App;

use System\Database\ORM\Model;
use System\Database\Traits\HasSoftDelete;

class Post extends Model
{

    use HasSoftDelete;
    protected $table = "posts";
    protected $fillable = ['title','body','image','status','user_id','published_at','cat_id'];
    protected $deletedAt = 'deleted_at';
    protected $casts=['image'=>'array'];

    public function category(){
        return $this->belongsTo('\App\Categore','cat_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }


}