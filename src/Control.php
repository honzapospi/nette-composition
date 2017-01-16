<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace JP\Composition\UI;
use Nette\Localization\ITranslator;

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

	/**
	 * @var ITranslator
	 */
	private $translator;

	/**
	 * @param ITranslator $translator
	 */
	public function setTranslator(ITranslator $translator){
		$this->translator = $translator;
		$this->onBeforeRender[] = function($control, $template){
			$template->setTranslator($this->translator);
		};
	}

	/**
	 * @param $message
	 * @param null $args
	 * @param null $count
	 * @return int
	 */
	protected function translate($message, $args = null, $count = null){
		$return = $this->translator ? $this->translator->translate($message) : $message;
		$return = vsprintf($return, is_array($args) ? $args : array($args));
		return $return;
	}

	/**
	 * @param ITemplateControl $templateControl
	 */
	public function setTemplateControl(ITemplateControl $templateControl){
		$this->templateControl = $templateControl;
	}

	/**
	 * @param IControlConfigurator $controlConfigurator
	 */
	public function setupConfigurator(IControlConfigurator $controlConfigurator){
		$controlConfigurator->configure($this);
	}

	/**
	 * Render control
	 */
	public function render() {
		$template = $this->getTemplate();
		$this->onBeforeRender($this, $template);
		$this->beforeRender();
		if(!$template->getFile() && $this->templateControl)
			$template->setFile($this->templateControl->formatTemplateFile($this));
		$template->render();
	}

	protected function beforeRender(){

	}

}
