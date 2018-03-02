@extends('layouts.app')
@section('content')
	<body>
		<div class="container">
			<section>
				<div class="row justify-content-center">
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="my-1 mx-1">
							<h4>Category title</h4>
						</div>
						<div class="my-3 mx-1">
							{{ $category->title }}
						</div>
						<div class="btn-group" role="group">
							<a href="{{ route('categories.store') }}" class="btn btn-danger">Back</a>
							@auth
							<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success" name="edit">Edit</a>
							<form action="{{ route('categories.destroy', $category->id) }}" onclick="submit" method="POST" class="btn btn-warning">
								@csrf
								@method('DELETE')
								<button type='submit' class='border-0 p-0 m-0 d-inline bg-transparent'>Delete</button>
							</form>
							@endif
						</div>
					</div>
				</div>
			</section>
		</div>
	</body>
@endsection
