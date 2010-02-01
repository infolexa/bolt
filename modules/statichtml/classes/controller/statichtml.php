<?php defined('SYSPATH') or die('404 Not Found.');

class Controller_StaticHTML extends Controller {

	public function action_index()
	{
		$file = $this->request->param('file');
		
		$this->request->response = View::factory('statichtml/'.$file)->render();
	}
	
	public function action_widget()
	{
		$file = $this->request->param('file');
		
		$this->request->response = View::factory('statichtml/widgets/'.$file)->render();
	}

} // End StaticHTML