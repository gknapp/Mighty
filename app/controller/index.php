<?php

class Controller_Index extends Lib_Controller {

	public function index() {
		$this->view->render('index' . DS . 'index.phtml');
	}

}