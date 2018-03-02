@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, tastas lygu slashui -->
@section('content')
<div class="container">
	<table class="table table-hover table-dark">
		<thead>
			<tr>
				<th scope="col">#ID</th>
				<th scope="col">Category name</th>
				<th scope="col">Created</th>
				<th scope="col">Updated</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categories as $category)
			<tr>
				<th scope="row">{{ $category->id }}</th>
				<td>{{ $category->title }}</td>
				<td>{{ $category->created_at }}</td>
				<td>{{ $category->updated_at }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
