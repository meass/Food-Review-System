@if (Session::has('flash_message_success'))
    <div class="flash padding-top-6-em">
        <div class="alert alert-success no-margin-bottom">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('flash_message_success') }}
        </div>
    </div>
@endif

@if (Session::has('flash_message_error'))
    <div class="flash padding-top-6-em">
        <div class="alert alert-danger no-margin-bottom">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('flash_message_error') }}
        </div>
    </div>
@endif
