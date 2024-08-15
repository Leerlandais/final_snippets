<?php


use model\Manager\UserManager;


$userManager = new UserManager($db);


if (isset($_POST["userLoginName"], $_POST["userLoginPwd"])) {
    $name = $_POST["userLoginName"];
    $pwd = $_POST["userLoginPwd"];

    if ($userManager->attemptUserLogin($name, $pwd)) {
        header("Location: ./");
        exit;
    } else {
        echo "Login failed. Please check your credentials.";
    }
}


$route = $_GET['route'] ?? 'home';
switch ($route) {
    case 'home':
        echo $twig->render('publicView/public.home.html.twig');
        break;
    case 'login' :
        echo $twig->render('publicView/public.login.html.twig');
        break;
    case 'select':
       if(isset($_GET["type"])) {
           $type = htmlspecialchars(strip_tags(trim($_GET["type"])));
        switch ($type) {
            case 'call':
                    echo $twig->render('publicView/public.view.call.twig');
                break;
            case 'func':
                    echo $twig->render('publicView/public.view.func.twig');
                break;
            case 'java':
                    echo $twig->render('publicView/public.view.java.twig');
                break;
            case 'xtra':
                    echo $twig->render('publicView/public.view.xtra.twig');
                break;
            case 'form':
                    echo $twig->render('publicView/public.view.form.twig');
                break;
            case 'table':
                echo $twig->render('publicView/public.view.table.twig');
                break;
            default:
                echo $twig->render('publicView/public.404.html.twig');
                break;
        }
       }
        break;
    case 'showCode':

        break;
    default :
        echo $twig->render('publicView/public.home.html.twig');
        break;
}

