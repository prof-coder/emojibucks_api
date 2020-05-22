<?php

namespace App\Repositories;

use App\Models\Played;
use App\Repositories\BaseRepository;

/**
 * Class PlayedRepository
 * @package App\Repositories
 * @version April 27, 2020, 8:45 am UTC
*/

class PlayedRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'start_time',
        'end_time',
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
        return Played::class;
    }
}
