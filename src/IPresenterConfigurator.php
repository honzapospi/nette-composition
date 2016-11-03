<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace JP\Composition\UI;

/**
 * IPresenterConfigurator
 * @author Jan Pospisil
 */

interface IPresenterConfigurator  {

	/**
	 * @param Presenter $presenter
	 * @return mixed
	 */
	public function configure(Presenter $presenter);
	
}
