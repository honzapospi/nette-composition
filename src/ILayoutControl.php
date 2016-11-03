<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace JP\Composition\UI;
use Nette\Application\UI\ITemplate;
use Nette\ComponentModel\IComponent;

/**
 * ILayoutControl
 * @author Jan Pospisil
 */

interface ILayoutControl  {

	/**
	 * Setup a nd configure layout
	 * @param ITemplate $template
	 * @param Presenter $presenter
	 * @return void
	 */
	public function setupLayout(ITemplate $template, Presenter $presenter);

	/**
	 * Component factory. Delegates the creation of components to a createComponent<Name> method.
	 * @param  string      component name
	 * @return IComponent  the created component (optionally)
	 */
	public function createComponent($name);
	
}
