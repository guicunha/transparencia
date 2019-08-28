<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DespesaRepository;
use App\Entities\Despesa;
use App\Validators\DespesaValidator;

/**
 * Class DespesaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DespesaRepositoryEloquent extends BaseRepository implements DespesaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Despesa::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return DespesaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
