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


class EasyUpload_Controller_Admin extends Zikula_Controller
{

    // main function
    public function main()
    {
        return $this->modifyconfig();
    }

    // main function
    public function modifyconfig()
    {

        // Security check
        if (!SecurityUtil::checkPermission( 'EasyUpload::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        // Create output object
        $form = FormUtil::newForm('EasyUpload', $this);

        // Return the output that has been generated by this function
        return $form->execute('admin/modifyconfig.tpl', new EasyUpload_Handler_ModifyConfig());
    }

}