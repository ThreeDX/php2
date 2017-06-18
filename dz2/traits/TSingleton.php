<?php

trait TSingleton
{
    private static $instance = null;

    final private function __construct() {
		$this->init();
	}
    final private function __clone() {}
    final private function __wakeup() {}

    /** @return static */
    final public static function getInstance() {
        if (is_null(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }
	
	protected function init() {}
}