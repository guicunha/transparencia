<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DocumentoRepository;
use App\Entities\Documento;
use App\Validators\DocumentoValidator;

/**
 * Class DocumentoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DocumentoRepositoryEloquent extends BaseRepository implements DocumentoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Documento::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return DocumentoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
