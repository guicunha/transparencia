<?php


namespace App\Services;


use App\Repositories\DocumentoRepository;
use App\Validators\DocumentoValidator;

class DocumentoService
{

    /**
     * @var DocumentoRepository
     */
    private $repository;
    /**
     * @var DocumentoValidator
     */
    private $validator;

    public function __construct(DocumentoRepository $repository, DocumentoValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function index()
    {
        return $this->repository->paginate(50);
    }

}
