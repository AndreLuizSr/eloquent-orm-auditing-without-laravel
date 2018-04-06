<?php
namespace Model;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Logs extends EloquentModel {
	protected $table = 'logs';
	public $timestamps = false;

}