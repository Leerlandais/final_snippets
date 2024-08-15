<?php


use model\Manager\UserManager;




$route = $_GET['control'] ?? 'home';
switch ($route) {
    case 'home':
        echo $twig->render('privateView/private.home.html.twig');
        break;
    case 'logout':
        $userManager = new UserManager($db);
        $userManager->userLogout();
        header ("Location: ./");
        break;
    case "add":
        echo $twig->render('privateView/private.addCode.html.twig');
        break;
    case "update":
        echo $twig->render('privateView/private.updateCode.html.twig');
        break;

}

