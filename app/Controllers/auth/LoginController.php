<?php

namespace Controllers\auth;

use Models\user;

class LoginController
{

	public $sv;
	public $name;
	public $uid;

	public function __construct()
	{
		$this->sv = false;
	}

	public function userAuth($datos)
	{
		$user = new user;
		$result = $user->where([["email",$datos["email"]],
													 ["passwd",$datos["passwd"]]])->get();

		if(count(json_decode($result)) > 0)
		{
			// Se registra la sesión :D
			// return $this->sessionRegister($datos);
		}
		else
		{
			// $this->sessionDestroy();
			echo json_encode(["r"=>false]); 		
		}
	}

}