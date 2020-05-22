<?php

namespace App\Repositories;

use App\Models\Answer;
use App\Repositories\BaseRepository;

/**
 * Class AnswerRepository
 * @package App\Repositories
 * @version April 27, 2020, 8:51 am UTC
*/

class AnswerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'answer',
        'time'
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
        return Answer::class;
    }
}
