<?php

require_once("classes/View.php");

$view = new View();
//sprawdź co wybrał użytkownik:
if (filter_input(INPUT_GET, 'page')) {
    $page = filter_input(INPUT_GET, 'page');
    switch ($page) {
        case 'gallery':$page = 'gallery';
            break;
        case 'form':$page = 'form';
            break;
        case 'aboutus':$page = 'aboutus';
            break;
        default:$page = 'main';
    }
} else {
    $page = "main";
}

$file = "scripts/" . $page . ".php";
if (file_exists($file)) {
    require_once($file);
    $view->setTitle($title);
    $view->setContent($content);
    $view->show();
}