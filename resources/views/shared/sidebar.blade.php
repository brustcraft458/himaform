<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?= $sidebar_selected == 'dashboard' ? '' : 'collapsed' ?>" href="../content/dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link <?= $sidebar_selected == 'template' ? '' : 'collapsed' ?>" href="/template">
                <i class="bi bi-calendar"></i>
                <span>Template Formulir</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?= $sidebar_selected == 'data' ? '' : 'collapsed' ?>" href="">
                <i class="bi bi-calendar"></i>
                <span>Data Formulir</span>
            </a>
        </li><!-- End Profile Page Nav -->

    </ul>
</aside><!-- End Sidebar-->
