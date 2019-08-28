<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RecursosHumanosRepository;
use App\Entities\RecursosHumanos;
use App\Validators\RecursosHumanosValidator;

/**
 * Class RecursosHumanosRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RecursosHumanosRepositoryEloquent extends BaseRepository implements RecursosHumanosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RecursosHumanos::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RecursosHumanosValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
