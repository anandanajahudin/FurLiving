<?php

use adminlte\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
<?= Html::img('@web/img/user2-160x160.jpg', ['class' => 'img-circle', 'alt' => 'User Image']) ?>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?=
        Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        ['label' => 'Menu', 'options' => ['class' => 'header']],
                        ['label' => 'Dashboard', 'icon' => 'fa fa-dashboard', 
                            'url' => ['/'], 'active' => $this->context->route == 'site/index'
                        ],
                        [
                            'label' => 'Users',
                            'icon' => 'fa fa-users',
                            'url' => ['/user'],
                            'active' => $this->context->route == 'user/index',
                        ],
                        [
                            'label' => 'Item',
                            'icon' => 'fa fa-shopping-cart',
                            'url' => ['/item'],
                            'active' => $this->context->route == 'item/index',
                        ],
                        [
                            'label' => 'Category',
                            'icon' => 'fa fa-clone',
                            'url' => ['/category'],
                            'active' => $this->context->route == 'category/index',
                        ],
                        [
                            'label' => 'Order',
                            'icon' => 'fa fa-industry',
                            'url' => ['/orders'],
                            'active' => $this->context->route == 'order/index',
                        ],
                        [
                            'label' => 'Order Item',
                            'icon' => 'fa fa-cart-arrow-down',
                            'url' => ['/order-item'],
                            'active' => $this->context->route == 'order-item/index',
                        ],
                    ],
                ]
        )
        ?>
        
    </section>
    <!-- /.sidebar -->
</aside>
