<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kamil
 * Date: 01.11.2017
 * Time: 13:02
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $table='market';

    public function resource()
    {
        return $this->hasMany('App\Resource');
    }

}