<?php

/**
 * Copyright EasyUpload Team 2011
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package EasyUpload
 * @link https://github.com/phaidon/EasyUpload
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

class EasyUpload_Api_Admin extends Zikula_AbstractApi {

    // get available admin panel links
    public function getlinks()
    {

        // create array of links
        $links = array();
        $links[] = array(
            'url' => ModUtil::url('EasyUpload', 'admin', 'modifyconfig'), 
            'text' => $this->__('Settings'),
            'class' => 'z-icon-es-config'
        );
        return $links;
    }

}
