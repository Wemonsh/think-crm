<?php

namespace App\Http\Controllers;

use App\Repository\DocumentFlow\DocumentIncomingRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DocumentIncomingController extends Controller
{
    private $incomingRepository;

    /**
     * DocumentCorrespondentController constructor.
     * @param DocumentIncomingRepositoryInterface $incomingRepository
     */
    public function __construct(DocumentIncomingRepositoryInterface $incomingRepository)
    {
        $this->incomingRepository = $incomingRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function response(Request $request) {
        $data = $this->incomingRepository->paginate($request->toArray());
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
        return view('modules.document_flow.incoming.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('modules.document_flow.incoming.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $this->incomingRepository->create($request->toArray());

        return redirect()->route('incoming.show', $data->id);
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
        $data = $this->incomingRepository->findById($id);

        return view('modules.document_flow.incoming.show', ['incoming' => $data]);
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
        $data = $this->incomingRepository->findById($id);

        return view('modules.document_flow.incoming.edit', ['incoming' => $data]);
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
        $data = $this->incomingRepository->update($id, $request->toArray());

        return redirect()->route('incoming.show', $id);
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
        $data = $this->incomingRepository->deleteById($id);

        return redirect()->route('incoming.index');
    }
}
