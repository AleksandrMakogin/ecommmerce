@php


  $prefix  = Request::route()->getPrefix();
  $route =  Route::current()->getName();


@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('backend/images/logo/diploma.png')}}" alt="">
                        <h3><b>Диплом</b> <br> Админ Панель </h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{($route == 'dashboard' ? 'active' : '')}}">
                <a href="{{url('admin/dashboard')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Главная панель </span>
                </a>
            </li>

            @php
                $brand = (auth()->guard('admin')->user()->brands == 1);
                $category = (auth()->guard('admin')->user()->category == 1);
                $product = (auth()->guard('admin')->user()->products == 1);
                $slider = (auth()->guard('admin')->user()->slider == 1);
                $coupons = (auth()->guard('admin')->user()->coupons == 1);
                $shipping = (auth()->guard('admin')->user()->shipping == 1);
                $blog = (auth()->guard('admin')->user()->blog == 1);
                $setting = (auth()->guard('admin')->user()->setting == 1);
                $returnorder = (auth()->guard('admin')->user()->return == 1);
                $review = (auth()->guard('admin')->user()->review == 1);
                $orders = (auth()->guard('admin')->user()->orders == 1);
                $stock = (auth()->guard('admin')->user()->stock == 1);
                $reports = (auth()->guard('admin')->user()->reports == 1);
                $alluser = (auth()->guard('admin')->user()->alluser == 1);
                $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);
            @endphp

            @if($brand == true)
            <li class="treeview  {{($prefix == '/brands' ? 'active': '')}}" >
                <a href="#">
                    <i data-feather="shopping-bag"></i>
                    <span>Бренды </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu ">
                    <li class="{{($route == 'all.brands' ? 'active': '')}}"><a href="{{route('all.brands')}}"><i class="ti-more"></i>Все Бренды</a></li>
                </ul>
            </li>
            @else
            @endif

            @if($category == true)
            <li class="treeview  {{($prefix == '/category' ? 'active': '')}}">
                <a href="#">
                    <i data-feather="inbox"></i> <span>Категории</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu ">
                    <li class="{{($route == 'all.category' ? 'active': '')}}"><a href="{{route('all.category')}}"><i  class="ti-more"></i >Все категории</a></li>
                    <li class="{{($route == 'all.subcategory' ? 'active': '')}}" ><a href="{{route('all.subcategory')}}"><i class="ti-more"></i >Все подкатегории</a></li>
                    <li class="{{($route == 'all.subsubcategory' ? 'active': '')}}" ><a href="{{route('all.subsubcategory')}}"><i class="ti-more"></i >Все подкатегории 1</a></li>
                </ul>
            </li>
            @else
            @endif


            @if($product == true)
            <li class="treeview  {{($prefix == '/products' ? 'active': '')}}">
                <a href="#">
                    <i data-feather="shopping-cart"></i>
                    <span>Продукты</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'add-product' ? 'active': '')}}" ><a href="{{route('add-product')}}"><i class="ti-more"></i>Добавить продукт</a></li>
                    <li class="{{ ($route == 'manage-product'? 'active':'' )}}" ><a href="{{route('manage-product') }}"><i class="ti-more"></i>Управление продуктами</a></li>

                </ul>
            </li>
            @else
            @endif

            @if($slider == true)
            <li class="treeview {{ ($prefix == '/slider')?'active':'' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Слайдер</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'manage-slider')? 'active':'' }}"><a href="{{ route('manage-slider') }}"><i class="ti-more"></i>Управлеине слайдерами</a></li>



                </ul>
            </li>
                @else
                @endif



            @if($coupons == true)
            <li class="treeview {{ ($prefix == '/coupons')?'active':'' }}  ">
                <a href="#">
                    <i data-feather="dollar-sign"></i>
                    <span>Купоны</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'manage-coupon')? 'active':'' }}"><a href="{{ route('manage-coupon') }}"><i class="ti-more"></i>Управелние купонами</a></li>
                </ul>
            </li>
            @else
            @endif


            @if( $shipping == true)
            <li class="treeview {{ ($prefix == '/shipping')?'active':'' }}  ">
                <a href="#">
                    <i data-feather="truck"></i>
                    <span>Доставка </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'manage-division')? 'active':'' }}"><a href="{{ route('manage-division') }}"><i class="ti-more"></i>Регион отправки </a></li>
                    <li class="{{ ($route == 'manage-district')? 'active':'' }}"><a href="{{ route('manage-district') }}"><i class="ti-more"></i>Район отправки </a></li>
                    <li class="{{ ($route == 'manage-state')? 'active':'' }}"><a href="{{ route('manage-state') }}"><i class="ti-more"></i>Населенный пункт</a></li>
                    </li>
                </ul>
            </li>
            @else
            @endif


            <li class="header nav-small-cap">Документооборот </li>

            @if($orders == true)
            <li class="treeview  {{ ($prefix == '/orders')?'active':'' }} " >
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Заказы </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'pending-orders')? 'active':'' }}"><a href="{{ route('pending-orders') }}"><i class="ti-more"></i> Согласование заказов </a></li>
                    <li class="{{ ($route == 'confirmed-orders')? 'active':'' }}"><a href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Подтверждение заказа</a></li>

                    <li class="{{ ($route == 'processing-orders')? 'active':'' }}"><a href="{{ route('processing-orders') }}"><i class="ti-more"></i>Обработка заказв</a></li>

                    <li class="{{ ($route == 'picked-orders')? 'active':'' }}"><a href="{{ route('picked-orders') }}"><i class="ti-more"></i> Подбор заказа</a></li>

                    <li class="{{ ($route == 'shipped-orders')? 'active':'' }}"><a href="{{ route('shipped-orders') }}"><i class="ti-more"></i> Отправка закза</a></li>

                    <li class="{{ ($route == 'delivered-orders')? 'active':'' }}"><a href="{{ route('delivered-orders') }}"><i class="ti-more"></i> Доставка заказа </a></li>

                    <li class="{{ ($route == 'cancel-orders')? 'active':'' }}"><a href="{{ route('cancel-orders') }}"><i class="ti-more"></i> Отмена заказа </a></li>

                </ul>
            </li>
            @else
            @endif

            @if($stock == true)
            <li class="treeview {{ ($prefix == '/stock')?'active':'' }}  ">
                <a href="#">
                    <i data-feather="layers"></i>
                    <span>Запасы товара </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'product.stock')? 'active':'' }}"><a href="{{ route('product.stock') }}"><i class="ti-more"></i>Анализ запасов</a></li>
                </ul>
            </li>
            @else
            @endif

            @if( $reports == true)
            <li class="header nav-small-cap">Отчетность </li>
            <li class="treeview {{ ($prefix == '/reports')?'active':'' }}  ">
                <a href="#">
                    <i data-feather="trello"></i>
                    <span>Отчеты </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all-reports')? 'active':'' }}"><a href="{{ route('all-reports') }}"><i class="ti-more"></i>Все отчеты</a></li>
                    <li class="{{ ($route == 'diagram-reports')? 'active':'' }}"><a href="{{ route('diagram-reports') }}"><i class="ti-more"></i>Продажи </a></li>

                </ul>
            </li>
            @else
            @endif

            @if( $alluser == true)
            <li class="treeview {{ ($prefix == '/alluser')?'active':'' }}  ">
                <a href="#">
                    <i data-feather="users"></i>
                    <span>Пользователи </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all-users')? 'active':'' }}">
                        <a href="{{ route('all-users') }}"><i class="ti-more"></i>Статус активности</a></li>
                </ul>
            </li>
            </li>
            @else
            @endif


            @if( $adminuserrole == true)
            <li class="treeview {{ ($prefix == '/adminuserrole')?'active':'' }}  ">
                <a href="#">
                    <i data-feather="user-x"></i>
                    <span>Админ-Роль  Пользователя </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all.admin.user')? 'active':'' }}"><a href="{{ route('all.admin.user') }}"><i class="ti-more"></i>Все админ пользователи </a></li>


                </ul>
            </li>
            @else
            @endif



            <li class="header nav-small-cap">Комуникации общественночть</li>

            @if(  $blog == true)
            <li class="treeview {{ ($prefix == '/blog')?'active':'' }}  ">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Блог</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'blog.category')? 'active':'' }}"><a href="{{ route('blog.category') }}"><i class="ti-more"></i>Категории блога</a></li>

                    <li class="{{ ($route == 'list.post')? 'active':'' }}"><a href="{{ route('list.post') }}"><i class="ti-more"></i>Список постов</a></li>

                    <li class="{{ ($route == 'add.post')? 'active':'' }}"><a href="{{ route('add.post') }}"><i class="ti-more"></i>Добавить пост</a></li>

                </ul>
            </li>
            @else
            @endif

            @if($setting == true)
            <li class="treeview {{ ($prefix == '/setting')?'active':'' }}  ">
                <a href="#">
                    <i data-feather="settings"></i>
                    <span>Настройки</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'site.setting')? 'active':'' }}"><a href="{{ route('site.setting') }}"><i class="ti-more"></i>Настройки контаткты </a></li>
                    <li class="{{ ($route == 'seo.setting')? 'active':'' }}"><a href="{{ route('seo.setting') }}"><i class="ti-more"></i>Seo Настройки</a></li>
                </ul>
            </li>
            @else
            @endif

            @if($returnorder == true)
            <li class="treeview {{ ($prefix == '/return')?'active':'' }}  ">
                <a href="#">
                    <i data-feather="aperture"></i>
                    <span>Возвраты</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'return.request')? 'active':'' }}"><a href="{{ route('return.request') }}"><i class="ti-more"></i>Управление возвратами</a></li>

                    <li class="{{ ($route == 'all.request')? 'active':'' }}"><a href="{{ route('all.request') }}"><i class="ti-more"></i>Все Возвраты </a></li>

                </ul>
            </li>
            @else
            @endif

            @if($review == true)
            <li class="treeview {{ ($prefix == '/review')?'active':'' }}  ">
                <a href="#">
                    <i data-feather="message-square"></i>
                    <span>Управление отзывами</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'pending.review')? 'active':'' }}"><a href="{{ route('pending.review') }}"><i class="ti-more"></i>Неопубликоаваные отзывы </a></li>
                    <li class="{{ ($route == 'publish.review')? 'active':'' }}"><a href="{{ route('publish.review') }}"><i class="ti-more"></i>Опубликованые отзывы</a></li>
                </ul>
            </li>
            @else
            @endif


        </ul>
            </li>


        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
