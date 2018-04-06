<?php
namespace Model;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Model\Traits\ModelEventLogger;

class BaseModel extends EloquentModel {
    use SoftDeletes, ModelEventLogger;
}
