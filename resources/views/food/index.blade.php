@extends ('layouts.master')

@section ('page-title')
	 Food Menu | {{ $shop->name }}
@endsection

@section ('content')
<div class="container text-center">
    <div class="clearfix"></div><br>
    <div class="row">
        <div class="col-md-2">RESTAURANT</div>
        <div class="col-md-2">NAME</div>
        <div class="col-md-2">PRICE</div>
        <div class="col-md-2">SIZE</div>
        <div class="col-md-2">TASTE</div>
        <div class="col-md-2">
            <div class="pull-xs-right">
                <a class="btn btn-primary" href="{{ route('food.create', $shop) }}" role="button">
                    Add Food
                </a>
            </div>
        </div>
    </div>
    <hr>

    @foreach ($foods as $food)
        <div class="row" style="font-size: 19px; font-weight: bold; color: blue;">
            <div class="col-md-2">
                {{$food->restaurant}}
            </div>
            <div class="col-md-2">
                {{$food->name}}
            </div>
            <div class="col-md-2">
                {{$food->price}}$
            </div>
            <div class="col-md-2">
                {{$food->size}}
            </div>
            <div class="col-md-2">
                {{$food->taste}}
            </div>

            <div class="col-md-2" style="text-align: right;">
                <a href="{{ route('food.edit', [$shop, $food]) }}" class="btn btn-sm btn-primary">Edit</a>
                <form method="POST" action="{{  route('food.destroy', [$shop, $food]) }}" class="pull-xs-right5 card-link" style="display:inline">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}

                    <input class="btn btn-sm btn-danger" type="submit" value="Delete"></input>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
