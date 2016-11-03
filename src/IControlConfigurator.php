<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace JP\Composition\UI;
use Nette\Application\UI\Control;

/**
 * IControlConfigurator
 * @author Jan Pospisil
 */

interface IControlConfigurator  {

	public function configure(Control $control);
	
}
