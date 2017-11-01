<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kamil
 * Date: 30.10.2017
 * Time: 18:33
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'market_id', 'amount'
    ];

    public function market()
    {
        return $this->belongsTo('App\Market');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}