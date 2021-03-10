<?php


return[
    "APP_TITLE"=>"mvc project",
    "BASE_DIR"=>dirname(__DIR__),
    "BASE_URL"=>"http://localhost:8000",

    //providers
    'providers'=>[
        \App\Providers\SessionProvider::class,
        \App\Providers\AppServiceProvider::class,
    ]
];
