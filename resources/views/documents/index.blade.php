@extends('welcome')
@section('content')
@forelse($documents as $document)
<div class="card d-inline-block" style="width: 18rem; margin-top: 10px">
  <div class="card-body">
    <h5 class="card-title">{{$document->title}}</h5>
    <p class="card-text">{{$document->body}} <a href="{{route('showDocument',['id'=>$document->id])}}">...</a></p>
  </div>
</div>
@empty
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Нет документов для просмотра</h5>
  </div>
</div>
@endforelse
{{$documents->links()}}
@endsection