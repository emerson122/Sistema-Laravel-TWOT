<?php

use phpDocumentor\Reflection\PseudoTypes\False_;
use phpDocumentor\Reflection\PseudoTypes\True_;
use PHPUnit\Framework\Constraint\IsTrue;

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => '',
    'title_prefix' => 'TWOT | ',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>TWOT</b> SYSTEM',
    'logo_img' => 'vendor/adminlte/dist/img/logo.jpg',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-info', /** bg-info bg-primary bg-danger bg-success */
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => true,  //modo oscuro

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    
    'classes_body' => '',
    'classes_brand' => 'bg-info', //aqui se le cambia el color a la barra
    'classes_brand_text' => '',  //text-danger
    'classes_content_wrapper' => '', //este es darle estilo al contenedor////////////////**********************************/
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4', //sidebar-light-primary elevation-4
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-dark navbar-light',   //barra superior
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => true, //al entrar ver si esta abierto o cerrado
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => true,     //nuevo menu
    'right_sidebar_icon' => 'fas fa-archive',  //cambiar iconos
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,  //desplaza o por encima del contenido
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => '/',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */


    // modificar las cosas de la barra lateral
    'menu' => [
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'Buscar',
            'topnav_right' => true,
            'url'          => '',
            'method'       =>'post'
        ],


        [
            'text' => 'INICIO',
            'url'  => 'inicio',
            'icon'=>'fas fa-fw fa-home', //icono
            ],









        //esa cosa para el menu 
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
            //'topnav' => true,
            //'topnav_user' => true,
        ],

        //[
            //'text'         => 'REGISTRAR NUEVO USUARIO',
            //'url'           => '#',
          //  'topnav_right' => true,
        //],

        // barra lateral:
        [
            'type' => 'sidebar-menu-search',
            'text' => 'search',
        ],
        [
            'text' => 'INICIO',
            'routes'  => 'inicio',
            'can'   =>'manager-blog' //esconder cosas en el menu para que solo sean visibles para el administrador
        ],
       // [
            //'text' => 'Inicio',
            //'url' => '#',
            //'icon'=>'fas fa-fw fa-home', //icono
            //'label'=> 'Nuevo',  //letra de la notificacion
            //'label_color' => 'info' //color de la notificacion
        //],//

        [
            'text' => 'Fabricante',
            'url' => 'fabricante',
            'icon'=>'fas fa-fw fa-truck', //icono
            'icon_color'=>'yellow',
            'label'=> 'Nuevo',  //letra de la notificacion
            'label_color' => 'warning' //color de la notificacion
        ],
        [
            'text' => 'Produccion',
            'url' => 'enproduccion',
            'icon'=>'fas fa-fw fa-hammer', //icono
            'icon_color'=>'yellow',
            'label'=> 'Nuevo',  //letra de la notificacion
            'label_color' => 'warning' //color de la notificacion
        ],


        
        [
            'text' => 'Ventas',
            
            'url'  => 'ventas',
            'icon'=>'fas fa-fw fa-lock', //icono
            'icon_color'=>'green',
            'label'=> 'Nuevo',  //letra de la notificacion
            'label_color' => 'info' //color de la notificacion
        ],
        [
            'text' => 'Compras',
            
            'url'  => 'compras',
            'icon'=>'fas fa-fw fa-archway', //icono
            'icon_color'=>'blue',
            'label'=> 'Nuevo',  //letra de la notificacion
            'label_color' => 'info' //color de la notificacion
        ],

        [
            'text' => 'Descripción Producto',
            'url' => 'descripcionproducto',
            'icon'=>'fas fa-gifts', //icono
            'icon_color'=>'red',
            'label'=> 'Nuevo',  //letra de la notificacion
            'label_color' => 'danger' //color de la notificacion
        ],
        [
            'text' => 'Distribución Producto',
            'url' => 'distribucionproducto',
            'icon'=>'fas fa-car', //icono
            'icon_color'=>'red',
            'label'=> 'Nuevo',  //letra de la notificacion
            'label_color' => 'danger' //color de la notificacion
        ],
        [
            'text' => 'Productos',
            'url' => 'producto',
            'icon'=>'fas   fa-tags', //icono
            'icon_color'=>'primary',
            'label'=> 'Nuevo',  //letra de la notificacion
            'label_color' => 'primary' //color de la notificacion
        ],

        [
            'text' => 'Inventario',
            'url' => 'inventario',
            'icon'=>'fas   fa-shopping-cart', //icono
            'icon_color'=>'primary',
            'label'=> 'Nuevo',  //letra de la notificacion
            'label_color' => 'primary' //color de la notificacion
        ],





        [
            'text'        => 'Reporte',
            'url'         => 'reportes', 
            'icon'        => 'fas fa-fw fa-share', //icono
            'submenu' => [   
        [
            'text'        => 'Reporte Persona',
            'url'         => 'reportes', 
            'icon'        => 'fas fa-fw fa-chart-pie', //icono
            'icon_color'  =>'blue',
            'label'       => 'Nuevo', //letra de la notificacion
            'label_color' => 'info', //color de la notificacion
        ],
        [
            'text'        => 'Reporte Producción ',
            'url'         => 'reportes', 
            'icon'        => 'fas fa-fw fa-chart-pie', //icono
            'icon_color'  =>'blue',
            'label'       => 'Nuevo', //letra de la notificacion
            'label_color' => 'info', //color de la notificacion
        ],
        [
            'text'        => 'Reporte Compra',
            'url'         => 'reportes', 
            'icon'        => 'fas fa-fw fa-chart-pie', //icono
            'icon_color'  =>'blue',
            'label'       => 'Nuevo', //letra de la notificacion
            'label_color' => 'info', //color de la notificacion
        ],
        [
            'text'        => 'Reporte Venta',
            'url'         => 'reportes', 
            'icon'        => 'fas fa-fw fa-chart-pie', //icono
            'icon_color'  =>'blue',
            'label'       => 'Nuevo', //letra de la notificacion
            'label_color' => 'info', //color de la notificacion
        ],
    ],
],






























        [
            'text'        => 'pages',
            'url'         => 'admin/pages',
            'icon'        => 'far fa-fw fa-file',
            'label'       => 4,
            'label_color' => 'success',
        ],
        ['header' => 'Administracion'], //cabeceras
        [
            'text' => 'Personas',
            'url'  => 'personas/users',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'text' => 'change_password',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-lock',
        ],

        //este es el multilevel el que tiene el submenu
        [
            'text'    => 'multilevel',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
                [
                    'text'    => 'level_one',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'level_two',
                            'url'  => '#',
                        ],
                        [
                            'text'    => 'level_two',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
            ],
        ],
        ['header' => 'labels'],
        [
            'text'       => 'important',
            'icon_color' => 'red',
            'url'        => '#',
        ],
        [
            'text'       => 'warning',
            'icon_color' => 'yellow',
            'url'        => '#',
        ],
        [
            'text'       => 'information',
            'icon_color' => 'cyan',
            'url'        => '#',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */



    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor\sweetalert2\sweetalert2.all.min.js',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
