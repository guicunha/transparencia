<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\DespesaCreateRequest;
use App\Http\Requests\DespesaUpdateRequest;
use App\Repositories\DespesaRepository;
use App\Validators\DespesaValidator;

/**
 * Class DespesasController.
 *
 * @package namespace App\Http\Controllers;
 */
class DespesasController extends Controller
{
    /**
     * @var DespesaRepository
     */
    protected $repository;

    /**
     * @var DespesaValidator
     */
    protected $validator;

    /**
     * DespesasController constructor.
     *
     * @param DespesaRepository $repository
     * @param DespesaValidator $validator
     */
    public function __construct(DespesaRepository $repository, DespesaValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $despesas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $despesas,
            ]);
        }

        return view('despesas.index', compact('despesas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DespesaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(DespesaCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $despesa = $this->repository->create($request->all());

            $response = [
                'message' => 'Despesa created.',
                'data'    => $despesa->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $despesa = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $despesa,
            ]);
        }

        return view('despesas.show', compact('despesa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $despesa = $this->repository->find($id);

        return view('despesas.edit', compact('despesa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DespesaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(DespesaUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $despesa = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Despesa updated.',
                'data'    => $despesa->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Despesa deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Despesa deleted.');
    }
}
