<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ConfiguracaoCreateRequest;
use App\Http\Requests\ConfiguracaoUpdateRequest;
use App\Repositories\ConfiguracaoRepository;
use App\Validators\ConfiguracaoValidator;

/**
 * Class ConfiguracaosController.
 *
 * @package namespace App\Http\Controllers;
 */
class ConfiguracaosController extends Controller
{
    /**
     * @var ConfiguracaoRepository
     */
    protected $repository;

    /**
     * @var ConfiguracaoValidator
     */
    protected $validator;

    /**
     * ConfiguracaosController constructor.
     *
     * @param ConfiguracaoRepository $repository
     * @param ConfiguracaoValidator $validator
     */
    public function __construct(ConfiguracaoRepository $repository, ConfiguracaoValidator $validator)
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
        $configuracaos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $configuracaos,
            ]);
        }

        return view('configuracaos.index', compact('configuracaos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ConfiguracaoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ConfiguracaoCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $configuracao = $this->repository->create($request->all());

            $response = [
                'message' => 'Configuracao created.',
                'data'    => $configuracao->toArray(),
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
        $configuracao = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $configuracao,
            ]);
        }

        return view('configuracaos.show', compact('configuracao'));
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
        $configuracao = $this->repository->find($id);

        return view('configuracaos.edit', compact('configuracao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ConfiguracaoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ConfiguracaoUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $configuracao = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Configuracao updated.',
                'data'    => $configuracao->toArray(),
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
                'message' => 'Configuracao deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Configuracao deleted.');
    }
}
