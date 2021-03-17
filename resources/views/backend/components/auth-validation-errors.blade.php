{{-- @props(['errors'])

@if ($errors->any())
<div {{ $attributes }}>
<div class="font-medium text-red-600">
    {{ __('Whoops! Something went wrong.') }}
</div>

<ul class="list-unstyled mt-3 p-2">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif --}}


{{-- @props(['errors']) --}}

@if ($errors->any())
{{-- <div {{ $attributes }}> --}}
<div class="p-1 bg-danger text-light rounded">
    {{ 'Opps! Email and Password do not match!' }}
</div>

{{-- <ul class="list-unstyled mt-3 p-2">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
</ul>
</div> --}}
@endif
