<?php

class Controller_Error extends Lib_Controller {

	public function preDispatch() {
		parent :: preDispatch();
		header("HTTP/1.1 500 Internal Server Error");
	}

	public function index() {
		$this->view->error = "<pre>" . print_r(debug_backtrace(), true) . "</pre>";
		$this->view->render();
	}

	public function error($num, $msg, $file, $line) {
		$this->view->error = sprintf(
			"<p>%s in %s on line %s</p>", $msg, $file, $line
		);
		$this->view->render();
	}

	public function exception($e) {
		$this->view->error = sprintf(
			"<p>%s<br/>in %s on line %s</p>",
			$e->getMessage(), $e->getFile(), $e->getLine()
		);
		$this->view->render('error' . DS . 'index.phtml');
	}

}
