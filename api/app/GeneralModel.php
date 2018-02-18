<?php

namespace App;

use Illuminate\Support\Facades\DB;

trait GeneralModel
{

    /**
     * Update by database id.
     *
     * @param mixed $id
     * @param array $options
     * @return void
     */
    public static function edit($id, array $options)
    {
        foreach ($options as $option => $value) {
            $entity{$option} = $value;
        }
        DB::table((new self)->getTable())->where('id', $id)->update($entity);        
    }

}
