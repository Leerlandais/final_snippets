<?php

namespace model\Manager;

use model\Abstract\AbstractManager;
use model\MyPDO;
use model\Interface\InterfaceManager;
use model\Mapping\CodeMapping;

class CodeManager extends AbstractManager implements InterfaceManager
{
public function addNewCode(CodeMapping $mapping) : bool
{
    $title = $mapping->getSnipCodeTitle();
    $desc  = $mapping->getSnipCodeDesc();
    $code  = $mapping->getSnipCodeCode();
    $type  = $mapping->getSnipCodeType();

    $stmt = $this->db->prepare("INSERT INTO snip_main_code
                                                (snip_code_title, 
                                                 snip_code_desc, 
                                                 snip_code_code, 
                                                 snip_code_type)
                                      VALUES (:title, :desc, :code, :type)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':desc', $desc);
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':type', $type);
    $stmt->execute();
    if($stmt->rowCount() === 0) return false;
    return true;
}



} // end Class