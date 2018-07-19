<?php

namespace App;

use App\Contracts\Store;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Document;
class StoreDocuments implements Store
{
    use ValidatesRequests;
    protected $request;
    public function __construct(Request $request,Document $document)
    {
        $this->request = $request;
        $this->document = $document;
    }

    public function all(array $settings =[]){
        if(!empty($settings) && array_key_exists('paginate',$settings)) return $this->document::paginate($settings['paginate']);
            return $this->document::all();
    }

    public function create()
    {
        $this->validateRequest()->createDocument();
    }

    public function update($model){

        $this->validateRequest()->save($model);
    }

    protected function createDocument()
    {
        $this->document->fill($this->inputFields())->save();
    }

    public function showDocumentHistory($model)
    {
        return $model->users;
    }


    protected function save($model)
    {
        $model->update($this->inputFields());
    }

    protected function validateRequest()
    {
        $this->validate($this->request,$this->rules);
        return $this;
    }

    private $rules = [

            'title'=>'string|required',
            'body'=>'string|required',
        ];

    private function inputFields()
    {
        $title = $this->request->title;
        $body = $this->request->body;
        return compact('title','body');
    }

    public function delete($model=null){}
}
