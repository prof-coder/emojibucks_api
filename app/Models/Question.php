<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Question
 * @package App\Models
 * @version April 27, 2020, 8:48 am UTC
 *
 * @property integer $num
 * @property string $question
 * @property string $answer
 * @property string $search_terms
 */
class Question extends Model
{
    public $table = 'questions';
    public $timestamps = false;

    public $fillable = [
        'quiz_id',
        'num',
        'question',
        'answer',
        'search_terms',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'quiz_id' => 'integer',
        'num' => 'integer',
        'question' => 'string',
        'answer' => 'string',
        'search_terms' => 'string',
        'status' => 'boolean'
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
    public function quiz()
    {
        return $this->belongsTo(\App\Models\Quiz::class, 'quiz_id', 'id');
    }
    
}
