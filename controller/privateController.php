<?php


use model\Manager\UserManager;
use model\Manager\CodeManager;
use model\Mapping\CodeMapping;
use model\Manager\HtmlManager;
use model\Mapping\HtmlMapping;

$codeManager = new CodeManager($db);
$htmlManager = new HtmlManager($db);

// ADD NEW CODE
if (isset(
        $_POST["addCodeTitle"],
        $_POST["addCodeDesc"],
        $_POST["addCodeCode"],
        $_POST["addCodeType"]
)) {
    $codeMapData = [
        'snip_code_title' => $_POST["addCodeTitle"],
        'snip_code_desc' => $_POST["addCodeDesc"],
        'snip_code_code' => $_POST["addCodeCode"],
        'snip_code_type' => $_POST["addCodeType"]
    ];
    // sanitisation of code is handled during the Mapping by the Setters
    $codeMapping = new CodeMapping($codeMapData);
    $addCode = $codeManager->addNewCode($codeMapping);
}


// UPDATE EXISTING CODE
if (isset(
    $_POST["updateCodeId"],
    $_POST["updateCodeTitle"],
    $_POST["updateCodeDesc"],
    $_POST["updateCodeCode"],
    $_POST["updateCodeType"]
)) {

    $codeMapData = [
        'snip_code_id' => $_POST["updateCodeId"],
        'snip_code_title' => $_POST["updateCodeTitle"],
        'snip_code_desc' => $_POST["updateCodeDesc"],
        'snip_code_code' => $_POST["updateCodeCode"],
        'snip_code_type' => $_POST["updateCodeType"]
    ];

    $codeMapping = new CodeMapping($codeMapData);
    $updateCode = $codeManager->updateExistingCode($codeMapping);
}

// ADD NEW HTML
if (isset(
        $_POST["addHtmlTitle"],
        $_POST["addHtmlDesc"],
        $_POST["addHtmlImg"],
        $_POST["addHtmlCode"]
)) {
    $htmlMapData = [
        'snip_html_title' => $_POST["addHtmlTitle"],
        'snip_html_desc' => $_POST["addHtmlDesc"],
        'snip_html_img' => $_POST["addHtmlImg"],
        'snip_html_code' => $_POST["addHtmlCode"]
    ];

    $htmlMapping = new HtmlMapping($htmlMapData);
    $addHtml = $htmlManager->addNewHtml($htmlMapping);
    if($addHtml) header("Location: ?control=link");
    die();
}

// UPDATE EXISTING HTML
if (isset(
    $_POST["updateHtmlId"],
    $_POST["updateHtmlTitle"],
    $_POST["updateHtmlDesc"],
    $_POST["updateHtmlImg"],
    $_POST["updateHtmlCode"]
)) {
    $htmlMapData = [
        'snip_html_id' => $_POST["updateHtmlId"],
        'snip_html_title' => $_POST["updateHtmlTitle"],
        'snip_html_desc' => $_POST["updateHtmlDesc"],
        'snip_html_img' => $_POST["updateHtmlImg"],
        'snip_html_code' => $_POST["updateHtmlCode"]
    ];

    $htmlMapping = new HtmlMapping($htmlMapData);
    $updateHtml = $htmlManager->updateHtml($htmlMapping);
    if($updateHtml) header("Location: ./");
    die();
}


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
        if(isset($_GET["type"])) {
            $type = htmlspecialchars(strip_tags(trim($_GET["type"])));
            switch ($type) {
                case 'code':
                    $getData = $codeManager->getAllCodesForLink();
            echo $twig->render('privateView/private.updateCode.html.twig', ['getData' => $getData]);
                die();
                case 'html':
                    $getData = $htmlManager->getHtml();
                    echo $twig->render('privateView/private.updateHtml.html.twig', ['getData' => $getData]);
                    break;
            }
        }
        break;
    case 'html':
        echo $twig->render('privateView/private.addHtml.html.twig');
        break;
    case 'link':
        $lastEntry = $htmlManager->getLastIdForLink();
        $allCodes = $codeManager->getAllCodesForLink();
        echo $twig->render('privateView/private.link.html.twig', ['lastEntry' => $lastEntry,
                                                                        'allCodes' => $allCodes]);
        break;
    case 'showCode':
        $id = intval($_GET['id']);
        $oneCode = $codeManager->getOneDataById($id);
        echo $twig->render('privateView/private.oneCode.html.twig', ['oneCode' => $oneCode]);
        break;
    case 'showHtml':
        $id = intval($_GET['id']);
        $oneHtml = $htmlManager->getOneHtml($id);
        echo $twig->render('privateView/private.oneHtml.html.twig', ['oneHtml' => $oneHtml]);
        break;

}

