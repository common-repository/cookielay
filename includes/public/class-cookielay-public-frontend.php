<?php
/**
 * Cookielay Frontend Class (Abstract)
 * 
 * The abstract class for the public classes.
 * 
 * @package cookielay
 * @subpackage cookielay/includes/public
 */

abstract class Cookielay_Public_Frontend {
    protected $loader;
    protected $status;

    function __construct($loader, $status) {
        $this->loader = $loader;
        $this->status = $status;
    }

    abstract public function run();
}

?>