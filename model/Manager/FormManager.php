<?php

namespace model\Manager;

use model\Abstract\AbstractManager;
use model\Mapping\FormMapping;



class FormManager extends AbstractManager
{

    public function addNewForm(FormMapping $formMapping): void {
        $class = $formMapping->getSnipFormClass();
        $type = $formMapping->getSnipFormType();
        $title = $formMapping->getSnipFormTitle();
        $desc = $formMapping->getSnipFormDesc();
        $image = $formMapping->getSnipFormImg();
        $code = $formMapping->getSnipFormCode();
        $call = $formMapping->getSnipFormCall();
        $func = $formMapping->getSnipFormFunc();
        $js = $formMapping->getSnipFormJs();


        $query = $this->db->prepare("INSERT INTO `snippets_forms`
                                    (`snip_form_class`, 
                                    `snip_form_type`, 
                                    `snip_form_title`, 
                                    `snip_form_desc`, 
                                    `snip_form_img`, 
                                    `snip_form_code`,
                                    `snip_form_call`,
                                    `snip_form_func`,
                                    `snip_form_js`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $query->execute([$class, $type, $title, $desc, $image, $code, $call, $func, $js]);

    }

    public function updateExistingForm($formMapping) : void
    {
        $class = $formMapping->getSnipFormClass();
        $type = $formMapping->getSnipFormType();
        $title = $formMapping->getSnipFormTitle();
        $desc = $formMapping->getSnipFormDesc();
        $image = $formMapping->getSnipFormImg();
        $code = $formMapping->getSnipFormCode();
        $call = $formMapping->getSnipFormCall();
        $func = $formMapping->getSnipFormFunc();
        $js = $formMapping->getSnipFormJs();

        $stmt = $this->db->prepare(
            "UPDATE `snippets_forms` SET 
                            `snip_form_class`= ?,
                            `snip_form_type`= ?,
                            `snip_form_title`= ?,
                            `snip_form_desc`= ?,
                            `snip_form_img`= ?,
                            `snip_form_code`= ?,
                            `snip_form_call`= ?,
                            `snip_form_func`= ?,
                            `snip_form_js`= ?
                    WHERE `snip_form_id` = ?");

        $stmt->bindParam(1, $class);
        $stmt->bindParam(2, $type);
        $stmt->bindParam(3, $title);
        $stmt->bindParam(4, $desc);
        $stmt->bindParam(5, $image);
        $stmt->bindParam(6, $code);
        $stmt->bindParam(7, $call);
        $stmt->bindParam(8, $func);
        $stmt->bindParam(9, $js);
        $stmt->bindParam(10, $id);

        $stmt->execute();

    }



} // end Class


/*
    public function getDataByType($class, $type) : array|bool  {
        $stmt = $this->db->prepare("SELECT snip_form_id AS id,
                                                 snip_form_class AS class,
                                                 snip_form_title AS title,
                                                 snip_form_desc AS descp,
                                                 snip_form_img AS img
                                          FROM `snippets_forms`
                                          WHERE snip_form_class = ?
                                          AND snip_form_type = ?");
        $stmt->execute([$class, $type]);
        if ($stmt->rowCount() === 0) return false;

        $result = $stmt->fetchAll();
        $stmt->closeCursor();
        return $result;
    }

    public  function selectAllDataForLink() : array|bool {
        $query = $this->db->query("SELECT snip_form_id,
                                         snip_form_title
                                         FROM `snippets_forms`");
        if($query->rowCount() === 0) return false;
        $formMapping = $query->fetchAll();

        $query->closeCursor();
        $formObject = [];

        foreach ($formMapping as $form) {
            $formObject[] = new FormMapping($form);
        }

        return $formObject;
    }

*/