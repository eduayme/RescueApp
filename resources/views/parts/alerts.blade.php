<!-- Success - OPEN -->
@if (session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="container text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session()->get('success') }}
        </div>
    </div>
<!-- Success - CLOSE -->

<!-- Error - OPEN -->
@elseif (session()->get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="container text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session()->get('error') }}
        </div>
    </div>
@endif
<!-- Error - CLOSE -->
