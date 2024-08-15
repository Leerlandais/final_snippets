<?php


use model\Manager\UserManager;
use model\Manager\CodeManager;

$userManager = new UserManager($db);
$codeManager = new CodeManager($db);

if (isset($_POST["userLoginName"],
          $_POST["userLoginPwd"])) {
    $name = $_POST["userLoginName"];
    $pwd = $_POST["userLoginPwd"];
// either have this here or put it outside the function if there are multiple functions
    // $userManager = new UserManager($db);
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
                    $headerTitle = "PHP Calls";
                    $getData = $codeManager->getDataByType("phpCall");
                break;
            case 'func':
                    $headerTitle = "PHP Functions";
                    $getData = $codeManager->getDataByType("phpFunc");
                break;
            case 'java':
                    $headerTitle = "Javascript";
                    $getData = $codeManager->getDataByType("jsCode");
                break;
            case 'xtra':
                    $headerTitle = "JS Extra";
                    $getData = $codeManager->getDataByType("jsXtra");
                break;
            case 'html':
                    $headerTitle = "HTML";
                    $getData = $codeManager->getDataByType("html");
                break;
            default:
                echo $twig->render('publicView/public.404.html.twig');
                break;
        }
                echo $twig->render('publicView/public.view.main.twig', ['getData' => $getData, 'headerTitle' => $headerTitle]);
       }
        break;
    case 'showCode':
        $id = $_GET["id"];
        $getCode = $codeManager->getOneDataById($id);
            echo $twig->render('publicView/public.view.code.twig', ['getCode' => $getCode]);
        break;
    default:
        echo $twig->render('publicView/public.404.html.twig');
        break;
}

