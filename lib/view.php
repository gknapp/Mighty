<?php

/**
 * Subclass Zend_View to capture output
 */

class Lib_View extends Zend_View {

	public $buffer;

	public function render($file = null) {
		if (empty($file)) {
			$file = $this->_getFromActionDir($this->_getDefaultView());
		}
		return $this->buffer = parent::render($file);
	}

	protected function _getDefaultView() {
		return 'index.phtml';
	}

	protected function _getFromActionDir($file) {
		$subdir = $this->request->getControllerName();
		if (empty($subdir)) {
			$subdir = Lib_Dispatcher::DEFAULT_CONTROLLER;
		}
		return $subdir . DS . $file;
	}

}
