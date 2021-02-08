<div class="table-responsive">
    <div class="table-data">
        @csrf
    <table id="example" class="table table-striped table-bordered" style="width:100%">
    {{-- <table class="table table-striped table-bordered" style="width:100%"> --}}
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Create_by</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>

                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->slug }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->create_by }}</td>
                <td class="d-flex justify-content-center">
                    <form action="{{ route('staff.product.edit', $product->id) }}" method="GET">
                        @csrf
                        <button class="btn btn-light-warning btn-sm mr-1"><i class="bx bx-edit"></i></button>
                    </form>
                    <form action="{{ route('staff.product.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('Delete')
                        <button class="btn btn-danger btn-sm ml-1"><i class="bx bx-eraser"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $products->links('pagination::bootstrap-4') !!}
</div>
</div>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script>
$(document).ready(function () {

    $('body').on('click', '.pagination a', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        let page = url.split('page=')[1];
        //console.log(page);
        getData(page);
    })

    function getData(page) {
        token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{ route('staff.product') }}' + '?page=' + page,
            method: 'POST',
            data: { _token: token, page: page },
            success: function (result) {
                $('.table-data').html(result);
            }
        })
    }
})
</script>
