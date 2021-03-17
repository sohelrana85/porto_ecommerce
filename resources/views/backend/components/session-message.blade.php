@if (session('message')) <div class="alert alert-{{ session('type') }} alert-dismissible fade show text-bold"
    role="alert">
    {{ session('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
