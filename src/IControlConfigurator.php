<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace JP\Composition\UI;

use Nette;

/**
 * IControlConfigurator
 * @author Jan Pospisil
 */

interface IControlConfigurator  {

	public function configure(Nette\Application\UI\Control $control);
	
}
