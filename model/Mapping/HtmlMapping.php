<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitTestString;
use model\Trait\TraitTestInt;
use model\Trait\TraitLaundryRoom;
use Exception;
class HtmlMapping extends AbstractMapping
{
    use TraitTestString;
    use TraitTestInt;
    use TraitLaundryRoom;

    protected ?int $snip_html_id;
    protected ?string $snip_html_title;
    protected ?string $snip_html_desc;
    protected ?string $snip_html_img;
    protected ?string $snip_html_code;

    public function getSnipHtmlId(): ?int
    {
        return $this->snip_html_id;
    }

    public function setSnipHtmlId(?int $snip_html_id): void
    {
        if(!$this->verifyInt($snip_html_id)) throw new Exception('ID must be an integer');
        $snip_html_id = $this->intClean($snip_html_id);
        $this->snip_html_id = $snip_html_id;
    }

    public function getSnipHtmlTitle(): ?string
    {
        return htmlspecialchars_decode($this->snip_html_title);
    }

    public function setSnipHtmlTitle(?string $snip_html_title): void
    {
        if(!$this->verifyString($snip_html_title)) throw new Exception('Title cannot be empty');
        $snip_html_title = $this->standardClean($snip_html_title);
        $this->snip_html_title = $snip_html_title;
    }

    public function getSnipHtmlDesc(): ?string
    {
        return htmlspecialchars_decode($this->snip_html_desc);
    }

    public function setSnipHtmlDesc(?string $snip_html_desc): void
    {
        if(!$this->verifyString($snip_html_desc)) throw new Exception('Description cannot be empty');
        $snip_html_desc = $this->standardClean($snip_html_desc);
        $this->snip_html_desc = $snip_html_desc;
    }

    public function getSnipHtmlImg(): ?string
    {
        return $this->snip_html_img;
    }

    public function setSnipHtmlImg(?string $snip_html_img): void
    {
        if(!$this->verifyString($snip_html_img)) throw new Exception('Image cannot be empty');
        $snip_html_img = $this->standardClean($snip_html_img);
        $this->snip_html_img = $snip_html_img;
    }

    public function getSnipHtmlCode(): ?string
    {
        return htmlspecialchars_decode($this->snip_html_code);
    }

    public function setSnipHtmlCode(?string $snip_html_code): void
    {
        if(!$this->verifyString($snip_html_code)) throw new Exception('Code cannot be empty');
        $snip_html_code = $this->simpleTrim($snip_html_code);
        $this->snip_html_code = $snip_html_code;
    }


}