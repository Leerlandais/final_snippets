<?php


use model\Manager\UserManager;
use model\Manager\CodeManager;
use model\Manager\HtmlManager;
use model\Manager\ExesManager;

$userManager = new UserManager($db);
$codeManager = new CodeManager($db);
$htmlManager = new HtmlManager($db);
$exesManager = new ExesManager($db);


// USER LOGIN VERIFICATION
if (isset($_POST["userLoginName"],
          $_POST["userLoginPwd"])) {
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
        $getLatest = $codeManager->getLatestSnippets();
        echo $twig->render('publicView/public.home.html.twig',["getLatest" => $getLatest]);
        break;
    case 'login' :
        echo $twig->render('publicView/public.login.html.twig');
        break;
    case 'select':
       if(isset($_GET["type"])) {
           $type = htmlspecialchars(strip_tags(trim($_GET["type"])));
           $getData = null;
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
            case 'unix' :
                      $headerTitle = "Linux";
                $getData = $codeManager->getDataByType("unix");
                break;
            case 'reac' :
                $headerTitle = "React";
                $getData = $codeManager->getDataByType("reac");
                break;
            case 'node' :
                $headerTitle = "Node";
                $getData = $codeManager->getDataByType("node");
                break;
            case 'bash' :
                $headerTitle = "Bash Scripts";
                $getData = $codeManager->getDataByType("bash");
                break;
            case 'exes' :
                $headerTitle = "Executable Files";
                $getExes = $exesManager->getAllExes();
                echo $twig->render('publicView/public.view.exes.twig', ['getExes' => $getExes, 'headerTitle' => $headerTitle]);
                break;
            case 'else' :
                $headerTitle = "Other Codes";
                $getData = $codeManager->getDataByType("else");
                break;
            case 'html':
                    $headerTitle = "HTML";
                    $getData = $htmlManager->getHtml();
                    echo  $twig->render('publicView/public.view.html.twig', ['headerTitle' => $headerTitle, 'getData' => $getData]);
                    die();
            default:
                echo $twig->render('publicView/public.404.html.twig');
                break;
        }
                echo $twig->render('publicView/public.view.main.twig', ['getData' => $getData, 'headerTitle' => $headerTitle]);
       }
        break;
    case 'showCode':
        $id = $_GET["id"];
        $headerTitle = "TEST";
        $getCode = $codeManager->getOneDataById($id);
            echo $twig->render('publicView/public.view.code.twig', ['getCode' => $getCode, 'headerTitle' => $headerTitle]);
        break;
    case 'showHtml':
        $id = $_GET["id"];
        $getHtml = $htmlManager->getHtmlById($id);
        echo $twig->render('publicView/public.view.fullView.twig', ['getHtml' => $getHtml]);
        break;
    default:
        echo $twig->render('publicView/public.404.html.twig');
        break;
}

