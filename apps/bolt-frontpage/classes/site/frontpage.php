<?php defined('SYSPATH') or die('404 Not Found.');

class Site_Frontpage extends Controller
{
	public function action_index()
	{
		$this->request->response = View::factory('frontpage');
	}
}
