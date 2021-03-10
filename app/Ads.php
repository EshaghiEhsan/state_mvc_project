<?php

namespace App;

use System\Database\ORM\Model;
use System\Database\Traits\HasSoftDelete;

class Ads extends Model
{
    use HasSoftDelete;

    protected $table = "ads";
    protected $fillable = ['title','description','address','amount','image','floor','year','storeroom','balcony','area','room','toilet','parking','tag','user_id','cat_id','type','view','status','sell_status'];
    protected $deletedAt = 'deleted_at';
    protected $casts=['image'=>'array'];


    public function galleries(){
        return $this->hasMany('\App\Gallery','advertise_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }


    public function category(){
        return $this->belongsTo(Categore::class,'cat_id','id');
    }

    public function sellStatus(){
        return ($this->sell_status==0)? 'اجاره':'خرید';
    }

    public function type(){
        switch ($this->type){
            case 0:
                return 'اپارتمان';

            case 1:
                return 'ویلایی';

            case 2:
                return 'زمین';

            case 3:
                return 'سوله';
        }


    }

}
