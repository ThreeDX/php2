<?php

namespace simpleengine\models\rep;

use simpleengine\core\DB;

abstract class AbstractRep {
    /**
     * @var DB
     */
    protected $db;

    public function __construct() {
        $this->db = DB::instance();
    }

} 