<article class="card my-1 mx-0 p-3">
	<div class="ard-block text-center shadow">
		<div class="img-card" style="height:300px;">
			<img src="https://loremflickr.com/320/240/kittens,kitten,cat" class="img-responsive" alt="picture" style="max-width: 100%; max-height: 100%; margin: 0 auto;"/>
		</div>
		<h2 class="card-text text-left">{{ $product->title }}</h2>
		<p class="card-text text-left p-1">Price:
			<span class="badge badge-pill badge-success px-2 py-1">{{ $product->price }}</span>
		</p>
		<p class="card-text text-left p-1">Quantity:
			<span class="badge badge-pill badge-info px-2 py-1">{{ $product->quantity }}</span>
		</p>
		<p class="card-text text-left p-1">Category:
			@if(isset($product->categories))
			<span class="badge badge-pill badge-warning px-2 py-1">{{ $product->categories->title }}</span>
			@endif
		</p>
		<p class="card-text text-left p-1">Manufacturer:
			<span class="badge badge-pill badge-secondary px-2 py-1">{{ $product->manufacturers->title }}</span>
		</p>
		<p class="card-text text-left p-1">
			{{ str_limit($product->description, 100) }}
		</p>
		<div class="btn-group" role="group">
			@if($admin == FALSE)
			<a href="{{ route('products.show', $product->id) }}" class="btn btn-primary" name="read">Read more</a>
			@else
			<a href="{{ route('products.edit', $product->id) }}" class="btn btn-success" name="edit">Edit</a>
			<form action="{{ route('products.destroy', $product->id) }}" method="POST">
				@csrf
				@method('DELETE')
				<button class="btn btn-warning" name="delete">Delete</button>
			</form>
			@endif
		</div>
	</div>
</article>
