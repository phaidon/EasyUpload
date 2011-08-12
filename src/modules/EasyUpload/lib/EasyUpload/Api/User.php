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

class EasyUpload_Api_User extends Zikula_AbstractApi 
{
    
    /**
    * upload file
    *
    * @param array $args file values
    * @return status(bool)
    */

    public function uploadFile($args)
    {
        // Security check
		if (!SecurityUtil::checkPermission('EasyUpload::', '::', ACCESS_ADD)) {
			return LogUtil::registerPermissionError();
		}
        
        extract($args);

        $target  = $this->getVar('uploads_path') . "/" . $name;

        //Check file extension
        if( !empty($fileType) and $fileType == 'Image') {
            $allowedExtensions = array('png', 'jpg', 'gif', 'jpeg');
        } else {
            $allowedExtensions = array("txt", "zip", "doc", "pdf", "odt", "ppt", 'png', 'jpg', 'gif');
        }
        $ex = end(explode(".", $name));
        if ( !in_array($ex, $allowedExtensions) ) {
            return LogUtil::registerError($this->__f('Error! Invalid file type: %1$s', $ex));
        }

        //Check file size
        if($size >= 16000000) {
            return LogUtil::registerError($this->__('Error! Your file is too big. The limit is 14 MB.'));
        }


        //If everything is ok we try to upload it
        if (file_exists($target)) {
                return LogUtil::registerError($this->__('Error! Sorry, but the file already exists.'));
        }

        if(move_uploaded_file($tmp_name, $target))
        {
            $this->createThumbnail($data);
            return true;
        }
        else
        {
            return LogUtil::registerError($this->__('Error! Sorry, there was a problem uploading your file.'));
        }  
    }

   /**
    * Create thumbnail
    *
    * @param array $args thumbnail values
    * @return status(bool)
    */
    
    public function createThumbnail($args) {
        
        // Security check
		if (!SecurityUtil::checkPermission('EasyUpload::', '::', ACCESS_ADD)) {
			return LogUtil::registerPermissionError();
		}
        
        extract($args);
            
        if(empty($height) ) {
            $height = 120;
        }

        /*** the image file to thumbnail ***/
        $image = $this->getVar('uploads_path') . '/' . $name;

        if(!file_exists($image))
        {
            return LogUtil::registerError($this->__('Error! No file found'));
        }
        else
        {
            /*** image info ***/
            list($width_orig, $height_orig, $image_type) = getimagesize($image);

            /*** check for a supported image type ***/
            if($image_type > 3 )
            {
                return LogUtil::registerError($this->__f('Error! Invalid image: %1$s', $image));
            }
            else
            {
                /*** thumb image name ***/
                $thumb = $this->getVar('uploads_path') . '/thumbs/'.$name.'.jpg';

                /*** maintain aspect ratio ***/
                $width = (int) (($height / $height_orig) * $width_orig);

                /*** resample the image ***/
                $image_p = imagecreatetruecolor($width, $height);
                if($image_type == 2 ) {
                    $image = imageCreateFromJpeg($image);
                } else if ($image_type == 3 ) {
                    $image = imageCreateFromPng($image);
                }
                imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

                /*** write the file to disc ***/
                if(!is_writeable(dirname($thumb)))
                {
                    return LogUtil::registerError($this->__f('Error! Unable to write image in %1$s', dirname($thumb)));
                }
                else
                {
                    imagejpeg($image_p, $thumb, 100);  
                }
            }
        }
    return true;
    }
}
