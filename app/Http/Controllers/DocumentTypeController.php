<?php

namespace App\Http\Controllers;

use App\Repository\DocumentFlow\DocumentTypeRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DocumentTypeController extends Controller
{
    private $typeRepository;

    /**
     * DocumentCorrespondentController constructor.
     * @param DocumentTypeRepositoryInterface $typeRepository
     */
    public function __construct(DocumentTypeRepositoryInterface $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function response(Request $request) {
        $data = $this->typeRepository->paginate($request->toArray());
        return response()->json([
            'rows' => $data['data'],
            'total' => $data['total']
        ],'200');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        return view('modules.document_flow.type.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('modules.document_flow.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $this->typeRepository->create($request->toArray());

        return redirect()->route('type.show', $data->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function show(Request $request, int $id)
    {
        $data = $this->typeRepository->findById($id);

        return view('modules.document_flow.type.show', ['type' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function edit(Request $request, int $id)
    {
        $data = $this->typeRepository->findById($id);

        return view('modules.document_flow.type.edit', ['type' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $data = $this->typeRepository->update($id, $request->toArray());

        return redirect()->route('type.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(Request $request, int $id)
    {
        $data = $this->typeRepository->deleteById($id);

        return redirect()->route('type.index');
    }
}
