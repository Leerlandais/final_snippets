<?php


use model\Manager\UserManager;
use model\Manager\CodeManager;

$userManager = new UserManager($db);
$codeManager = new CodeManager($db);

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
                    $headerTitle = "";
                    $getData = $codeManager->getDataByType("phpCall");
                break;
            case 'func':
                    $headerTitle = "";
                    $getData = $codeManager->getDataByType("phpFunc");
                break;
            case 'java':
                    $headerTitle = "";
                    $getData = $codeManager->getDataByType("jsCode");
                break;
            case 'xtra':
                    $headerTitle = "";
                    $getData = $codeManager->getDataByType("jsXtra");
                break;
            case 'html':
                    $headerTitle = "";
                    $getData = $codeManager->getDataByType("html");
                break;

            default:
                echo $twig->render('publicView/public.404.html.twig');
                break;
        }
                echo $twig->render('publicView/public.view.main.twig', ['getData' => $getData]);
       }
        break;
    case 'showCode':

        break;
    default :
        echo $twig->render('publicView/public.home.html.twig');
        break;
}

