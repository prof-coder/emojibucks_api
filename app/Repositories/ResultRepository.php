<?php

namespace App\Repositories;

use App\Models\Result;
use App\Repositories\BaseRepository;

/**
 * Class ResultRepository
 * @package App\Repositories
 * @version April 27, 2020, 8:54 am UTC
*/

class ResultRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'prize',
        'paid'
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
        return Result::class;
    }
}
