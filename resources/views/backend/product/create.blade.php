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
    <div class="col-12 mx-auto">

        <x-session-message />

        <div class="card border-lg-top-primary">
            <div class="card-body p-5">
                <div class="card-title d-flex align-items-center">
                    <div><i class='bx bxs-user mr-1 font-24 text-primary'></i>
                    </div>
                    <h4 class="mb-0 text-primary">Add Product</h4>
                </div>
                <hr />
                {{-- <div class="alert alert-danger error-message" style="display: none;">
                    <ul></ul>
                </div> --}}
                <div class="alert alert-success success-message" style="display:none;">
                    <ul></ul>
                </div>
                <div class="form-body">
                    <form class="create-product" action="{{ route('staff.product.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Product Name</label>
                                <div class="input-group">
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Product name" onkeyup="slugCreate(this.value, '#slug')">
                                </div>
                                <div class="text-danger font-italic error-name" style="display: none;"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="slug">Slug</label>
                                <div class="input-group">
                                    <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" value="" onkeyup="slugCreate(this.value, '#slug')">
                                </div>
                                <div class="text-danger font-italic error-slug" style="display: none;"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="category">Category</label>
                                <div class="input-group">
                                    <select class="form-control" name="category" id="category">
                                        <option value="">-- Root --</option>
                                        {!! getCategory($categories, 3) !!}
                                    </select>
                                </div>
                                <div class="text-danger font-italic error-category" style="display: none;"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="brand_id">Brand</label>
                                <div class="input-group">
                                    <select class="form-control" name="brand_id" id="brand_id">
                                        <option value="">-- Brand --</option>
                                        @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-danger font-italic error-brand_id" style="display: none;"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="model">Model</label>
                                <div class="input-group">
                                    <input type="text" name="model" id="model" class="form-control" placeholder="Model">
                                </div>
                                <div class="text-danger font-italic error-model" style="display: none;"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="buying_price">Buying Price</label>
                                <div class="input-group">
                                    <input type="text" name="buying_price" id="buying_price" class="form-control"
                                        placeholder="Buying Price">
                                </div>
                                <div class="text-danger font-italic error-buying_price" style="display: none;"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="selling_price">Selling Price</label>
                                <div class="input-group">
                                    <input type="text" name="selling_price" id="selling_price" class="form-control"
                                        placeholder="Selling Price">
                                </div>
                                <div class="text-danger font-italic error-selling_price" style="display: none;"></div>
                            </div>
                        </div>
                        <div>
                            <label>Do you have any special Price?</label>
                            <input class="ml-3" type="checkbox" onchange="specialPriceShow(this.checked)" name="special_price"
                                   id="special_price" />
                            <span class="item-text">Yes</span>
                            <input class="ml-3" type="checkbox" name="special_price"value="0" />
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
                                    <input type="date" name="special_price_from" id="special_price_from"
                                        class="form-control" placeholder="Special price from">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="special_price_to">Special Price To</label>
                                <div class="input-group">
                                    <input type="date" name="special_price_to" id="special_price_to"
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
                                <div class="text-danger font-italic error-quantity" style="display: none;"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sku_code">SKU Code</label>
                                <div class="input-group">
                                    <input type="text" name="sku_code" id="sku_code" class="form-control"
                                        placeholder="SKU Code">
                                </div>
                                <div class="text-danger font-italic error-sku_code" style="display: none;"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label style="display:block;">Color</label>
                                @foreach(color() as $key => $value)
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="color-{{$value}}" value="{{ $value }}" name="color[]">
                                        <label class="custom-control-label" for="color-{{$value}}">{{$value}}</label>

                                    </div>
                                @endforeach
                                {{-- <div class="text-danger font-italic error-color" style="display: none;"></div> --}}
                            </div>
                            <div class="form-group col-md-6">
                                <label style="display:block;">Size</label>
                                @foreach(size() as $k => $v)
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="size-{{ $v }}" value="{{ $v }}" name="size[]">
                                        <label class="custom-control-label" for="size-{{ $v }}">{{ $v }}</label>

                                    </div>
                                @endforeach
                                {{-- <div class="text-danger font-italic error-size" style="display: none;"></div> --}}
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
                        <div class="form-group" >
                            <label for="description">Description</label>
                            <textarea name="description" id="description" ></textarea>
                            <div class="text-danger font-italic error-description" style="display: none;"></div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Thumbnail</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="thumbnail"
                                        onchange="thumbnailLoad(event)">
                                </div>
                                <div class="text-danger font-italic error-thumbnail" style="display: none;"></div>
                                <div class="input-group mt-3 d-flex justify-content-center">
                                    <img id="thumbnail_image" width="100px">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>More Images</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="multiple_image[]" id="multiple_image_upload" multiple>
                                </div>
                                <div class="input-group mt-3 d-flex"  id="prev_images"></div>
                            </div>
                        </div>
                        <hr />
                        <div class="form-group text-center">
                            <div class="col-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="active" value="active" name="status"
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="active">Active</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="inactive" value="inactive" name="status"
                                           class="custom-control-input" checked>
                                    <label class="custom-control-label" for="inactive">Inactive</label>
                                </div>
                            </div>
                            <div class="text-danger font-italic error-status" style="display: none;"></div>
                        </div>

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
