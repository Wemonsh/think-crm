<?php

namespace App\Http\Controllers\DocumentFlow;

use App\Http\Controllers\Controller;
use App\Models\DocumentFlow\Document;
use App\Repository\DocumentFlow\DocumentRepositoryInterface;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    private $documentRepository;

    public function __construct(DocumentRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function response(Request $request) {
        $data = $this->documentRepository->paginate($request->toArray());
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
        return view('modules.document_flow.document.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.document_flow.document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->documentRepository->create($request->toArray());
        return redirect()->route('document.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocumentFlow\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, int $id)
    {
        $vars = [
            'document' => $this->documentRepository->findById($id)
        ];

        return view('modules.document_flow.document.show', $vars);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocumentFlow\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DocumentFlow\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocumentFlow\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }

    public function attach() {

    }
}
