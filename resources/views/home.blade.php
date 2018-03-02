@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, tastas lygu slashui -->
@section('content')
	<body>
		<div class="container">
			<div class="row">
				<a href="{{ route('products.create') }}" class="col-md-12 mb-3"><button class="btn btn-block btn-success" type="button" name="create">Create</button></a>
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
