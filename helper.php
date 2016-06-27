<?php

if (! function_exists('views')) {
    function view($template, array $data = [])
    {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/views');

        $twig = new Twig_Environment($loader, []);

        echo $twig->render($template, $data);
    }
}
