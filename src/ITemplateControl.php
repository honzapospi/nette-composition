<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace JP\Composition\UI;

/**
 * ITemplateControl
 * @author Jan Pospisil
 */

interface ITemplateControl  {

	/**
	 * @param \Nette\Application\UI\Control $control
	 * @return string filename
	 */
	public function formatTemplateFile(\Nette\Application\UI\Control $control);

	/**
	 * @param Presenter $control
	 * @return string filename
	 */
	public function formatLayoutTemplateFile(Presenter $control);

	/**
	 * @param $layout
	 * @return void
	 */
	public function setLayout($layout);

	
}
