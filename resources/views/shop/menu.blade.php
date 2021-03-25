@extends ('shop.profile')

@section ('inner-content')
    <h2><strong>Food Menu</strong></h2>
    <hr>
    <div class="row">
        <div class="col-xs-3"><strong>Name</strong></div>
        <div class="col-xs-2"><strong>Price</strong></div>
        <div class="col-xs-2"><strong>Size</strong></div>
        <div class="col-xs-2"><strong>Taste</strong></div>

        @if( null !== auth()->user() )
            @if ( auth()->user()->isOwnerOf($shop) )
                <div class="col-xs-2">
                    <div class="pull-xs-right">
                        <a class="btn btn-sm btn-primary" href="{{ route('food.create', $shop) }}" role="button">
                            New Food &nbsp;
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </div>
                </div>
            @endif
        @endif

    </div>

    <hr/>

    @foreach ($foods as $food)
        <div class="row">
            <div class="col-xs-3">
                {{ $food->name }}
            </div>

            <div class="col-xs-2">
                {{ $food->price }}$
            </div>

            <div class="col-xs-2">
                {{ $food->size }}
            </div>

            <div class="col-xs-2">
                {{ $food->taste }}
            </div>

            @if( null !== auth()->user() )
                @if( auth()->user()->isOwnerOf($shop) )
                    <div class="col-xs-2">
                        <a href="{{ route('food.edit', [$shop, $food]) }}" class="btn btn-sm btn-primary">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirm-delete-{{ $food->id }}">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </div>
                @endif
            @endif
        </div>

        <div class="modal fade" id="confirm-delete-{{ $food->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title" id="myModalLabel">Delete Food</h2>
                    </div>

                    <div class="modal-body">
                        Are you sure you want to delete this item: <b>'{{ $food->name }}'</b>?
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="{{  route('food.destroy', [$shop, $food]) }}" class="pull-xs-right5 card-link" style="display:inline">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <button type="submit" class="btn btn-danger">
                                Confirm
                            </button>
                        </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
