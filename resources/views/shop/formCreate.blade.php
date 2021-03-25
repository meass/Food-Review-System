@extends ('layouts.master')

@section ('page-title')
	 Create New Shop | {{ $user->name }}
@endsection

@section ('content')
<div class="container form-page">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Create New Shop</h1>
        </div>

        <div class="panel-body">
            <form method="POST" action="{{ route('shop.store', $user) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Shop Name *</label>
                    <input type="text" class="form-control" name="name" id="name" tabindex="1" required>
                </div>

                <div class="form-group">
                    <label for="category">Shop Category *</label>
                    <select class="form-control" id="category" name="category">
                        <option disabled selected>Choose one</option>
						@foreach ($shopCategories as $shopCategory)
							<option value="{{ $shopCategory->id }}"> {{ $shopCategory->name }} </option>
						@endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="address">Shop Address *</label>
                    <input type="text" class="form-control" name="address" id="address" tabindex="3">
                </div>

				<div class="form-group">
                    <label for="province">Province *</label>
                    <select class="form-control" id="province" name="province">
                        <option disabled selected>Choose one</option>
						@foreach ($provinces as $province)
							<option value="{{ $province->id }}"> {{ $province->name }} </option>
						@endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="phone">Shop Phone Number *</label>
                    <input type="text" class="form-control"  name="phone" id="phone" tabindex="4">
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="shop@example.com" tabindex="5">
                </div>

                <div class="form-group">
                    <label for="website">Website *</label>
                    <input type="text" class="form-control" name="website" id="website" tabindex="6">
                </div>


                <div class="form-group">
                    <span class="button-checkbox">
                        <button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
                    </span>
                </div>

                <p>
                    By clicking <strong class="label label-primary">Create</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
                </p>

                <hr>

                <div class="pull-right">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-default" href="{{ route('user.show', $user) }}">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
                </div>

                <div class="modal-body">
                    <p>Term and Condition</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push ('scripts')
    <script src="{{ asset('js/new_shop.js') }}"></script>
@endpush
