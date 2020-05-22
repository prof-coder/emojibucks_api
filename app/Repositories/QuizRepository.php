<?php

namespace App\Repositories;

use App\Models\Quiz;
use App\Repositories\BaseRepository;

/**
 * Class QuizRepository
 * @package App\Repositories
 * @version April 27, 2020, 8:45 am UTC
*/

class QuizRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'open_time',
        'close_time',
        'takings'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Quiz::class;
    }
}
