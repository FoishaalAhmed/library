

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset(auth()->user()->photo)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
            </div>
        </div>
        <br>
        <!-- search form -->
        {{-- 
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
                </span>
            </div>
        </form>
        --}}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">{{__('MAIN NAVIGATION')}}</li>

            <li class="@if(request()->is('admin/dashboard') || request()->is('hotel/dashboard')) {{'active'}} @endif">

                <a href="{{URL::to( '/home')}}">
                <i class="fa fa-dashboard"></i> <span>{{__('Dashboard')}}</span>
                </a>

            </li>

            @if (auth()->user()->hasRole('Admin'))

            <li class="treeview @if(request()->is('admin/users') || request()->is('admin/users/create') || request()->is('admin/users/*') ) {{'active'}} @endif">
                <a href="#">
                <i class="fa fa-user"></i>
                <span>{{__('Users')}}</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">

                    <li class="@if(request()->is('admin/users/create')) {{'active'}} @endif">
                        <a href="{{route('users.create')}}"><i class="fa fa-plus"></i> {{__('New User')}}</a>
                    </li>

                    <li class="@if(request()->is('admin/users')) {{'active'}} @endif">
                        <a href="{{route('users.index')}}"><i class="fa fa-list"></i> {{__('Users')}}</a>
                    </li>

                </ul>
            </li>

            <li class="@if(request()->is('admin/borrows')) {{'active'}} @endif">

                <a href="{{route('borrows.index')}}">
                <i class="fa fa-book"></i> <span>{{__('Borrow Books')}}</span>
                </a>

            </li>

            <li class="treeview @if(request()->is('admin/books') || request()->is('admin/books/create') || request()->is('admin/stocks') || request()->is('admin/books/*') ) {{'active'}} @endif">
                <a href="#">
                <i class="fa fa-book"></i>
                <span>{{__('books')}}</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">

                    <li class="@if(request()->is('admin/books/create')) {{'active'}} @endif">
                        <a href="{{route('books.create')}}"><i class="fa fa-plus"></i> {{__('New Book')}}</a>
                    </li>

                    <li class="@if(request()->is('admin/books')) {{'active'}} @endif">
                        <a href="{{route('books.index')}}"><i class="fa fa-list"></i> {{__('Books')}}</a>
                    </li>

                    <li class="@if(request()->is('admin/stocks')) {{'active'}} @endif">
                        <a href="{{route('stocks.index')}}"><i class="fa fa-list"></i> {{__('Stocks')}}</a>
                    </li>

                </ul>
            </li>

            <li class="treeview @if(request()->is('admin/notices') || request()->is('admin/notices/create') || request()->is('admin/notices/*') ) {{'active'}} @endif">
                <a href="#">
                <i class="fa fa-bell"></i>
                <span>{{__('Notices')}}</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">

                    <li class="@if(request()->is('admin/notices/create')) {{'active'}} @endif">
                        <a href="{{route('notices.create')}}"><i class="fa fa-plus"></i> {{__('New Notice')}}</a>
                    </li>

                    <li class="@if(request()->is('admin/notices')) {{'active'}} @endif">
                        <a href="{{route('notices.index')}}"><i class="fa fa-list"></i> {{__('Notices')}}</a>
                    </li>

                </ul>
            </li>

            <li class="@if(request()->is('admin/categories')) {{'active'}} @endif">

                <a href="{{route('categories.index')}}">
                <i class="fa fa-list-alt"></i> <span>{{__('Categories')}}</span>
                </a>

            </li>

            <li class="@if(request()->is('admin/sliders') || request()->is('admin/create') || request()->is('admin/sliders/*')) {{'active'}} @endif">

                <a href="{{route('sliders.index')}}">
                <i class="fa fa-picture-o"></i> <span>{{__('Sliders')}}</span>
                </a>

            </li>

            <li class="@if(request()->is('admin/galleries') || request()->is('admin/galleries/create') || request()->is('admin/galleries/*')) {{'active'}} @endif">

                <a href="{{route('galleries.index')}}">
                <i class="fa fa-picture-o"></i> <span>{{__('Galleries')}}</span>
                </a>

            </li>

            <li class="@if(request()->is('admin/contact')) {{'active'}} @endif">

                <a href="{{route('contact')}}">
                <i class="fa fa-map-marker"></i> <span>{{__('Contact')}}</span>
                </a>

            </li>

            <li class="@if(request()->is('admin/queries') || request()->is('admin/queries/*')) {{'active'}} @endif">

                <a href="{{route('queries.index')}}">
                <i class="fa fa-question-circle"></i> <span>{{__('Queries')}}</span>
                </a>

            </li>

            <li class="treeview @if(request()->is('admin/authors') || request()->is('admin/authors/create') || request()->is('admin/authors/*') ) {{'active'}} @endif">
                <a href="#">
                <i class="fa fa-user-secret"></i>
                <span>{{__('Authors')}}</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">

                    <li class="@if(request()->is('admin/authors/create')) {{'active'}} @endif">
                        <a href="{{route('authors.create')}}"><i class="fa fa-plus"></i> {{__('New Author')}}</a>
                    </li>

                    <li class="@if(request()->is('admin/authors')) {{'active'}} @endif">
                        <a href="{{route('authors.index')}}"><i class="fa fa-list"></i> {{__('Authors')}}</a>
                    </li>

                </ul>
            </li>
            

            <li class="treeview @if(request()->is('admin/administrators') || request()->is('admin/administrators/create') || request()->is('admin/administrators/*') ) {{'active'}} @endif">
                <a href="#">
                <i class="fa fa-user-secret"></i>
                <span>{{__('Administrators')}}</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">

                    <li class="@if(request()->is('admin/administrators/create')) {{'active'}} @endif">
                        <a href="{{route('administrators.create')}}"><i class="fa fa-plus"></i> {{__('New Administrator')}}</a>
                    </li>

                    <li class="@if(request()->is('admin/administrators')) {{'active'}} @endif">
                        <a href="{{route('administrators.index')}}"><i class="fa fa-list"></i> {{__('Administrators')}}</a>
                    </li>

                </ul>
            </li>
            
            <li class="treeview @if(request()->is('admin/pages') || request()->is('admin/pages/create') || request()->is('admin/pages/*') ) {{'active'}} @endif">
                <a href="#">
                <i class="fa fa-user-secret"></i>
                <span>{{__('Pages')}}</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">

                    <li class="@if(request()->is('admin/pages/create')) {{'active'}} @endif">
                        <a href="{{route('pages.create')}}"><i class="fa fa-plus"></i> {{__('New Page')}}</a>
                    </li>

                    <li class="@if(request()->is('admin/pages')) {{'active'}} @endif">
                        <a href="{{route('pages.index')}}"><i class="fa fa-list"></i> {{__('Pages')}}</a>
                    </li>

                </ul>
            </li>

            @elseif (auth()->user()->hasRole('Hotel'))

            

            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

