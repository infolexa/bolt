<?php defined('SYSPATH') or die('404 Not Found.');

class Frontpage_Admin_Controller extends Controller
{
	public function action_index()
	{
		$this->request->response = View::factory('admin/frontpage');
	}
}
