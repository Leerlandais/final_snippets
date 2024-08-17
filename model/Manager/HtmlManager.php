<?php

namespace model\Manager;

use model\Abstract\AbstractManager;
use model\Interface\InterfaceManager;
use model\Mapping\HtmlMapping;
use model\Trait\TraitLaundryRoom;
use PDO;

class HtmlManager extends AbstractManager implements InterfaceManager
{
    use TraitLaundryRoom;

    public function addNewHtml(HtmlMapping $mapping) : bool
    {
        $title = $mapping->getSnipHtmlTitle();
        $desc = $mapping->getSnipHtmlDesc();
        $image = $mapping->getSnipHtmlImg();
        $code = $mapping->getSnipHtmlCode();

        $stmt = $this->db->prepare("INSERT INTO snip_html_code
                                                        (snip_html_title, 
                                                         snip_html_desc, 
                                                         snip_html_img, 
                                                         snip_html_code)
                                            VALUES(?, ?, ?, ?)");
        $stmt->execute([$title, $desc, $image, $code]);
        if ($stmt->rowCount() === 0) return false;
        return true;
    }

    public function getLastIdForLink() : HtmlMapping|bool
    {
        $query = $this->db->query("SELECT snip_html_id,
                                                snip_html_title
                                         FROM snip_html_code 
                                         ORDER BY snip_html_id DESC 
                                         LIMIT 1");
        $data = $query->fetch();
        $query->closeCursor();
        return new HtmlMapping($data);
    }

    public function getHtml() : array|bool
    {
        $query = $this->db->query("SELECT snip_html_id,
                                                snip_html_desc,
                                                snip_html_img
                                         FROM snip_html_code");
        $datas = $query->fetchAll();
        if(empty($datas)) return false;
        $query->closeCursor();
        $dataObject = [];
        foreach ($datas as $data) {
            $dataObject[] = new HtmlMapping($data);
        }
        return $dataObject;
    }

    public function getHtmlById(int $id) : ?HtmlMapping
    {
        $stmt = $this->db->prepare("SELECT h.*, c.* 
                                          FROM snip_html_code h 
                                          JOIN snip_html_has_code hhc
                                          ON hhc.snip_has_html_id = h.snip_html_id
                                          JOIN snip_main_code c
                                          ON hhc.snip_has_code_id = c.snip_code_id
                                          WHERE h.snip_html_id = ?");
        $stmt->execute([$id]);
        if ($stmt->rowCount() === 0) return null;
        $data = $stmt->fetch();
        $stmt->closeCursor();

        return new HtmlMapping($data);
    }

} // end Class