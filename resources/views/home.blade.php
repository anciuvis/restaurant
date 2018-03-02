@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, tastas lygu slashui -->
@section('content')
	<body>
		<div class="container">
			<form class="my-2 mx-2 inline-form" action="{{ route('home') }}" method="GET">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<label class="input-group-text" for="inputGroupSelect01">Category</label>
					</div>
					<select class="custom-select" id="inputGroupSelect01">
						<option selected>Choose...</option>
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->title }}</option>
						@endforeach
					</select>
					<button type="submit" class="btn btn-primary px-3 col-md-3">Filter</button>
				</div>
			</form>
			<div class="mb-3">
				{{-- @if(Auth:user()) --}}
				<!-- senesnis  -->
				@auth
				<a href="{{ route('products.create') }}" class="mx-2"><button class="btn btn-success" type="button" name="create">Create New product</button></a>
				@endif
				<a href="{{ route('categories.index') }}" class="mx-2"><button class="btn btn-warning" type="button" name="show">Show all categories</button></a>
			</div>
			<section>
				<div class="row justify-content-center">
					@foreach($products as $product)
					{{-- dd($product->categories) --}}

						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
							@component('components/card', ['product'=>$product, 'admin' => FALSE])
							@endcomponent
						</div>
					@endforeach
				</div>
			</section>
		</div>
	</body>
@endsection
