<?php

/**
 * Copyright EasyUpload Team 2011
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package EasyUpload
 * @link http://code.zikula.org/socialise
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

class EasyUpload_Api_Admin extends Zikula_Api {

    // get available admin panel links
    public function getlinks($args)
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
