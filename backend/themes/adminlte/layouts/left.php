<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..." />
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    [
                        'label' => 'Configuration Management',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Product Type Master', 'icon' => 'dashboard', 'url' => ['/product-type-master/index'],],
                            ['label' => 'Product Type Conf', 'icon' => 'dashboard', 'url' => ['/product-type-configuration/index'],],
                            ['label' => 'Product Service', 'icon' => 'dashboard', 'url' => ['/product-service/index'],],
                            ['label' => 'Product Master', 'icon' => 'dashboard', 'url' => ['/product-master/index'],],
                            ['label' => 'Product Configuration', 'icon' => 'dashboard', 'url' => ['/product-configuration/index']],
                            ['label' => 'Product API Conf', 'icon' => 'dashboard', 'url' => ['/product-api-configuration/index'],],
                            ['label' => 'Form Master', 'icon' => 'dashboard', 'url' => ['/form-master/index'],],
                            ['label' => 'Asset Upload', 'icon' => 'dashboard', 'url' => ['/asset-upload/index'],],
                            ['label' => 'Api Configuration', 'icon' => 'dashboard', 'url' => ['/api-configuration/index'],],
                        ],
                    ],
                    [
                        'label' => 'Users Management',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Users', 'icon' => 'dashboard', 'url' => ['/users/index']],
                            ['label' => 'User Profile', 'icon' => 'dashboard', 'url' => ['/user-profiles/index'],],
                            ['label' => 'User Lifestyle', 'icon' => 'dashboard', 'url' => ['/user-lifestyle/index'],],
                            ['label' => 'User Family', 'icon' => 'dashboard', 'url' => ['/user-family/index'],],
                            ['label' => 'User Hobbies', 'icon' => 'dashboard', 'url' => ['/user-hobbies/index'],],
                        ],
                    ],
                    [
                        'label' => 'Partners Management',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Partner Basic', 'icon' => 'dashboard', 'url' => ['/partner-basic/index']],
                            ['label' => 'Partner Lifestyle', 'icon' => 'dashboard', 'url' => ['/partner-lifestyle/index'],],
                            ['label' => 'Partner Background', 'icon' => 'dashboard', 'url' => ['/partner-background/index'],],
                            ['label' => 'Partner Education', 'icon' => 'dashboard', 'url' => ['/partner-edu/index'],],
                        ],
                    ],
                    [
                        'label' => 'Miscellenous',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Posts', 'icon' => 'dashboard', 'url' => ['/posts/index']],
                            ['label' => 'Message Inbox', 'icon' => 'dashboard', 'url' => ['/message-inbox/index']],
                            ['label' => 'Account Setting', 'icon' => 'dashboard', 'url' => ['/account-setting/index']],
                            ['label' => 'Admin User', 'icon' => 'dashboard', 'url' => ['/admin-user/index']],
                            ['label' => 'Community', 'icon' => 'dashboard', 'url' => ['/community/index']],
                            ['label' => 'Sub Community', 'icon' => 'dashboard', 'url' => ['/sub-community/index']],
                            ['label' => 'Cities', 'icon' => 'dashboard', 'url' => ['/cities/index']],
                            ['label' => 'States', 'icon' => 'dashboard', 'url' => ['/states/index']],
                            ['label' => 'Countries', 'icon' => 'dashboard', 'url' => ['/countries/index']],
                            ['label' => 'Education Field', 'icon' => 'dashboard', 'url' => ['/education-field/index']],
                            ['label' => 'Education Level', 'icon' => 'dashboard', 'url' => ['/education-level/index']],
                        ],
                    ],

                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>