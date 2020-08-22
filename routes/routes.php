<?php

use shop\Router;


//на случай админки
Router::add('^dashboard$', [
    'controller' => 'Main', 'action' => 'index', 'prefix' => 'dashboard'
]);
Router::add('^dashboard/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

//стандартные роуты
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

