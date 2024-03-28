<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
        <span class="brand-text font-weight-light">BLMS | Banker</span>
    </a>
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../dist/img/manager.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['uname'];?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="add-lockertype.php" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Add Locker Type</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contact-us.php" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Contact Us</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="change-password.php" class="nav-link">
                        <i class="fas fa-cog nav-icon"></i>
                        <p>Change Password</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>
                <!-- Novo item de menu para Exportar -->
                <li class="nav-item">
                    <a href="exportar.php" class="nav-link">
                        <i class="fas fa-file-export nav-icon"></i>
                        <p>Exportar/Importar</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
