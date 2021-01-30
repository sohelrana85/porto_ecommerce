<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="">
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon-2" alt="" />
        </div>
        <div>
            <h4 class="logo-text">P Ecom..</h4>
        </div>
        <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('staff.dashboard') }}" class="">
                <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i> </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{ route('staff.brand.index') }}" class="">
                <div class="parent-icon icon-color-1"><i class="bx bx-crown"></i> </div>
                <div class="menu-title">Brands</div>
            </a>
        </li>
        <li>
            <a href="{{ route('staff.category.index') }}" class="">
                <div class="parent-icon icon-color-1"><i class="bx bx-list-plus"></i> </div>
                <div class="menu-title">Categories</div>
            </a>
        </li>
        <li>
            <a href="{{ route('staff.product.index') }}" class="">
                <div class="parent-icon icon-color-1"><i class="bx bx-list-plus"></i> </div>
                <div class="menu-title">Products</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i> </div>
                <div class="menu-title">Items</div>
            </a>
            <ul>
                <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Add</a>
                </li>
                <li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Manage</a>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
