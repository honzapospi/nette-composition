<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace JP\Composition\UI;
use Nette\Localization\ITranslator;

/**
 * Presenter
 * @author Jan Pospisil
 */

abstract class Presenter extends \Nette\Application\UI\Presenter {

	public $onStartup;
	public $onBeforeRender;
	public $onAfterRender;
	private $layoutControl;
	/**
	 * @var ITemplateControl
	 */
	private $templateControl;

	private $translator;

	/**
	 * @param IPresenterConfigurator $presenterConfigurator
	 */
	public function setupConfigurator(IPresenterConfigurator $presenterConfigurator){
		$presenterConfigurator->configure($this);
	}

	/**
	 * @param ITemplateControl $templateControl
	 */
	public function setTemplateControl(ITemplateControl $templateControl){
		$this->templateControl = $templateControl;
	}

	/**
	 * @param ITranslator $translator
	 */
	public function setTranslator(ITranslator $translator){
		$this->translator = $translator;
	}

	/**
	 * @param ILayoutControl $layoutControl
	 */
	public function setLayoutControl(ILayoutControl $layoutControl){
		$this->layoutControl = $layoutControl;
	}

	/**
	 * @return void
	 */
	protected function startup(){
		parent::startup();
		$this->onStartup($this);
	}

	/**
	 * @param $name
	 * @return \Nette\ComponentModel\IComponent
	 */
	protected function createComponent($name){
		if($this->layoutControl && $return = $this->layoutControl->createComponent($name))
			return $return;
		return parent::createComponent($name);
	}

	/**
	 * Common render method.
	 * @return void
	 */
	protected function beforeRender(){
		parent::beforeRender();
		$this->onBeforeRender($this);
		if($this->layoutControl)
			$this->layoutControl->setupLayout($this->template, $this);
	}

	/**
	 * Common render method.
	 * @return void
	 */
	protected function afterRender(){
		parent::afterRender();
		$this->onAfterRender($this);
	}

	/**
	 * Formats view template file names.
	 * @return array
	 */
	public function formatTemplateFiles(){
		if($this->templateControl)
			return array($this->templateControl->formatTemplateFile($this));
		return parent::formatTemplateFiles();
	}

	/**
	 * Formats layout template file names.
	 * @return array
	 */
	public function formatLayoutTemplateFiles(){
		if($this->templateControl)
			return array($this->templateControl->formatLayoutTemplateFile($this));
		return parent::formatLayoutTemplateFiles();
	}

}