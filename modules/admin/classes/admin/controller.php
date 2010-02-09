<?php defined('SYSPATH') or die('404 Not Found.');

class Admin_Controller extends Kohana_Controller
{
	protected $messages = array();
	
	public function before()
	{
		//make sure the user is logged in with admin privileges
		if ( ! Auth::instance()->logged_in('admin') AND Request::instance()->action != 'login') 
		{
			Request::instance()->redirect(Apps::aliasof('admin').'/login');
		}
		
		//make sure that when already logged in, don't proceed executing the login action
		if (Auth::instance()->logged_in('admin') AND Request::instance()->action == 'login') 
		{
			Request::instance()->redirect(Apps::aliasof('admin'));
		}
		
		return parent::before();
	}
	
	public function after()
	{		
		return parent::after();
	}
	
	public function messages($name, $message, $replace = null)
	{
		$messages = unserialize(Session::instance()->get('messages', serialize(array())));

		if (is_array($replace)) 
		{
			if (is_array($message)) 
			{
				$msgs = $message;
				$message = array();
				foreach ($msgs as $msg) 
				{
					foreach ($replace as $key => $value) 
					{
						$message[] = str_replace(':'.$key, $value, $msg);
					}
				}
			}else
			{
				foreach ($replace as $key => $value) 
				{
					$message = str_replace(':'.$key, $value, $message);
				}
			}
		}
		
		Session::instance()->set('messages', serialize(Arr::merge($messages, array($name => $message))));
	}
}
