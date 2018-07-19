<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use App\StoreDocuments;
class DocumentController extends Controller
{
    protected $store;
    public function __construct(StoreDocuments $store)
    {
        $this->middleware('auth');
        $this->store = $store;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('documents.index')->with('documents',$this->store->all(['paginate'=>3]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
       $this->store->create();
       return redirect()->route('documents');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
       return view('documents.show')->with('document',$document);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('documents.edit')->with('document',$document);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Document $document)
    {
        $this->store->update($document);
        return redirect()->route('showDocument',['id'=>$document->id]);
    }

    public function history(Document $document)
    {
        $history = $this->store->showDocumentHistory($document);
        foreach ($history as $adjustments) {
          return   $adjustments->pivot->before."<br>".$adjustments->pivot->after;
             
         } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
