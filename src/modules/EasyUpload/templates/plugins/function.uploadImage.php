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

/**
 * Smarty function to show a link to the user settings
 *
 * Example
 *
 *   {uploadImage}
 *
 * @since        18 February 2011
 * @return       string the atom ID
 */
function smarty_function_uploadImage($params, &$smarty)
{   
    if (!SecurityUtil::checkPermission('EasyUpload::', '::', ACCESS_ADD) ){
        return;
    }
    return $smarty->fetch('plugin/uploadImage.tpl');
}
