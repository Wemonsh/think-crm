<?php

namespace App\Http\Controllers;

use App\Repository\DocumentFlow\DocumentCorrespondentRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DocumentCorrespondentController extends Controller
{
    private $correspondentRepository;

    /**
     * DocumentCorrespondentController constructor.
     * @param DocumentCorrespondentRepositoryInterface $correspondentRepository
     */
    public function __construct(DocumentCorrespondentRepositoryInterface $correspondentRepository)
    {
        $this->correspondentRepository = $correspondentRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function response(Request $request) {
        $data = $this->correspondentRepository->paginate($request->toArray());
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
        return view('modules.document_flow.correspondent.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('modules.document_flow.correspondent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $this->correspondentRepository->create($request->toArray());

        return redirect()->route('correspondent.show', $data->id);
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
        $data = $this->correspondentRepository->findById($id);

        return view('modules.document_flow.correspondent.show', ['correspondent' => $data]);
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
        $data = $this->correspondentRepository->findById($id);

        return view('modules.document_flow.correspondent.edit', ['correspondent' => $data]);
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
        $data = $this->correspondentRepository->update($id, $request->toArray());

        return redirect()->route('correspondent.show', $id);
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
        $data = $this->correspondentRepository->deleteById($id);

        return redirect()->route('correspondent.index');
    }
}
