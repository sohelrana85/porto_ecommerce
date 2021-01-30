@extends('backend.components.layout')

@section('title')
Add Product

@endsection
@section('content')

<!--breadcrumb-->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Dashboard</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Add Products</li>
            </ol>
        </nav>
    </div>
    <div class="ml-auto">
        <div class="btn-group">
            <a href="{{ route('staff.product.store') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Manage
                Products</a>
        </div>
    </div>
</div>
<!--end breadcrumb-->
<div class="row">
    <div class="col-12 col-lg-10 mx-auto">

        <x-session-message />

        <div class="card border-lg-top-primary">
            <div class="card-body p-5">
                <div class="card-title d-flex align-items-center">
                    <div><i class='bx bxs-user mr-1 font-24 text-primary'></i>
                    </div>
                    <h4 class="mb-0 text-primary">User Registration</h4>
                </div>
                <hr />
                <div class="form-body">
                    <form action="{{ route('staff.product.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <div class="input-group">
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Product name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <div class="input-group">
                                <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="" for="category_id">Root Category</label>
                            <div class="">
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value="0">-- Root --</option>
                                    {!! getCategory($categories, 3) !!}
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="" for="brand_id">Brand</label>
                                <div class="">
                                    <select class="form-control" name="brand_id" id="brand_id">
                                        <option value="0">-- Brand --</option>
                                        @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="model">Model</label>
                                <div class="input-group">
                                    <input type="text" name="model" id="model" class="form-control" placeholder="Model">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="buying_price">Buying Price</label>
                                <div class="input-group">
                                    <input type="text" name="buying_price" id="buying_price" class="form-control"
                                        placeholder="Buying Price">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="selling_price">Selling Price</label>
                                <div class="input-group">
                                    <input type="text" name="selling_price" id="selling_price" class="form-control"
                                        placeholder="Selling Price">
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="special_price">Do you have any special Price?</label>
                            <input class="ml-3" type="checkbox" onchange="specialPriceShow(this.checked)"
                                name="special_price" id="special_price" />
                            <span class="item-text">Yes</span>
                            <input class="ml-3" type="checkbox" name="special_price" id="special_price" value="0" />
                            <span class="item-text">No</span>
                        </div>
                        <div class="form-row show_special_price" style="display: none">
                            <div class="form-group col-md-4">
                                <label for="special_price">Special Price</label>
                                <div class="input-group">
                                    <input type="text" name="special_price" id="special_price" class="form-control"
                                        placeholder="Special price">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="special_price_from">Special Price From</label>
                                <div class="input-group">
                                    <input type="text" name="special_price_from" id="special_price_from"
                                        class="form-control" placeholder="Special price from">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="special_price_to">Special Price To</label>
                                <div class="input-group">
                                    <input type="text" name="special_price_to" id="special_price_to"
                                        class="form-control" placeholder="Special Price to">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="quantity">Quantity</label>
                                <div class="input-group">
                                    <input type="text" name="quantity" id="quantity" class="form-control"
                                        placeholder="Quantity">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sku_code">SKU Code</label>
                                <div class="input-group">
                                    <input type="text" name="sku_code" id="sku_code" class="form-control"
                                        placeholder="SKU Code">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="color">Color</label>
                                <div class="input-group">
                                    <input type="text" name="color" id="color" class="form-control" placeholder="Color">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="size">Size</label>
                                <div class="input-group">
                                    <input type="text" name="size" id="size" class="form-control" placeholder="Size">
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="warranty">Do you have any Warranty?</label>
                            <input class="ml-3" type="checkbox" onchange="showWarranty(this.checked)" name="warranty"
                                id="warranty" />
                            <span class="item-text">Yes</span>
                            <input class="ml-3" type="checkbox" name="warranty" id="warranty" value="0" />
                            <span class="item-text">No</span>
                        </div>
                        <div class="form-group show_warranty" style="display: none">
                            <div class="form-group">
                                <label for="warranty_duration">Warranty Duration</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="warranty_duration"
                                        name="warranty_duration" placeholder="Warranty duration">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="warranty_condition">Warranty Condition</label>
                                <textarea name="warranty_condition" id="warranty_condition"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description"></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Thumbnail</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="thumbnail"
                                        onchange="thumbnailLoad(event)">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group mt-3 d-flex justify-content-center">
                                    <img id="thumbnail_image" width="150px">
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Image 1</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="image_1">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Image 2</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="image_2">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Image 3</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="image_3">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Image 4</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="image_4">
                                </div>
                            </div>
                        </div>
                        <hr />

                        <div class="form-row">
                            <button type="submit" class="btn btn-primary px-3 ml-auto">Add Product</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

@endsection
