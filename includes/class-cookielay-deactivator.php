<?php
/**
 * Cookielay Deactivator Class
 * 
 * Used fo the plugin deactivation.
 * 
 * @package cookielay
 * @subpackage cookielay/includes
 */

class Cookielay_Deactivator {
    public function deactivate() {
        flush_rewrite_rules();
    }
}

?>