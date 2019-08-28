<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ConfiguracaoRepository;
use App\Entities\Configuracao;
use App\Validators\ConfiguracaoValidator;

/**
 * Class ConfiguracaoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ConfiguracaoRepositoryEloquent extends BaseRepository implements ConfiguracaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Configuracao::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ConfiguracaoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
