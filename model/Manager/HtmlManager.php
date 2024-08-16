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


} // end Class