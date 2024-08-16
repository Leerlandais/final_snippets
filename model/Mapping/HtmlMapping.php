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
        $this->snip_html_id = $snip_html_id;
    }

    public function getSnipHtmlTitle(): ?string
    {
        return $this->snip_html_title;
    }

    public function setSnipHtmlTitle(?string $snip_html_title): void
    {
        $this->snip_html_title = $snip_html_title;
    }

    public function getSnipHtmlDesc(): ?string
    {
        return $this->snip_html_desc;
    }

    public function setSnipHtmlDesc(?string $snip_html_desc): void
    {
        $this->snip_html_desc = $snip_html_desc;
    }

    public function getSnipHtmlImg(): ?string
    {
        return $this->snip_html_img;
    }

    public function setSnipHtmlImg(?string $snip_html_img): void
    {
        $this->snip_html_img = $snip_html_img;
    }

    public function getSnipHtmlCode(): ?string
    {
        return $this->snip_html_code;
    }

    public function setSnipHtmlCode(?string $snip_html_code): void
    {
        $this->snip_html_code = $snip_html_code;
    }

    
}