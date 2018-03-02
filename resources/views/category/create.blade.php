@extends('layouts.app')
@section('content')
	<body>
		<div class="container w-75">
			<h2 class="text-center">Create new category form</h2>
			<form action="{{ route('categories.store') }}" method="POST" class="needs-validation">
				@csrf
				<div class="form-group">
					<label class="px-3" for="title">Title</label>
					<input name="title" type="text" class="form-control px-3 @if($errors->has('title')) is-invalid @endif" id="title" placeholder="Enter title" value="{{ old('title') }}">
					@if($errors->has('title'))
					<div class="invalid-feedback px-3">
						{{ $errors->first('title') }}
					</div>
					@endif
				</div>
				<button type="submit" class="btn btn-primary">Create</button>
			</form>
		</div>
	</body>
@endsection
