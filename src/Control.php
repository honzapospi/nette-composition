<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace JP\Composition\UI;

/**
 * Control
 * @author Jan Pospisil
 */

class Control extends \Nette\Application\UI\Control {

	public $onBeforeRender;

	/**
	 * @var ITemplateControl
	 */
	private $templateControl;

	public function setTemplateControl(ITemplateControl $templateControl){
		$this->templateControl = $templateControl;
	}

	public function setupConfigurator(IControlConfigurator $controlConfigurator){
		$controlConfigurator->configure($this);
	}

	public function render() {
		$template = $this->getTemplate();
		$this->onBeforeRender($this);
		$this->beforeRender();
		if(!$template->getFile() && $this->templateControl)
			$template->setFile($this->templateControl->formatTemplateFile($this));
		$template->render();
	}

	protected function beforeRender(){

	}

}
