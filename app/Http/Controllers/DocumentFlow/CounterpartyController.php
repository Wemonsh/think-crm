<?php

namespace App\Http\Controllers\DocumentFlow;

use App\Http\Controllers\Controller;
use App\Models\DocumentFlow\Counterparty;
use App\Repository\DocumentFlow\CounterpartyRepositoryInterface;
use Illuminate\Http\Request;

class CounterpartyController extends Controller
{
    private $counterpartyRepository;

    public function __construct(CounterpartyRepositoryInterface $counterpartyRepository)
    {
        $this->counterpartyRepository = $counterpartyRepository;
    }

    public function response(Request $request) {
        $data = $this->counterpartyRepository->paginate($request->toArray());
        return response()->json([
            'rows' => $data['data'],
            'total' => $data['total']
        ],'200');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modules.document_flow.counterparty.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.document_flow.counterparty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->counterpartyRepository->create($request->toArray());

        return redirect()->route('counterparty.show', $data->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocumentFlow\Counterparty  $counterparty
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, int $id)
    {
        $data = $this->counterpartyRepository->findById($id);

        return view('modules.document_flow.counterparty.show', ['counterparty' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocumentFlow\Counterparty  $counterparty
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, int $id)
    {
        $data = $this->counterpartyRepository->findById($id);

        return view('modules.document_flow.counterparty.edit', ['counterparty' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DocumentFlow\Counterparty  $counterparty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $data = $this->counterpartyRepository->update($id, $request->toArray());

        return redirect()->route('counterparty.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocumentFlow\Counterparty  $counterparty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $id)
    {
        $data = $this->counterpartyRepository->deleteById($id);
        return redirect()->route('counterparty.index');
    }
}
