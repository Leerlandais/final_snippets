<?php

// In this project, I included the Interface more as a placeholder
// I don't see much avantage to having an Interface for a solo project!

namespace model\Interface;

use model\MyPDO;
use Exception;

use model\Abstract\AbstractMapping;


interface InterfaceManager
{
    public function __construct(MyPDO $pdo);

}
