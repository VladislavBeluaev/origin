@extends('welcome')

@section('content')
@auth
<div class="alert alert-success">
  <strong>Success!</strong> {{ auth()->user()->username}}
</div>
@else
<div class="alert alert-warning">
  <strong>Warning!</strong>Нет прав для просмотра
</div>
@endauth
@endsection