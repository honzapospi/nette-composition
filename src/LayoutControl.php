<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace JP\Composition\UI;
use Nette\ComponentModel\IComponent;
use Nette\SmartObject;

/**
 * Layoutcontrol
 * @author Jan Pospisil
 */

abstract class LayoutControl {
	use SmartObject;

	/**
	 * Component factory. Delegates the creation of components to a createComponent<Name> method.
	 * @param  string      component name
	 * @return IComponent  the created component (optionally)
	 */
	public function createComponent($name) {
		$method = 'createComponent'.ucfirst($name);
		if(method_exists($this, $method)){
			return $this->$method();
		}
	}

}
