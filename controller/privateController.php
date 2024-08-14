<?php


use model\Manager\UserManager;
use model\Manager\FormManager;

use model\Mapping\FormMapping;


$formManager = new FormManager($db);

// ADD NEW FORM

if (isset(
    $_POST["addFormClass"],
    $_POST["addFormType"],
    $_POST["addFormTitle"],
    $_POST["addFormDesc"],
    $_POST["addFormImage"],
    $_POST["addFormCode"],
    $_POST["addFormCall"],
    $_POST["addFormFunc"],
    $_POST["addFormJs"]
)) {
    $formMappingData = [
        'snip_form_class' => $_POST["addFormClass"],
        'snip_form_type' => $_POST["addFormType"],
        'snip_form_title' => $_POST["addFormTitle"],
        'snip_form_desc' => $_POST["addFormDesc"],
        'snip_form_img' => $_POST["addFormImage"],
        'snip_form_code' => $_POST["addFormCode"],
        'snip_form_call' => $_POST["addFormCall"],
        'snip_form_func' => $_POST["addFormFunc"],
        'snip_form_js' => $_POST["addFormJs"]
    ];

    $formMapping = new FormMapping($formMappingData);
    $formManager->addNewForm($formMapping);
}

if (isset(
    $_POST["updateFormClass"],
    $_POST["updateFormType"],
    $_POST["updateFormTitle"],
    $_POST["updateFormDesc"],
    $_POST["updateFormImage"],
    $_POST["updateFormCode"],
    $_POST["updateFormCall"],
    $_POST["updateFormFunc"],
    $_POST["updateFormJs"]
)) {
    $formMappingData = [
        'snip_form_class' => $_POST["updateFormClass"],
        'snip_form_type' => $_POST["updateFormType"],
        'snip_form_title' => $_POST["updateFormTitle"],
        'snip_form_desc' => $_POST["updateFormDesc"],
        'snip_form_img' => $_POST["updateFormImage"],
        'snip_form_code' => $_POST["updateFormCode"],
        'snip_form_call' => $_POST["updateFormCall"],
        'snip_form_func' => $_POST["updateFormFunc"],
        'snip_form_js' => $_POST["updateFormJs"]
    ];

    $formMapping = new FormMapping($formMappingData);
    $formManager->updateExistingForm($formMapping);
}



$route = $_GET['route'] ?? 'home';
switch ($route) {
    case 'home':
        echo $twig->render('privateView/private.home.html.twig');
        break;
    case 'logout':
        $userManager = new UserManager($db);
        $userManager->userLogout();
        header ("Location: ./");
        break;


}

