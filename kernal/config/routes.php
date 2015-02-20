<?php

return [
		//'' => 'frontend/default/index',
		
		'index' => 'frontend/default/index',
		'about' => 'frontend/default/about',
		'contact' => 'frontend/default/contact',
		
		
		
		'login' => 'user/default/login',
		'logout' => 'user/default/logout',
		'change-password' => '/user/account',
		'change-profile' => '/user/profile',
		'change-avatar' => '/user/avatar',
		
		'state-delete/<id:\d+>' => 'panel/state/delete',
		'state-edit/<id:\d+>' => 'panel/state/update',
		
		'city-delete/<id:\d+>' => 'panel/city/delete',
		'city-edit/<id:\d+>' => 'panel/city/update',

		'zone-delete/<id:\d+>' => 'panel/zone/delete',
		'zone-edit/<id:\d+>' => 'panel/zone/update',
		
		'panel' => 'panel/default/index',
		'State-List' => 'panel/state/index',
		'Create-State' => 'panel/state/create',
		
		'City-List' => 'panel/city/index',
		'Create-City' => 'panel/city/create',
		
		'Zone-List' => 'panel/zone/index',
		
		'Pages-List' => 'panel/pages/index',
		'page-edit/<id:\d+>' => 'panel/pages/update',
		
		'settings' => 'panel/settings/index',
		
		'Home-Type' => 'panel/home/index',
		'Bargain-Type' => 'panel/bargain/index',
		'Total-Price' => 'panel/price/index',
		'Area-Groups' => 'panel/area/index',
		
		'homeType-create' => 'panel/home/create',
		'homeType-delete/<id:\d+>' => 'panel/home/delete',
		'homeType-edit/<id:\d+>' => 'panel/home/update',
		
		'Area-Create' => 'panel/area/create',
		'area-delete/<id:\d+>' => 'panel/area/delete',
		'area-edit/<id:\d+>' => 'panel/area/update',
		'area-list' => 'panel/area/index',
		
		'price-create' => 'panel/price/create',
		'price-delete/<id:\d+>' => 'panel/price/delete',
		'price-edit/<id:\d+>' => 'panel/price/update',
		'price-list' => 'panel/price/index',

		'bargain-create' => 'panel/bargain/create',
		'bargain-delete/<id:\d+>' => 'panel/bargain/delete',
		'bargain-edit/<id:\d+>' => 'panel/bargain/update',
		'bargain-list' => 'panel/bargain/index'		
		
		

];