@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, tastas lygu slashui -->
@section('content')
	<body>
		<div class="container">
			<section>
				<div class="row justify-content-center">
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
						@component('components/card', ['product'=>$product, 'admin' => TRUE])
						@endcomponent
					</div>
				</div>
			</section>
		</div>
	</body>
@endsection
