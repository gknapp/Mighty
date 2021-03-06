<?php

class Lib_Application {

	private $dispatcher;
	private $container;

	private $autoLoaderLibPrefix;
	private $autoLoaderLibLength;

	public function __construct() {
		$this->autoLoaderLibPrefix = ucfirst(strtolower(LIBDIR)) . '_';
		$this->autoLoaderLibLength = strlen($this->autoLoaderLibPrefix);
		spl_autoload_register(array($this, 'autoload'));
	}

	public function setDispatcher($dispatcher) {
		$this->dispatcher = $dispatcher;
	}

	public function run($container) {
		$this->container = $container;
		set_exception_handler(array($this, 'onException'));
		set_error_handler(array($this, 'onError'));
		$this->dispatcher->run($container);
	}

	// register autoloader, surpress exceptions, prepend default loader
	public function registerAutoloader($loader) {
		if (!empty($loader) && is_callable($loader))
			spl_autoload_register($loader, false, true);
	}

	public function autoload($class) {
		if (class_exists($class, false) || interface_exists($class, false))
			return;

		$file = ($this->_libraryClass($class) ? '' : APPDIR . DS)
			. str_replace('_', DS, strtolower($class)) . '.php';

		if (!file_exists(BASEDIR . $file))
			return;

		require_once $file;

		if (!class_exists($class, false) && !interface_exists($class, false)) {
			die("Loaded '$file' but '$class' not found within\n");
		}
	}

	private function _libraryClass($class) {
		$classPrefix = substr($class, 0, $this->autoLoaderLibLength);
		return ($classPrefix == $this->autoLoaderLibPrefix);
	}

	public function onError($num, $msg, $file, $line) {
		$this->dispatcher->onError($this->container, $num, $msg, $file, $line);
	}

	public function onException($e) {
		$this->dispatcher->onException($this->container, $e);
	}

}
