<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Result
 * @package App\Models
 * @version April 27, 2020, 8:54 am UTC
 *
 * @property \App\Models\User $winner
 * @property \App\Models\Quiz $quiz
 * @property integer $winner_id
 * @property integer $quiz_id
 * @property integer $prize
 * @property number $paid
 */
class Result extends Model
{
    public $table = 'results';
    
    public $fillable = [
        'winner_id',
        'quiz_id',
        'prize',
        'paid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'winner_id' => 'integer',
        'quiz_id' => 'integer',
        'prize' => 'integer',
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
    public function winner()
    {
        return $this->belongsTo(\App\Models\User::class, 'winner_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function quiz()
    {
        return $this->belongsTo(\App\Models\Quiz::class, 'quiz_id', 'id');
    }
}
