<?php

namespace model\Manager;

use model\Abstract\AbstractManager;
use model\MyPDO;
use model\Interface\InterfaceManager;
use model\Mapping\CodeMapping;
use model\Trait\TraitLaundryRoom;

class CodeManager extends AbstractManager implements InterfaceManager
{
    use TraitLaundryRoom;
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

public function getDataByType($type) : array|bool
{
    $type = $this->standardClean($type);
    $stmt = $this->db->prepare("SELECT * FROM snip_main_code WHERE snip_code_type = :type");
    $stmt->bindParam(':type', $type);
    $stmt->execute();
    if($stmt->rowCount() === 0) return false;
    $dataMapping = $stmt->fetchAll();
    $stmt->closeCursor();
    $dataObject = [];

    foreach ($dataMapping as $data) {
        $dataObject[] = new CodeMapping($data);
    }
    return $dataObject;
}

public function getOneDataById(int $id) : array|bool
{
    $id = $this->intClean($id);
    $stmt = $this->db->prepare("SELECT * FROM snip_main_code WHERE snip_code_id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    if($stmt->rowCount() === 0) return false;
    $codeMapping = $stmt->fetchAll();
    $stmt->closeCursor();
    $codeObject = [];
    foreach ($codeMapping as $code) {
        $codeObject[] = new CodeMapping($code);
    }
    return $codeObject;
}

} // end Class