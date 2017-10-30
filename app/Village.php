<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kamil
 * Date: 30.10.2017
 * Time: 18:34
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Village extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'res_condition', 'army_condition', 'workers_condition',
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}