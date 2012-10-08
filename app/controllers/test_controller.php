<?php

class TestController extends ApplicationController {

	public function other() {


		View::render(array('controller' => 'test', 'action' => 'other',
			'locals' => array(
												'title' => 'Other Testing page',
												'content' => 'balh blah blah and goes on'
											)
		));
	}

}

?>