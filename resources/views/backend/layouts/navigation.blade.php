<ul class="metismenu" id="menu">
    <li>
        <a href="{{ route('backend.dashboard') }}">
            <div class="parent-icon"><i class='bx bx-home'></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>
    <li class="menu-label">Super Admin Panel</li>
    <li>
        <a href="{{ route('backend.all.staff') }}">
            <div class="parent-icon">
                <i class='bx bx-user'></i>
            </div>
            <div class="menu-title">All Staff</div>
        </a>
    </li>
    <li>
        <a href="{{ route('backend.all.editor') }}">
            <div class="parent-icon">
                <i class='bx bx-user'></i>
            </div>
            <div class="menu-title">All Editor</div>
        </a>
    </li>
    <li>
        <a href="{{ route('backend.all.user') }}">
            <div class="parent-icon">
                <i class='bx bx-user'></i>
            </div>
            <div class="menu-title">All User</div>
        </a>
    </li>
    {{-- <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-cart-alt' ></i>
            </div>
            <div class="menu-title">eCommerce</div>
        </a>
        <ul>
            <li> <a href="ecommerce-products.html"><i class="bx bx-right-arrow-alt"></i>Products</a>
            </li>
            <li> <a href="ecommerce-products-details.html"><i class="bx bx-right-arrow-alt"></i>Product Details</a>
            </li>
            <li> <a href="ecommerce-add-new-products.html"><i class="bx bx-right-arrow-alt"></i>Add New Products</a>
            </li>
            <li> <a href="ecommerce-orders.html"><i class="bx bx-right-arrow-alt"></i>Orders</a>
            </li>
        </ul>
    </li> --}}
</ul>
