<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use DB;

class Passenger extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'travel_id', 'user_id'
    ];




    public static function passengers  ($where) {
        return DB::table('passengers')
            ->where('user_id', $where)
        ->get();
    }
    
}
