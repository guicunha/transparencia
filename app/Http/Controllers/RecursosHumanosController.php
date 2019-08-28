<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RecursosHumanosCreateRequest;
use App\Http\Requests\RecursosHumanosUpdateRequest;
use App\Repositories\RecursosHumanosRepository;
use App\Validators\RecursosHumanosValidator;

/**
 * Class RecursosHumanosController.
 *
 * @package namespace App\Http\Controllers;
 */
class RecursosHumanosController extends Controller
{
    /**
     * @var RecursosHumanosRepository
     */
    protected $repository;

    /**
     * @var RecursosHumanosValidator
     */
    protected $validator;

    /**
     * RecursosHumanosController constructor.
     *
     * @param RecursosHumanosRepository $repository
     * @param RecursosHumanosValidator $validator
     */
    public function __construct(RecursosHumanosRepository $repository, RecursosHumanosValidator $validator)
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
        $recursosHumanos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $recursosHumanos,
            ]);
        }

        return view('recursosHumanos.index', compact('recursosHumanos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RecursosHumanosCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(RecursosHumanosCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $recursosHumano = $this->repository->create($request->all());

            $response = [
                'message' => 'RecursosHumanos created.',
                'data'    => $recursosHumano->toArray(),
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
        $recursosHumano = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $recursosHumano,
            ]);
        }

        return view('recursosHumanos.show', compact('recursosHumano'));
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
        $recursosHumano = $this->repository->find($id);

        return view('recursosHumanos.edit', compact('recursosHumano'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RecursosHumanosUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(RecursosHumanosUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $recursosHumano = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'RecursosHumanos updated.',
                'data'    => $recursosHumano->toArray(),
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
                'message' => 'RecursosHumanos deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'RecursosHumanos deleted.');
    }
}
