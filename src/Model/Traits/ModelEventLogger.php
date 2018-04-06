<?php
namespace Model\Traits;

use Model\Logs;
use Illuminate\Database\Eloquent\Model;

trait ModelEventLogger {

    protected static function bootModelEventLogger()
    {
        $events = ['created','updated','deleted'];
        foreach ($events as $eventName) {
            static::$eventName(function (Model $model) use ($eventName) {
                try {

                    $logs = new Logs;
                    $logs->user_id = (isset($_SESSION['user']) ? $_SESSION['user']['id'] : null);
                    $logs->owner_type = get_class($model);
                    $logs->owner_id = $model->id;
                    $logs->type = static::getActionName($eventName);
                    $logs->old_value = json_encode($model->getDirty());
                    $logs->new_value = json_encode($model->getOriginal());
                    $logs->created_at = date("Y-m-d H:i:s");

                    return $logs->save();
                    
                } catch (\Exception $e) {
                    return true;
                }
            });
        }

    }

    protected static function getActionName($event)
    {
        switch (strtolower($event)) {
            case 'created':
                return 'create';
                break;
            case 'updated':
                return 'update';
                break;
            case 'deleted':
                return 'delete';
                break;
            default:
                return 'unknown';
        }
    }
} 