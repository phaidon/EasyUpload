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

class EasyUpload_Controller_User extends Zikula_AbstractController
{

    /**
    * Main page - Redirect to browseImages
    *
    * @return Redirect
    */

    public function main()
    {
        return $this->browseImages();
    }

    /**
    * Browse images
    *
    * @param array $args POST/REQUEST vars
    * @return The render var
    */   
    
    public function browseImages()
    {
        // Security check
        if (!SecurityUtil::checkPermission('EasyUpload::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        
        $images = array();
        if ($handle = opendir($this->getVar('uploads_path'))) {

            $allowedExtensions = array('png', 'jpg', 'gif', 'jpeg');
            while (false !== ($file = readdir($handle))) {
                $extension = end(explode(".", $file));
                if ( in_array($extension, $allowedExtensions) ) {
                    $thumb = $upload_path.'/thumbs/'.$file.'.jpg';
                    if(!file_exists($thumb)) {
                        $thumb = $upload_path.'/'.$file;
                    }                    
                    $images[$thumb] = $file;
                }
            }

            closedir($handle);
        }

        $this->view->assign('images', $images );
        $this->view->assign('baseUrl', System::getBaseURL() );
        
        echo $this->view->fetch('user/browseImages.tpl');
        System::shutDown();
    }
    
    public function uploadImage($args)
    {
        $data = $_FILES['file'];
        $data['fileType'] = 'Image';
        ModUtil::apiFunc('EasyUpload','user','uploadFile', $data );
        return System::redirect(ModUtil::url('EasyUpload', 'user', 'browseImages') );
    }

}