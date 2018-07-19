@extends('welcome')
@section('content')
<div class="card d-inline-block" style="width: 18rem; margin-top: 10px">
	{{json_encode($document->getDirty())}}
  <div class="card-body">
    <h5 class="card-title">{{$document->title}}</h5>
    <p class="card-text">{{$document->body}} <a href="{{route('edit',['id'=>$document->id])}}"><i class="fa fa-edit"></i></a></p>
    <p class="card-text"><a href="{{route('history',['id'=>$document->id])}}">История изменений</a></p>
    <ul>
    	@forelse($document->users as $updatorDocument)
    	<li>@updatedPivot($updatorDocument)</li>
    	@empty
    	<li>Нет изменений у записи</li>
    	@endforelse
    </ul>
    <p class="card-text">@updatedPivot($document->creatorDocument())</p>
  </div>
</div>
@endsection