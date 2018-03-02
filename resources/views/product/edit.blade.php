@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, taskas lygu slashui -->
@section('content')
	<body>
		<div class="container w-75">
			<h2 class="text-center">Update product form</h2>
			 <!-- norint patikrinti koki errora meta, pvz validacija: -->
			{{-- dd($errors) --}}
			<form action="{{ route('products.update', $product->id) }}" method="POST" class="needs-validation">
				<!-- create token, security feature - be jo nepraleis postu laravel -->
				{{-- csrf_field --}}
				@csrf
				@method('PUT')
				<!-- arba taip: -->
				{{-- method_field('PUT') --}}
				<div class="form-group">
					<label class="px-3" for="title">Title</label>
					<input name="title" type="text" class="form-control px-3 @if($errors->has('title')) is-invalid @endif" id="title" placeholder="Enter title" value="{{ old('title', $product->title) }}">
					@if($errors->has('title'))
					<div class="invalid-feedback px-3">
						{{ $errors->first('title') }}
					</div>
					@endif
				</div>
				<div class="form-group d-flex justify-content-around">
					<input name="quantity" type="number" class="form-control px-3 @if($errors->has('quantity')) is-invalid @endif" id="quantity" placeholder="Quantity" value="{{ old('quantity', $product->quantity) }}">
					@if($errors->has('quantity'))
					<div class="invalid-feedback px-3">
						{{ $errors->first('quantity') }}
					</div>
					@endif
					<input name="price" type="number" step="0.01" class="form-control px-3 @if($errors->has('price')) is-invalid @endif" id="price" placeholder="Price"  value="{{ old('price', $product->price) }}">
					@if($errors->has('price'))
					<div class="invalid-feedback px-3">
						{{ $errors->first('price') }}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label class="px-3" for="description">Description</label>
					<textarea name="description" class="form-control @if($errors->has('description')) is-invalid @endif" id="description" rows="3" placeholder="Description">{{ old('description', $product->description) }}</textarea>
					@if($errors->has('description'))
					<div class="invalid-feedback px-3">
						{{ $errors->first('description') }}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label class="px-3" for="category">Category</label>
					<select name="category" class="form-control px-3 @if($errors->has('category')) is-invalid @endif" id="category">
						<option value="">Choose...</option>
							@foreach ($categories as $category)
							<option value="{{ $category->id }}"
								@if($category->id == old('category', $product->category)) selected @endif>
								{{ $category->title }}
							</option>
							@endforeach
					</select>
					@if($errors->has('category'))
					<div class="invalid-feedback px-3">
						{{ $errors->first('category') }}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label class="px-3" for="manufacturer">Manufacturer</label>
					<select name="manufacturer" class="form-control @if($errors->has('manufacturer')) is-invalid @endif" id="manufacturer">
						<option value="">Choose...</option>
						@foreach ($manufacturers as $manufacturer)
							<option value="{{ $manufacturer->id }}"
								@if($manufacturer->id == old('manufacturer', $product->manufacturer)) selected @endif>
								{{ $manufacturer->title }}
							</option>
						@endforeach
					</select>
					@if($errors->has('manufacturer'))
					<div class="invalid-feedback px-3">
						{{ $errors->first('manufacturer') }}
					</div>
					@endif
				</div>
				<button type="submit" class="btn btn-primary">Update</button>
			</form>
		</div>
	</body>
@endsection
