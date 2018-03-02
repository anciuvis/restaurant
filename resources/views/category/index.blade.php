@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, tastas lygu slashui -->
@section('content')
<div class="container">
	<div class="mb-3">
		<a href="{{ route('home') }}" class="mx-2"><button class="btn btn-danger">Back</button></a>
		@auth
		<a href="{{ route('categories.create') }}" class="mx-2"><button class="btn btn-success" type="button" name="create">Create New category</button></a>
		@endif
	</div>
	<table class="table table-hover table-dark">
		<thead>
			<tr>
				<th scope="col">#ID</th>
				<th scope="col">Category name</th>
				<th scope="col">Product count</th>
				<th scope="col">Created</th>
				<th scope="col">Updated</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categories as $category)
			<tr>
				<th scope="row">{{ $category->id }}</th>
				<td>{{ $category->title }}</td>
				<td>{{ $category->products() }}</td>
				<td>{{ $category->created_at }}</td>
				<td>{{ $category->updated_at }}</td>
				<td><a href="{{ route('categories.show', $category->id) }}" class="btn btn-info py-1" name="read">Read more</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
