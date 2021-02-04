<?php

namespace App\Http\Controllers;

use App\Repository\DocumentFlow\DocumentImportanceRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DocumentImportanceController extends Controller
{
    private $importanceRepository;

    /**
     * DocumentCorrespondentController constructor.
     * @param DocumentImportanceRepositoryInterface $importanceRepository
     */
    public function __construct(DocumentImportanceRepositoryInterface $importanceRepository)
    {
        $this->importanceRepository = $importanceRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function response(Request $request) {
        $data = $this->importanceRepository->paginate($request->toArray());
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
        return view('modules.document_flow.importance.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('modules.document_flow.importance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $this->importanceRepository->create($request->toArray());

        return redirect()->route('importance.show', $data->id);
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
        $data = $this->importanceRepository->findById($id);

        return view('modules.document_flow.importance.show', ['importance' => $data]);
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
        $data = $this->importanceRepository->findById($id);

        return view('modules.document_flow.importance.edit', ['importance' => $data]);
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
        $data = $this->importanceRepository->update($id, $request->toArray());

        return redirect()->route('importance.show', $id);
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
        $data = $this->importanceRepository->deleteById($id);

        return redirect()->route('importance.index');
    }
}
