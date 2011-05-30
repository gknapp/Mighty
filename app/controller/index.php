<?php

class Controller_Index extends Lib_Controller {

	public function index() {
		$this->view->version = $this->getContainer()->mightyVersion;
		$this->view->render();
	}

}
