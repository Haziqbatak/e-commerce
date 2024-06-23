<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-menu-button-wide"></i><span>My transaction</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.product.gallery.index') ? '' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse"
                    href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Transaction</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse {{ request()->routeIs('user.my-transaction.index', 'user.product.gallery.index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('user.my-transaction.index') }}" class="{{ request()->routeIs('user.my-transaction.edit') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>My Transaction</span>
                        </a>
                    </li>
                </ul>
                <ul id="components-nav" class="nav-content collapse {{ request()->routeIs('user.my-transaction.index', 'user.product.gallery.index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('user.my-transaction.index') }}" class="{{ request()->routeIs('user.my-transaction.index', 'user.product.gallery.*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Transaction</span>
                        </a>
                    </li>
                </ul>
            </li>
        </li>
        <!-- End Components Nav -->

        

    </ul>

</aside>