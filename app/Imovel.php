<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
	protected $fillable = ['user_id','nome','tipo'];
	protected $guarded = ['id', 'created_at', 'update_at'];
	protected $table = 'imoveis';
}
