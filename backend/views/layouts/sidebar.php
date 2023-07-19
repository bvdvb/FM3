<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=  Yii::$app->user->identity->username ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    // [
                    //     'label' => 'Starter Pages',
                    //     'icon' => 'tachometer-alt',
                    //     'badge' => '<span class="right badge badge-info">2</span>',
                    //     'items' => [
                    //         ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                    //         ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                    //     ]
                    // ],
                    // ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
                    // ['label' => 'Yii2 PROVIDED', 'header' => true],
                    // ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    // ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    // ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],

                    ['label' => 'New', 'iconStyle' => 'fas', 'icon' => 'wrench', 'url' => ['/admin/user']],
                    ['label' => 'Customer', 'iconStyle' => 'fas', 'icon' => 'user', 'url' => ['/admin/user']],
                    ['label' => 'Calendar', 'iconStyle' => 'fas', 'icon' => 'calendar-alt', 'url' => ['/admin/user']],
                    ['label' => 'Spareparts', 'iconStyle' => 'fas', 'icon' => 'puzzle-piece', 'url' => ['/admin/user']],
                    ['label' => 'Vacation/Holidays', 'iconStyle' => 'fas', 'icon' => 'calendar-alt', 'url' => ['/admin/user']],
                    ['label' => 'Replacement parts', 'iconStyle' => 'fas', 'icon' => 'exchange-alt', 'url' => ['/admin/user']],
                    ['label' => 'Brands', 'iconStyle' => 'fas', 'icon' => 'copyright', 'url' => ['/admin/user']],
                    ['label' => 'Payments', 'iconStyle' => 'fas', 'icon' => 'money-bill-alt', 'url' => ['/admin/user']],
                    ['label' => 'Stats', 'iconStyle' => 'fas', 'icon' => 'chart-line', 'url' => ['/admin/user']],


                    ['label' => 'Administration', 'header' => true],
                    [
                        'label' => 'User/Rights',
                        'iconStyle' => 'fas',
                        'icon' => 'user-shield',
                        'items' => [

                            ['label' => 'Users', 'iconStyle' => 'fas', 'icon' => 'user', 'url' => ['/admin/user']],
                            ['label' => 'Groups/roles', 'iconStyle' => 'fas', 'icon' => 'users', 'url' => ['/admin/role']],
                            ['label' => 'Permission', 'iconStyle' => 'fas', 'icon' => 'key', 'url' => ['/admin/permission']],
                            ['label' => 'Admin', 'iconStyle' => 'fas', 'icon' => 'user-lock"></i>', 'url' => ['/admin']],
                            ['label' => 'Route', 'iconStyle' => 'fas', 'icon' => 'route', 'url' => ['/admin/route']],
                            ['label' => 'Menu', 'iconStyle' => 'fas', 'icon' => 'bars', 'url' => ['/admin/Menu']],
                            ['label' => 'Assignment', 'iconStyle' => 'fas', 'icon' => 'id-badge', 'url' => ['/admin/route']]
                        ]
                    ],
                    [
                        'label' => 'translation',
                        'iconStyle' => 'fas',
                        'icon' => 'language',
                        'items' => [

                            ['label' => 'List', 'iconStyle' => 'fas', 'icon' => 'bars', 'url' => ['/translatemanager/language/list']], // List of languages and modifying their status
                            ['label' => 'Create', 'iconStyle' => 'fas', 'icon' => 'plus', 'url' => ['/translatemanager/language/create']], // Create languages
                            ['label' => 'scan', 'iconStyle' => 'fas', 'icon' => 'binoculars', 'url' => ['/translatemanager/language/scan']], // Scan the project for new multilingual elements
                            ['label' => 'Optimize', 'iconStyle' => 'fas', 'icon' => 'tachometer-alt', 'url' => ['/translatemanager/language/optimizer']], // Optimise the database
                        ]
                    ],
                    // ['label' => 'Level1'],
                    // ['label' => 'LABELS', 'header' => true],
                    // ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    // ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    // ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>