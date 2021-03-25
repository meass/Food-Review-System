@extends ('layouts.master')

@section ('page-title')
	 Add New Food | {{ $shop->name }}
@endsection

@section ('content')
<div class="container form-page">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1>Add New Food</h1>
		</div>

		<div class="panel-body">
			<form method="POST" action="{{ route('food.store', $shop) }}">
				{{csrf_field()}}

				<div class="form-group">
					<label for="name">Food Name *</label>
					<input class="form-control" type="text" id="name" name="name" required>
				</div>

				<div class="form-group">
					<label for="size">Size *</label>
					<select class="form-control" type="text" id="size" name="size" required>
						<option disabled selected>Choose one</option>
						<option>Small</option>
						<option>Medium</option>
						<option>Large</option>
					</select>
				 </div>

				<div class="form-group">
					<label for="price">Price *</label>
					<input class="form-control" type="text" id="price" name="price" required>
				</div>

				<div class="form-group">
					<label for="taste">Taste</label>
					<input class="form-control" type="text" id="taste" name="taste" required>
				</div>

				<hr>

				<div class="pull-right">
					<input class="btn btn-primary" type="submit" value="Create">
					<a class="btn btn-default" href="{{ route('food.index', $shop) }}">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
