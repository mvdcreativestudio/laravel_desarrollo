<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="">{{ $settings->site_name }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="">||</a>
        </div>
        <ul class="sidebar-menu">
            
            <li class="menu-header">Tienda Online</li>

            <li class="dropdown active">
                <a href="{{ route('admin.dashbaord') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>

            </li>

            <li
                class="dropdown {{ setActive(['admin.category.*', 'admin.sub-category.*', 'admin.child-category.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i>
                    <span>Categorías</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.category.index') }}">Categoría</a></li>
                    <li class="{{ setActive(['admin.sub-category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.sub-category.index') }}">Sub Categoria</a></li>
                    <li class="{{ setActive(['admin.child-category.*']) }}"> <a class="nav-link"
                            href="{{ route('admin.child-category.index') }}">Categoria Hijo</a></li>

                </ul>
            </li>

            <li
            class="dropdown {{ setActive([
                'admin.brand.*',
                'admin.products.*',
                'admin.products-image-gallery.*',
                'admin.products-variant.*',
                'admin.products-variant-item.*',
                'admin.seller-products.*',
                'admin.seller-pending-products.*',
            ]) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box"></i>
                <span>Productos</span></a>
            <ul class="dropdown-menu">
                <li class="{{ setActive(['admin.brand.*']) }}"><a class="nav-link"
                        href="{{ route('admin.brand.index') }}">Marcas</a></li>
                <li
                    class="{{ setActive([
                        'admin.products.*',
                        'admin.products-image-gallery.*',
                        'admin.products-variant.*',
                        'admin.products-variant-item.*',
                        'admin.reviews.*',
                    ]) }}">
                    <a class="nav-link" href="{{ route('admin.products.index') }}">Productos</a></li>
                    <li class="{{ setActive(['admin.product.quickLoadForm']) }}">
                        <a class="nav-link" href="{{ route('admin.product.quickLoadForm') }}">Carga Rápida</a>
                    </li>                    
                <li class="{{ setActive(['admin.seller-products.*']) }}"><a class="nav-link"
                        href="{{ route('admin.seller-products.index') }}">Productos de vendedores</a></li>
                <li class="{{ setActive(['admin.seller-pending-products.*']) }}"><a class="nav-link"
                        href="{{ route('admin.seller-pending-products.index') }}">Productos pendientes</a></li>

                <li class="{{ setActive(['admin.reviews.*']) }}"><a class="nav-link"
                        href="{{ route('admin.reviews.index') }}">Reviews</a></li>

            </ul>
        </li>



            <li
                class="dropdown {{ setActive([

                    'admin.order.*',
                    'admin.pending-orders',
                    'admin.processed-orders',
                    'admin.dropped-off-orders',
                    'admin.shipped-orders',
                    'admin.out-for-delivery-orders',
                    'admin.delivered-orders',
                    'admin.canceled-orders',
                ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cart-plus"></i>
                    <span>Pedidos</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.order.*']) }}"><a class="nav-link"
                            href="{{ route('admin.order.index') }}">Todos los pedidos</a></li>
                    <li class="{{ setActive(['admin.pending-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.pending-orders') }}">Pedidos pendientes</a></li>
                    <li class="{{ setActive(['admin.processed-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.processed-orders') }}">Pedidos procesados</a></li>

                    <li class="{{ setActive(['admin.shipped-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.shipped-orders') }}">Pedidos enviados</a></li>

                    <li class="{{ setActive(['admin.delivered-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.delivered-orders') }}">All entregados</a></li>

                    <li class="{{ setActive(['admin.canceled-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.canceled-orders') }}">Pedidos cancelados</a></li>

                </ul>
            </li>

                {{-- <li class="{{ setActive(['admin.transaction']) }}"><a class="nav-link"
                href="{{ route('admin.transaction') }}"><i class="fas fa-money-bill-alt"></i> <span>Transacciones</span></a>
                </li> --}}

            <li
                class="dropdown {{ setActive([
                    'admin.vendor-profile.*',
                    'admin.coupons.*',
                    'admin.shipping-rule.*',
                    'admin.payment-settings.*',
                ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Ecommerce</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.vendor-profile.*']) }}"><a class="nav-link"
                            href="{{ route('admin.flash-sale.index') }}">Ofertas</a></li>
                    <li class="{{ setActive(['admin.coupons.*']) }}"><a class="nav-link"
                            href="{{ route('admin.coupons.index') }}">Cupones</a></li>
                    <li class="{{ setActive(['admin.shipping-rule.*']) }}"><a class="nav-link"
                            href="{{ route('admin.shipping-rule.index') }}">Reglas de envío</a></li>
                    <li class="{{ setActive(['admin.vendor-profile.*']) }}"><a class="nav-link"
                            href="{{ route('admin.vendor-profile.index') }}">Perfil del local</a></li>
                    <li class="{{ setActive(['admin.payment-settings.*']) }}"><a class="nav-link"
                            href="{{ route('admin.payment-settings.index') }}">Configuración de pagos</a></li>

                </ul>
            </li>

            <li
                class="dropdown {{ setActive([
                    'admin.slider.*',
                    'admin.vendor-condition.index',
                    'admin.about.index',
                    'admin.terms-and-conditions.index',
                ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cog"></i> <span>Manejar sitio</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.slider.*']) }}"><a class="nav-link"
                            href="{{ route('admin.slider.index') }}">Slider</a></li>

                    <li class="{{ setActive(['admin.slider.*']) }}"><a class="nav-link"
                            href="{{ route('admin.home-page-setting') }}">Ajustes Homepage</a></li>

                    <li class="{{ setActive(['admin.vendor-condition.index']) }}"><a class="nav-link"
                            href="{{ route('admin.vendor-condition.index') }}">Condición de locales</a></li>

                </ul>
            </li>

            

            {{-- <li><a class="nav-link {{ setActive(['admin.advertisement.*']) }}"
                href="{{ route('admin.advertisement.index') }}"><i class="fas fa-ad"></i>
                <span>Anuncios</span></a></li> --}}

            {{-- <li
                class="dropdown {{ setActive(['admin.blog-category.*', 'admin.blog.*', 'admin.blog-comments.index']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fab fa-blogger-b"></i> <span>Manage Blog</span></a>
                <ul class="dropdown-menu">

                    <li class="{{ setActive(['admin.blog-category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.blog-category.index') }}">Categories</a></li>
                    <li class="{{ setActive(['admin.blog.*']) }}"><a class="nav-link"
                            href="{{ route('admin.blog.index') }}">Blogs</a></li>
                    <li class="{{ setActive(['admin.blog-comments.index']) }}"><a class="nav-link"
                            href="{{ route('admin.blog-comments.index') }}">Blog Comments</a></li>
                </ul>
            </li> --}}

            <li class="menu-header"></li>


            <li
                class="dropdown {{ setActive([
                    'admin.footer-info.index',
                    'admin.footer-socials.*',
                    'admin.footer-grid-two.*',
                    'admin.footer-grid-three.*',
                ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-th-large"></i><span>Footer</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.footer-info.index']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-info.index') }}">Información del footer</a></li>

                    <li class="{{ setActive(['admin.footer-socials.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-socials.index') }}">Redes del footer</a></li>

                    <li class="{{ setActive(['admin.footer-grid-two.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-grid-two.index') }}">Columna dos</a></li>

                    <li class="{{ setActive(['admin.footer-grid-three.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-grid-three.index') }}">Columna tres</a></li>

                </ul>
            </li>
            <li
                class="dropdown {{ setActive([
                    'admin.vendor-requests.index',
                    'admin.customer.index',
                    'admin.vendor-list.index',
                    'admin.manage-user.index',
                    'admin-list.index',
                ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Usuarios</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.customer.index']) }}"><a class="nav-link"
                            href="{{ route('admin.customer.index') }}">Lista de clientes</a></li>
                    <li class="{{ setActive(['admin.vendor-list.index']) }}"><a class="nav-link"
                            href="{{ route('admin.vendor-list.index') }}">Lista de locales</a></li>

                    <li class="{{ setActive(['admin.vendor-requests.index']) }}"><a class="nav-link"
                            href="{{ route('admin.vendor-requests.index') }}">Locales pendientes</a></li>

                    <li class="{{ setActive(['admin.admin-list.index']) }}"><a class="nav-link"
                            href="{{ route('admin.admin-list.index') }}">Lista de administradores</a></li>

                    <li class="{{ setActive(['admin.manage-user.index']) }}"><a class="nav-link"
                            href="{{ route('admin.manage-user.index') }}">Administrar usuario</a></li>

                </ul>
            </li>


            <li><a class="nav-link {{ setActive(['admin.subscribers.*']) }}"
                    href="{{ route('admin.subscribers.index') }}"><i class="fas fa-user"></i>
                    <span>Suscriptores</span></a></li>

            <li><a class="nav-link" href="{{ route('admin.settings.index') }}"><i class="fas fa-wrench"></i>
                    <span>Configuración</span></a></li>

                    <li class="menu-header">Administrador de Pagos</li>

                    <li
                        class="dropdown {{ setActive(['admin.movimientos.*']) }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i>
                            <span>Movimientos</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{ setActive(['admin.movimientos.index']) }}"><a class="nav-link"
                                href="{{ route('admin.movimientos.index') }}">Dashboard</a></li>
                            <li class="{{ setActive(['admin.movimientos.transactions']) }}"><a class="nav-link"
                                href="{{ route('admin.movimientos.transactions') }}">Todos los movimientos</a></li>
                            <li class="{{ setActive(['admin.movimientos.incomes']) }}"><a class="nav-link"
                                    href="{{ route('admin.movimientos.incomes') }}">Ingresos</a></li>
                            <li class="{{ setActive(['admin.movimientos.expenses']) }}"><a class="nav-link"
                                    href="{{ route('admin.movimientos.expenses') }}">Egresos</a></li>        
                        </ul>
                    </li>

                    <li
                        class="dropdown {{ setActive(['admin.movimientos.users']) }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i>
                            <span>Usuarios</span></a>
                        <ul class="dropdown-menu"> 
                            <li class="{{ setActive(['admin.movimientos.users']) }}"><a class="nav-link"
                            href="{{ route('admin.movimientos.users') }}">Todos los usuarios</a></li>
                        </ul>
                    </li>

                    <li class="menu-header">Stock</li>
<li class="dropdown {{ setActive(['admin.stock.*']) }}">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="fas fa-list"></i>
        <span>Stock</span>
    </a>
    <ul class="dropdown-menu">
        <li class="{{ setActive(['admin.stock.index']) }}">
            <a class="nav-link" href="{{ route('admin.stock.index') }}">Dashboard</a>
        </li>
    </ul>
</li>

<li class="menu-header">Marketing</li>
<li class="{{ setActive(['admin.loyalty-program.*']) }}">
    <a href="{{ route('admin.loyalty-program.loyalty') }}" class="nav-link">
        <i class="fas fa-list"></i>
        <span>Puntos</span>
    </a>
</li>

                    <li class="menu-header">Punto de venta</li>

                    <li
                        class="dropdown {{ setActive(['admin.pos.*']) }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i>
                            <span>POS</span></a>
                        <ul class="dropdown-menu"> 
                            <li class="{{ setActive(['admin.pos.dashboard']) }}"><a class="nav-link"
                            href="{{ route('admin.pos.dashboard') }}">Point of Sale</a></li>
                        </ul>
                    </li>

        </ul>

    </aside>
</div>
