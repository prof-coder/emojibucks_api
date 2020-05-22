<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Quiz
 * @package App\Models
 * @version April 27, 2020, 8:45 am UTC
 *
 * @property string $name
 * @property string $open_time
 * @property string $close_time
 * @property number $takings
 */
class Quiz extends Model
{

    public $table = 'quizzes';

    public $fillable = [
        'name',
        'open_time',
        'close_time',
        'takings'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'open_time' => 'datetime',
        'close_time' => 'datetime',
        'takings' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    protected $dateFormat = 'U';

    
}
