<?php
return [
    'routes' => [
        ['GET', '/books[/{action}]', ['App\Controllers\BooksController', 'index']],
        ['GET', '/error/404', ['App\Controllers\ErrorController', 'error404']],
        ['GET', '/error/500', ['App\Controllers\ErrorController', 'error500']],
    ]
];