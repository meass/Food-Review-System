@extends ('layouts.master')

@section ('page-title')
    Edit Food | {{ $food->name }}
@endsection

@section ('content')

<div class="container form-page">
    <div class="paenl panel-default">
        <div class="panel-heading">
            <h1>Edit Food</h1>
        </div>

        <div class="panel-body">
            <form method="POST" action="{{ route('food.update', [$shop, $food]) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="name">Food's name</label>
                    <input class="form-control" type="text" value="{{ $food->name }}" id="name" name="name" tabindex="1">
                </div>

                <div class="form-group">
                    <label for="size">Size</label>
                    <select class="form-control" id="size" name="size" tabindex="2">
                        <option selected> {{ $food->size }} </option>
                        <option>Small</option>
                        <option>Meduim</option>
                        <option>Large</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input  class="form-control" type="text" value="{{ $food->price }}" id="price" name="price" tabindex="3">
                </div>

                <div class="form-group">
                    <label for="taste">Taste</label>
                    <input class="form-control" type="text" value="{{ $food->taste }}" id="name" name="taste" tabindex="4">
                </div>

                <hr/>

                <div class="pull-right">
                    <input class="btn btn-primary" type="submit" value="Update">
                    <a class="btn btn-default" href="{{ route('food.index', $shop) }}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
