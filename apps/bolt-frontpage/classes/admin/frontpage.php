<?php defined('SYSPATH') or die('404 Not Found.');

class Admin_Frontpage extends Controller
{
	public function action_index()
	{
		$this->request->response = View::factory('admin/frontpage');
	}
}
