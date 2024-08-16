<?php


use model\Manager\UserManager;
use model\Manager\CodeManager;
use model\Mapping\CodeMapping;
use model\Manager\HtmlManager;
use model\Mapping\HtmlMapping;

$codeManager = new CodeManager($db);
$htmlManager = new HtmlManager($db);

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

    $codeMapping = new CodeMapping($codeMapData);
    $addCode = $codeManager->addNewCode($codeMapping);
   // echo $addCode ? 'All good' : 'Not good';
}

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
    echo $addHtml ? 'good' : 'bad';
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
        echo $twig->render('privateView/private.updateCode.html.twig');
        break;
    case 'html':
        echo $twig->render('privateView/private.addHtml.html.twig');
        break;

}

