<?php defined('SYSPATH') or die('404 Not Found.');

class Frontpage_Site_Controller extends Controller
{
	public function action_index()
	{
		$this->request->response = View::factory('frontpage');
	}
}
