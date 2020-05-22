<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Played
 * @package App\Models
 * @version April 27, 2020, 8:45 am UTC
 *
 * @property \App\Models\User $user
 * @property \App\Models\Quiz $quiz
 * @property integer $user_id
 * @property integer $quiz_id
 * @property time $time
 * @property number $paid
 */
class Played extends Model
{
    public $table = 'playeds';

    public $timestamps = false;

    public $fillable = [
        'user_id',
        'quiz_id',
        'paid',
        'start_time',
        'end_time',
        'score'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'quiz_id' => 'integer',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'paid' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function quiz()
    {
        return $this->belongsTo(\App\Models\Quiz::class, 'quiz_id', 'id');
    }
}
