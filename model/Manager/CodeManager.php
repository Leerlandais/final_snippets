<?php

namespace model\Manager;

use model\Abstract\AbstractManager;
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

public function updateExistingCode(CodeMapping $mapping) : bool
{
    $id = $mapping->getSnipCodeId();
    $title = $mapping->getSnipCodeTitle();
    $desc  = $mapping->getSnipCodeDesc();
    $code  = $mapping->getSnipCodeCode();
    $type  = $mapping->getSnipCodeType();

    $stmt = $this->db->prepare("UPDATE `snip_main_code` 
                                      SET `snip_code_title`= :title,
                                          `snip_code_desc`= :desc,
                                          `snip_code_code`= :code,
                                          `snip_code_type`= :type 
                                      WHERE `snip_code_id` = :id");

    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':desc', $desc);
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    if($stmt->rowCount() === 0) return false;
    return true;
}

public function getDataByType($type) : array|bool
{
    $stmt = $this->db->prepare("SELECT snip_code_id, 
                                             snip_code_title,
                                             snip_code_desc 
                                      FROM snip_main_code 
                                      WHERE snip_code_type = :type");
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


// For the moment, this isn't really used. I first need to figure out how to correctly map the data when using related tables (e.g. html_has_code)
public function getAllCodesForLink()
{
    $query = $this->db->query("SELECT snip_code_id, snip_code_title, snip_code_desc, snip_code_type FROM snip_main_code ORDER BY snip_code_type");
    $datas = $query->fetchAll();
    $query->closeCursor();
    $dataObject = [];
    foreach ($datas as $data) {
        $dataObject[] = new CodeMapping($data);
    }
    return $dataObject;
}

} // end Class

