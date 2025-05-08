<?php

namespace App\Repositories\Global;
use Illuminate\Database\Eloquent\Model;

class ChangesStatusRepository

{
    public function changeStatus(Model $model): Model  
    {
       $changedStatus = $model->status_id == 1 ? 2 : 1;
        $model->status_id = $changedStatus;
        $model->save();

        return $model;
    }

}
