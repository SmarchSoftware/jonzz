<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Master Layout
    |--------------------------------------------------------------------------
    |
    | Attribute comes with the form/pages needed to operate. It is assumed and
    | expected that you already have your own master layout to use. You
    | should specify the master layout to use here.
    |
    |
    */   
   'layout' => 'layouts.app',

    /*
    |--------------------------------------------------------------------------
    | Content Section name
    |--------------------------------------------------------------------------
    |
    | In your master layout, this is the name of the section that your master
    | layout uses. Attribute will use this name for it's sectional content.
    |
    | i.e. if you use yield('content') in your master layout for the position
    | where you want Attribute to appear then the section is called "content".
    |
    */
   'section' => 'content',

    /*
    |--------------------------------------------------------------------------
    | Views
    |--------------------------------------------------------------------------
    |
    | Attribute comes pre-equipped with views that will work right out of the box.
    | However, you are free to define you own views to use here instead.
    |
    */   
   'views' => [
        'index'         => 'jonzz::index',            
        'create'        => 'jonzz::create',
        'show'          => 'jonzz::edit',
        'edit'          => 'jonzz::edit',
        'unauthorized'  => 'jonzz::unauthorized',
        'modifiers'     => 'jonzz::mods'
    ],

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Title header of the index page and other views.
    |
    */   
   'title' => 'Jonzz Attributes',

    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
    |
    | How many currencies to load per page?
    |
    */   
   'pagination' => '15',

    /*
    |--------------------------------------------------------------------------
    | Authorization ?
    |--------------------------------------------------------------------------
    |
    | Out of the box, Attribute can optionally use Laravel's built in authorization
    | methods. If you wish to make use of them, switch the enable param
    | to true and then use the permissions that your app requires.
    |
    | Note : Attribute itself  does not provide authorization and when/if you
    | decide to enable the ACL options, the Auth::user() method "can"
    | must already have those permissions defined. Installing and 
    | enabling authorization is outside Attribute's scope.
    |
    | ACL overview :
    | 'enable' true/false
    | 'driver' [ "laravel" or "shinobi" or "sentinel" ]
    | 'index' is to view the index page.
    | 'create' is to create new currencies.
    | 'show' is to view individual currencies.
    | 'edit' is to change existing currencies.
    | 'destroy' is to delete existing currencies.
    |
    */  
   'acl' => [
        'enable'    => false,
        'driver'    => 'laravel',
        'index'     => 'jonzz.index',            
        'create'    => 'jonzz.create',
        'show'      => 'jonzz.show',
        'edit'      => 'jonzz.edit',
        'destroy'   => 'jonzz.destroy'
    ],


    /*
    |--------------------------------------------------------------------------
    | Route Options
    |--------------------------------------------------------------------------
    | Prefix :
    |-------------------------
    |
    | If you want to prefix all your Attribute routes, enter the prefix here.
    | https://laravel.com/docs/5.2/routing#route-group-prefixes for info.
    | 
    | i.e 'route_prefix' => 'admin' will change your urls to look
    | like 'http://<yoursite>/admin/jonzz/create' instead of
    | 'http://<yoursite>/jonzz/create'. Default is none.
    |
    |-------------------------
    | Middleware :
    |-------------------------
    | An array of middlewares you wish to pass in to the group. Laravel 5.2
    | by default requires that the "web" middleware be use for any routes
    | that need access to session (or 'logged in' won't stay that way.)
    |
    | Laravel 5.1 uses "auth" for authentication so that gets passed.
    |
    |-------------------------
    | As :
    |-------------------------
    | If you want to use something other than "jonzz" in your named routes
    | you can specify it here.
    |
    */
    'route' => [
        'prefix'    => '',
        'as'        => 'jonzz.',
        'middleware'=> (str_contains( app()->version(), '5.2') ? ['web'] : ['auth'])
    ],

];