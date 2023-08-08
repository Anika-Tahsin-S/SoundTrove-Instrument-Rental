<div class="sidebar" data-color="danger" data-background-color="black" data-image="public/admin/img/sidebar.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="{{url('/')}}" class="simple-text logo-normal">
           Rent @ Bracu
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('dashboard') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('users') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('users')}}">
                    <i class="material-icons">persons</i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('categories')|Request::is('category-add') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('categories')}}">
                    <i class="material-icons">category</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('add-category')|Request::is('category-add') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('add-category')}}">
                    <i class="material-icons">create_new_folder</i>
                    <p>Add Category</p>
                </a>
            </li>


            <li class="nav-item {{ Request::is('products') | Request::is('product-add') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('products')}}">
                    <i class="material-icons">store</i>
                    <p>Products</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('add-products') | Request::is('product-add') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('add-products')}}">
                    <i class="material-icons">control_point</i>
                    <p>Add Products</p>
                </a>
            </li>

            <li class="nav-item {{ Request::is('orders') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('orders') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Rent Requests</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('order-history') ? 'active':'' }}">
                <a class="nav-link" href="{{url('order-history')}}">
                    <i class="material-icons">check_circle</i>
                    <p>Completed Rent Requests</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('up-products') ? 'active':'' }}">
                <a class="nav-link" href="{{url('up-products')}}">
                    <i class="material-icons">alarm</i>
                    <p>Upcoming Products</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('add-up') ? 'active':'' }}">
                <a class="nav-link" href="{{url('add-up')}}">
                    <i class="material-icons">alarm_add</i>
                    <p>Add Upcoming Products</p>
                </a>
            </li>
        </ul>
    </div>
</div>
