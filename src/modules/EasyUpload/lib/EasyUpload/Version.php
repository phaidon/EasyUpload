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

class EasyUpload_Version extends Zikula_AbstractVersion
{
	public function getMetaData()
	{
            return array(
                'displayname'    => $this->__('Easy Upload'),
                'description'    => $this->__('An easy way to upload files in the Scribite! editors.'),
                'version'        => '0.1.0',
                //!url must be different to displayname
                'url'            => $this->__('EasyUpload'),
                'author'         => 'Fabian Wuertz',
                'contact'        => 'https://github.com/phaidon/EasyUpload',
                'core_min'       => '1.3.0', // requires minimum 1.3.0 or later
            );
	}
}