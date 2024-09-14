<?php

// Seeming as all Managers need a __construct, it seems logical to move it to an Abstract Class and extend it
// change MyPDO to the necessary
namespace model\Abstract;
use model\MyPDO;

abstract class AbstractManager {
    protected MyPDO $db;

    public function __construct(MyPDO $db) {
        $this->db = $db;
    }
}