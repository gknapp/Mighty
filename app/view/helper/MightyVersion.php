<?php

class View_Helper_MightyVersion extends Zend_View_Helper_Abstract {

	public function mightyVersion() {
		return $this->view->version;
	}

}