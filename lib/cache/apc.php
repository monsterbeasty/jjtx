<?php

class Cache_APC {

    var $iTtl = 3600; // Time To Live
    var $bEnabled = false; // APC enabled?

    // constructor
    function Cache_APC() {
        $this->bEnabled = extension_loaded('apc');
    }

    // get data from memory
    function get_data($sKey) {
        $bRes = false;
        $vData = apc_fetch($sKey, $bRes);
        return ($bRes) ? $vData :null;
    }

    // save data to memory
    function set_data($sKey, $vData) {
        return apc_store($sKey, $vData, $this->iTtl);
    }

    // delete data from memory
    function del_data($sKey) {
        $bRes = false;
        apc_fetch($sKey, $bRes);
        return ($bRes) ? apc_delete($sKey) : true;
    }
    
}

?>
