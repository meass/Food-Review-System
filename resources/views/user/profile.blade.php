@extends ('layouts.master')

@section ('content')

@if(Session::has('flash_message_success') || Session::has('flash_message_error'))
    <div class="container">
@else
    <div class="container padding-top-5-em">
@endif
    <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="/storage/users/{{ $user->cover_image }}" alt="cover-image"/>

        <img src="/storage/users/{{ $user->avatar }}" align="left" class="fb-image-profile thumbnail" alt="avatar">

        <div class="fb-profile-text">
            <h1>{{ $user->name }}</h1>
        </div>

        <div class="container">
            <div class="content">

                <a type="button" class="btn btn-primary margin-5-px" id="change-profile-pic" data-toggle="modal" data-target="#basicModal">Change Profile Picture</a>
                <br>
                <a class="btn btn-primary margin-5-px" href="{{ route('user.edit', $user) }}">Edit Profile</a>

                <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel"> Change Profile Picture </h4>
                            </div>

                            <form action="{{ route('user.update_avatar', $user) }}" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Choose Image</label>
                                            <input type="file" name="avatar" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Click me!!</label>
                                            <input type="submit" value="Upload" name="submit" class="form-control">
                                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container main-container padding-top-15-px">
    <div class="col-md-2 sidebar">
        @if( isset($shops) )
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#">My Shop</a></li>
            <li>
                <a href="{{ route('shop.create', $user) }}"><strong> Create a Shop + </strong></a>
            </li>
            @foreach ($shops as $shop)
                <li><a href="{{ route('shop.show', $shop) }}">{{ $shop->name }}</a></li>
            @endforeach
        </ul>
        @endif

        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#">Preference</a></li>
            <li><a href="#">Food Type &nbsp;<span class="glyphicon glyphicon-pencil" ></span></a></li>
            <li><a href="#">Taste &nbsp;<span class="glyphicon glyphicon-pencil"></span></a></li>
            <li><a href="#">Environment &nbsp;<span class="glyphicon glyphicon-pencil"></span></a></li>
            <li><a href="#">Looking For &nbsp;<span class="glyphicon glyphicon-pencil"></span></a></li>
        </ul>

        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#">Dislike</a></li>
            <li><a href="#">Allergy &nbsp;<span class="glyphicon glyphicon-pencil"></span></a></li>
            <li><a href="#">Taste &nbsp;<span class="glyphicon glyphicon-pencil"></span></a></li>
        </ul>
    </div>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                Shop Name
            </div>
            <div class="panel-body">
                <div class="col-md-7 panel panel-default" >
                    <div class="panel-body">Photo Album</div>
                </div>
                <div class="col-md-5 panel panel-default" >
                    <div class="panel-body">Comments</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                Advertisement
            </div>
            <div class="panel-body">
                <div class="col-md-3 panel panel-default" >
                    <div class="panel-body">Ads 1</div>
                </div>
                <div class="col-md-3 panel panel-default" >
                    <div class="panel-body">Ads 2</div>
                </div>
                <div class="col-md-3 panel panel-default" >
                    <div class="panel-body">Ads 3</div>
                </div>
                <div class="col-md-3 panel panel-default" >
                    <div class="panel-body">Ads 4</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
