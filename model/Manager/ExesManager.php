<?php

namespace model\Manager;

use model\Abstract\AbstractManager;
use model\Mapping\ExesMapping;
use model\Trait\TraitLaundryRoom;
class ExesManager extends AbstractManager
{

    use TraitLaundryRoom;

    public function addNewExec(ExesMapping $mapping) : bool
    {
        $title = $mapping->getSnipExesTitle();
        $desc  = $mapping->getSnipExesDesc();
        $code  = $mapping->getSnipExesCodeLoc();

        $stmt = $this->db->prepare("INSERT INTO snip_exes_code
                                                (snip_exes_title, 
                                                 snip_exes_desc, 
                                                 snip_exes_code_loc)
                                      VALUES (:title, :desc, :code)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        if($stmt->rowCount() === 0) return false;
        return true;
    }

    public function getAllExes() : array|bool
    {
        $query = $this->db->query("SELECT * FROM snip_exes_code");
        $datas = $query->fetchAll();
        $query->closeCursor();
        $dataObj = [];
        foreach($datas as $data) {
            $dataObj[] = new ExesMapping($data);
        }
        return $dataObj;
    }

} // end class