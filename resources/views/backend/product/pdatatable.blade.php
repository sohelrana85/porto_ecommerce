<div class="table-responsive">
    <div class="table-data">
        @csrf
        {{-- <table id="example" class="table table-striped table-bordered" style="width:100%"> --}}
        <table class="table table-responsive">
            <thead>
                <tr>
                    {{-- <th>id</th> --}}

                    <th>thumbnail</th>
                    <th>Name</th>
                    <th>category id</th>
                    <th>brand id</th>
                    {{-- <th>model</th> --}}
                    <th>buy. price</th>
                    <th>sel. price</th>
                    <th>spe. price</th>
                    <th>featured</th>
                    {{-- <th>S.price from</th>
                    <th>S.price to</th>
                    <th>quantity</th>
                    <th>sku code</th>
                    <th>color</th>
                    <th>size</th>
                    <th>warranty</th>
                    <th>warranty duration</th>
                    <th>warranty condition</th>
                    <th>description</th> --}}
                    <th>status</th>
                    <th>Create_by</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>

                        {{-- <td>{{ $product->id }}</td> --}}

                        <td class="p-1 text-center"><img src="{{ asset('product_photo/' . $product->thumbnail) }}"
                                alt="{{ $product->name }}" width="60px"></td>
                        <td class="text-wrap" style="min-width:200px">{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->brand->name }}</td>
                        {{-- <td>{{ $product->model }}</td> --}}
                        <td>{{ $product->buying_price }}</td>
                        <td>{{ $product->selling_price }}</td>
                        <td>{{ $product->special_price }}</td>
                        <td>
                            <input type="checkbox" name="feathred" id="featured"
                                {{ $product->featured ? 'checked' : '' }}
                                data-url="{{ route('staff.get-data.featured', $product->id) }}"
                                value="{{ $product->featured }}">
                        </td>
                        {{-- <td>{{ $product->special_price_from }}</td>
                    <td>{{ $product->special_price_to }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->sku_code }}</td>
                    <td>
                        <?php $data = json_decode($product->color); ?>
                        @foreach (color() as $key => $value)
                        @foreach ($data as $item) {{ $item == $key ? $value : '' }} @endforeach
                        @endforeach
                    </td>
                    <td>{{ $product->size }}</td>
                    <td>{{ $product->warranty }}</td>
                    <td>{{ $product->warranty_duration }}</td>
                    <td>{{ $product->warranty_condition }}</td>
                    <td>{{ $product->description }}</td> --}}
                        <td><span
                                class="p-2 font-13 text-{{ $product->status == 'inactive' ? 'danger' : 'success' }}">{{ ucfirst($product->status) }}</span>
                        </td>
                        <td>{{ $product->user->name }}</td>
                        <td class="text-center">
                            <div class="row justify-content-center" style="min-width: 120px">
                                <div class="">
                                    <form action="{{ route('staff.product.edit', $product->id) }}" method="GET">
                                        @csrf
                                        <button class="btn btn-warning btn-sm mr-1"><i class="bx bx-edit"></i></button>
                                    </form>
                                </div>
                                <div class="">
                                    <form action="{{ route('staff.product.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('Delete')
                                        <button class="btn btn-danger btn-sm ml-1"><i class="bx bx-eraser"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row d-flex justify-content-between m-0">
            <div class="">Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of
                {{ $products->total() }} entries</div>
            <div class="">{!! $products->links('pagination::bootstrap-4') !!}</div>
        </div>
    </div>
</div>
