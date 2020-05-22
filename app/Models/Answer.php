<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Answer
 * @package App\Models
 * @version April 27, 2020, 8:51 am UTC
 *
 * @property \App\Models\User $user
 * @property \App\Models\Quiz $quiz
 * @property \App\Models\Question $question
 * @property integer $user_id
 * @property integer $quiz_id
 * @property integer $question_id
 * @property string $answer
 * @property time $time
 */
class Answer extends Model
{

    public $table = 'answers';

    public $fillable = [
        'user_id',
        'quiz_id',
        'question_id',
        'answer',
        'time'
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
        'question_id' => 'integer',
        'answer' => 'string'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function question()
    {
        return $this->belongsTo(\App\Models\Question::class, 'question_id', 'id');
    }
}
