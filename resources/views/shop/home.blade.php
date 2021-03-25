@extends ('shop.profile')

@section ('inner-content')
    @if( null !== auth()->user() )
        @if( auth()->user()->isOwnerOf($shop) )
            <div id="new_status">
                <ul class="col-xs-12 icons" id="post_header" role="navigation">
                    <li><a href="#"><span class="glyphicon glyphicon-pencil"></span>Update Status</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-picture"></span>Add Photos/Video</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-th"></span>Create Photo Album</a></li>
                </ul>

                <div class="col-xs-12" id="post_content">
                    <img class="col-xs-1 img-circle" src="/storage/shops/{{ $shop->logo }}" alt="shop-logo" >
                    <div class="textarea_wrap">
                        <textarea class="col-xs-11" placeholder="What's on your mind?" required></textarea>
                    </div>
                </div>

                <div class="col-xs-12" id="post_footer">
                    <ul class="col-xs-6 icons">
                        <li><a href="#"><span class="glyphicon glyphicon-camera"></span></a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-sunglasses"></span></a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-map-marker"></span></a></li>
                    </ul>

                    <div class="col-xs-6">
                        <button class="btn btn-default">
                            <span class="glyphicon glyphicon-cog">
                            </span>Custom<span class="caret"></span>
                        </button>
                        <button class="btn btn-primary">Post</button>
                    </div>
                </div>
            </div>
        @elseif( auth()->user()->isA('user') )
            <div id="new_status">
                <ul class="col-xs-12 icons" id="post_header" role="navigation">
                    <li><a href="#"><span class="glyphicon glyphicon-pencil"></span>Update Status</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-picture"></span>Add Photos/Video</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-th"></span>Create Photo Album</a></li>
                </ul>

                <form method="POST" action="{{ route('review.store', $shop) }}">
                    {{ csrf_field() }}

                    <div class='rate'>
                        <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="" data-size="xs" required autofocus>
                    </div>

                    <div class="col-xs-12" id="post_content">
                        <img class="col-xs-1 img-circle" src="/storage/users/{{ auth()->user()->avatar }}" alt="user-profile" >
                        <div class="textarea_wrap">
                            <textarea class="col-xs-11" placeholder="What's on your mind?" name="description" id="description" required></textarea>
                        </div>
                    </div>

                    <div class="col-xs-12" id="post_footer">
                        <ul class="col-xs-6 icons">
                            <li><a href="#"><span class="glyphicon glyphicon-camera"></span></a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-sunglasses"></span></a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-map-marker"></span></a></li>
                        </ul>

                        <div class="col-xs-6">
                            <button class="btn btn-default"><span class="glyphicon glyphicon-cog"></span>Custom<span class="caret"></span></button>
                            <button class="btn btn-primary" type="submit"><a href="{{ route('review.index', $shop) }}"></a>Review</button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
    @endif
@endsection

@push('scripts')
    <script src="{{ asset('js/star-rating.min.js') }}"></script>
@endpush
