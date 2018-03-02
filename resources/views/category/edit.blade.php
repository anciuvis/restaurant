@extends('layouts.app')
@section('content')
	<body>
		<div class="container w-75">
			<h2 class="text-center">Update product form</h2>
			<form action="{{ route('categories.update', $category->id) }}" method="POST" class="needs-validation">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label class="px-3" for="title">Title</label>
					<input name="title" type="text" class="form-control px-3 @if($errors->has('title')) is-invalid @endif" id="title" placeholder="Enter title" value="{{ old('title', $category->title) }}">
					@if($errors->has('title'))
					<div class="invalid-feedback px-3">
						{{ $errors->first('title') }}
					</div>
					@endif
				</div>
				<button type="submit" class="btn btn-primary">Update</button>
			</form>
		</div>
	</body>
@endsection
