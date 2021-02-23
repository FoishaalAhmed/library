@if (count($errors) > 0)
	 @foreach ($errors->all() as $error)
	  <p class="alert alert-error">{{$error}}</p> 
	 @endforeach
@endif