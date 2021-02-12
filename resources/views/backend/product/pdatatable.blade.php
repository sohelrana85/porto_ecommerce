<div class="table-responsive">
    <div class="table-data">
        @csrf
    {{-- <table id="example" class="table table-striped table-bordered" style="width:100%"> --}}
    <table class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                {{-- <th>id</th> --}}

                <th>thumbnail</th>
                <th>Name</th>
                <th>category_id</th>
                <th>brand_id</th>
                <th>model</th>
                <th>buying_price</th>
                <th>selling_price</th>
                <th>special_price</th>
                <th>special_price_from</th>
                <th>special_price_to</th>
                <th>quantity</th>
                <th>sku_code</th>
                <th>color</th>
                <th>size</th>
                <th>warranty</th>
                <th>warranty_duration</th>
                <th>warranty_condition</th>
                <th>description</th>
                <th>status</th>
                <th>Create_by</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>

                {{-- <td>{{ $product->id }}</td> --}}

                <td><img src="{{ asset('product_photo/images')}}/{{ $product->thumbnail }}" alt="{{ $product->name }}" width="60px"></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->brand->name }}</td>
                <td>{{ $product->model }}</td>
                <td>{{ $product->buying_price }}</td>
                <td>{{ $product->selling_price }}</td>
                <td>{{ $product->special_price }}</td>
                <td>{{ $product->special_price_from }}</td>
                <td>{{ $product->special_price_to }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->sku_code }}</td>
                <td>{{ $product->color }}</td>
                <td>{{ $product->size }}</td>
                <td>{{ $product->warranty }}</td>
                <td>{{ $product->warranty_duration }}</td>
                <td>{{ $product->warranty_condition }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->user->name }}</td>
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
    <div class="text-center">{!! $products->links("pagination::bootstrap-4") !!}</div>
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
        getData(page);
    })

    function getData(page) {
        token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{ route('staff.product') }}',
            method: 'POST',
            data: { _token: token, page: page },
            success: function (result) {
                $('.table-data').html(result);
            }
        })
    }
})
</script>
