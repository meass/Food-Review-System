@extends ('layouts.master')

@section ('page-title')
    Edit Shop | {{ $shop->name }}
@endsection

@section ('content')

<div class="container form-page">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Edit Shop</h1>
        </div>

        <div class="panel-body">
            <form method="POST" action="{{ route('shop.update', $shop) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Shop name *</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $shop->name }}" tabindex="1" required>
                </div>

                <div class="form-group">
                    <label for="category">Shop Category *</label>
                    <select class="form-control" id="category" name="category">
                        <option selected value="{{ $currentCategory->id }}">{{ $currentCategory->name }}</option>
						@foreach ($shopCategories as $shopCategory)
							<option value="{{ $shopCategory->id }}"> {{ $shopCategory->name }} </option>
						@endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Address *</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{ $shop->address }}" tabindex="3">
                </div>

                <div class="form-group">
                    <label for="province">Province *</label>
                    <select class="form-control" id="province" name="province">
                        <option selected value="{{ $currentProvince->id }}">{{ $currentProvince->name }}</option>
						@foreach ($provinces as $province)
							<option value="{{ $province->id }}"> {{ $province->name }} </option>
						@endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="phone">Phone *</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{ $shop->phone }}" tabindex="4">
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $shop->email }}" placeholder="someone@example.com" tabindex="5">
                </div>

                <div class="form-group">
                    <label for="website">Website *</label>
                    <input type="text" class="form-control" name="website" id="website" value="{{ $shop->website }}" tabindex="6">
                </div>

                <hr>

                <div class="pull-right">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('shop.show', $shop) }}" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
