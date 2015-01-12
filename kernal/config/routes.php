<?php
	/*
	 * amlak routes 
	 */
return [

		'index' => 'frontend/default/index',
		'about' => 'frontend/default/about',
		'contact' => 'frontend/default/contact',
		
		//'' => 'frontend/default/index',
		
		'login' => 'user/default/login',
		'logout' => 'user/default/logout',
		'change-password' => '/user/account',
		'change-profile' => '/user/profile',
		'change-avatar' => '/user/avatar',
		
		'state-delete/<id:\d+>' => 'panel/state/delete',
		'state-edit/<id:\d+>' => 'panel/state/update',
		
		'city-delete/<id:\d+>' => 'panel/city/delete',
		'city-edit/<id:\d+>' => 'panel/city/update',
		
		'panel' => 'panel/default/index',
		'Registration-State' => 'panel/state/index',
		'Registration-Sub-State' => 'panel/city/index',

];