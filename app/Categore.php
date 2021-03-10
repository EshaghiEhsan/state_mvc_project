<?php

namespace App;

use System\Database\ORM\Model;
use System\Database\Traits\HasSoftDelete;

class Categore extends Model
{

    use HasSoftDelete;
    protected $table = "categories";
    protected $fillable = ['name','parent_id'];
    protected $deletedAt = 'deleted_at';

   public function parent(){
        return $this->belongsTo('App\Categore','parent_id','id');
   }


}