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
        $this->journalRepository->create($request->toArray());

        return redirect()->route('journal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Journal $journal
     * @return Response
     */
    public function show(Journal $journal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Journal $journal
     * @return Response
     */
    public function edit(Journal $journal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Journal $journal
     * @return Response
     */
    public function update(Request $request, Journal $journal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Journal $journal
     * @return Response
     */
    public function destroy(Journal $journal)
    {
        //
    }
}
