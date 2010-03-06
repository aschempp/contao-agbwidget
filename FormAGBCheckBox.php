<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005-2009 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Andreas Schempp 2009
 * @author     Andreas Schempp <andreas@schempp.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 * @version    $Id$
 */


class FormAGBCheckBox extends Widget
{
	
	/**
	 * Submit user input
	 * @var boolean
	 */
	protected $blnSubmitInput = false;
	

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'form_widget';
	
	
	protected function validator($varInput)
	{
		if (!$varInput)
		{
			$this->addError($GLOBALS['TL_LANG']['ERR']['agb']);
		}

		return parent::validator(trim($varInput));
	}
	
	
	public function generateLabel()
	{
		return '';
	}
	
	
	public function generate()
	{
		$strOption = sprintf('<span><input type="hidden" name="%s" value="" /><input type="checkbox" name="%s" id="opt_%s" class="checkbox" value="1"%s%s /> <label id="lbl_%s" for="opt_%s">%s</label></span>',
							  $this->strName,
							  $this->strName,
							  $this->strId,
							  ($this->varValue ? ' checked="checked"' : ''),
							  $this->getAttributes(),
							  $this->strId,
							  $this->strId,
							  (strlen($this->label) ? $this->label : $GLOBALS['TL_LANG']['MSC']['agb']));

        return sprintf('<div id="ctrl_%s" class="checkbox_container%s">%s</div>',
						$this->strId,
						(strlen($this->strClass) ? ' ' . $this->strClass : ''),
						$strOption) . $this->addSubmit();
	}
}

