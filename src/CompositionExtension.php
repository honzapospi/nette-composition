<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace JP\Composition;
use JP\Composition\UI\Control;
use JP\Composition\UI\Presenter;
use Nette\DI\CompilerExtension;
use Nette\DI\Statement;
use Nette\Reflection\ClassType;

/**
 * CompositionExtension
 * @author Jan Pospisil
 */

class CompositionExtension extends CompilerExtension {

	public function beforeCompile() {
		$builder = $this->getContainerBuilder();
		foreach($builder->getDefinitions() as $name => $definition){
			$reflection = new ClassType($definition->getClass());
			if($reflection->is(Control::class)){
				$definition->addSetup('setupConfigurator', array(new Statement('@JP\Composition\UI\IControlConfigurator')));
			} elseif($reflection->is(Presenter::class)){
				$definition->addSetup('setupConfigurator', array(new Statement('@JP\Composition\UI\IPresenterConfigurator')));
			}
		}
	}

}
