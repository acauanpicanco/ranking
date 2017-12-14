<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    
	use SoftDeletes;

    protected $fillable = ['name', 'description', 'image', 'like', 'unlike'];

    protected $dates = ['deleted_at'];

    public function calcPercentage( $quant ){
    	return ($quant * 100) / ($this->like + $this->unlike);
    }

}
