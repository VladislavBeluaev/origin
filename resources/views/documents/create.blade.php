@extends('welcome')
@section('content')
<form method="POST" action = "create">
	{{csrf_field()}}
	<div class="form-group">
	<label for="title">Заголовок</label>
    <textarea class="form-control" id="title" name = "title">{{old('title')}}</textarea>
    @if($errors->has('title'))
		<div class = "alert alert-danger" style="margin-top:10px;">{{$errors->first('title')}}</div>
		@endif
	</div>
	<div class="form-group">
	<label for="body">Текст</label>
    <textarea class="form-control" id="body" name = "body">{{old('body')}}</textarea>
     @if($errors->has('body'))
		<div class = "alert alert-danger" style="margin-top:10px;">{{$errors->first('body')}}</div>
		@endif
	</div>
	<button type="submit" class="btn btn-primary">Создать</button>	
</form>
@endsection