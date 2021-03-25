@extends ('layouts.master')

@section ('content')

<div class="container form-page">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Edit Profile</h1>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{ route('user.update', $user) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="First Name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}">
                </div>

                <div class="form-group">
                    <label for="Last Name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}">
                </div>

                <div class="form-group">
                    <label for="Last Name">Username</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div>

                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('user.show', $user) }}" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
