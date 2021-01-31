<?php

namespace App\Http\Controllers\DocumentFlow;

use App\Http\Controllers\Controller;
use App\Models\DocumentFlow\Journal;
use App\Repository\DocumentFlow\JournalRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JournalController extends Controller
{
    private $journalRepository;

    public function __construct(JournalRepositoryInterface $journalRepository)
    {
        $this->journalRepository = $journalRepository;
    }

    public function response(Request $request) {
        $data = $this->journalRepository->paginate($request->toArray());
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
        return view('modules.document_flow.journal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('modules.document_flow.journal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $this->journalRepository->create($request->toArray());

        return redirect()->route('journal.show', $data->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Journal $journal
     * @return Response
     */
    public function show(Request $request, int $id)
    {
        $data = $this->journalRepository->findById($id);

        return view('modules.document_flow.journal.show', ['journal' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Journal $journal
     * @return Response
     */
    public function edit(Request $request, int $id)
    {
        $data = $this->journalRepository->findById($id);

        return view('modules.document_flow.journal.edit', ['journal' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Journal $journal
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        $data = $this->journalRepository->update($id, $request->toArray());

        return redirect()->route('journal.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Journal $journal
     * @return Response
     */
    public function destroy(Request $request, int $id)
    {
        $data = $this->journalRepository->deleteById($id);
        return redirect()->route('journal.index');
    }
}
