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

		'area-delete/<id:\d+>' => 'panel/area/delete',
		'area-edit/<id:\d+>' => 'panel/area/update',
		
		'panel' => 'panel/default/index',
		'State-List' => 'panel/state/index',
		'Create-State' => 'panel/state/create',
		
		'City-List' => 'panel/city/index',
		'Create-City' => 'panel/city/create',
		
		'Area-List' => 'panel/area/index',
		
		'Pages-List' => 'panel/pages/index',
		'page-edit/<id:\d+>' => 'panel/pages/update',
		

];