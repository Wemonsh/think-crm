<?php

namespace App\Http\Controllers;

use App\Models\DocumentFlow\DocumentOutgoing;
use App\Repository\DocumentFlow\DocumentOutgoingRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DocumentOutgoingController extends Controller
{
    private $outgoingRepository;

    /**
     * DocumentCorrespondentController constructor.
     * @param DocumentOutgoingRepositoryInterface $outgoingRepository
     */
    public function __construct(DocumentOutgoingRepositoryInterface $outgoingRepository)
    {
        $this->outgoingRepository = $outgoingRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function response(Request $request) {
        $data = $this->outgoingRepository->paginate($request->toArray());
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
        return view('modules.document_flow.outgoing.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('modules.document_flow.outgoing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $this->outgoingRepository->create($request->toArray());

        return redirect()->route('outgoing.show', $data->id);
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
        $data = $this->outgoingRepository->findById($id);

        return view('modules.document_flow.outgoing.show', ['incoming' => $data]);
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
        $data = $this->outgoingRepository->findById($id);

        return view('modules.document_flow.outgoing.edit', ['incoming' => $data]);
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
        $data = $this->outgoingRepository->update($id, $request->toArray());

        return redirect()->route('outgoing.show', $id);
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
        $data = $this->outgoingRepository->deleteById($id);

        return redirect()->route('outgoing.index');
    }
}
