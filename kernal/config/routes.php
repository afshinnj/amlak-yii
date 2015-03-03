<?php

return [
		//'' => 'frontend/default/index',
		
		'index' => 'frontend/default/index',
		'about' => 'frontend/default/about',
		'contact' => 'frontend/default/contact',
		
		
		'SignUp' => 'user/register',
		'login' => 'user/default/login',
		'logout' => 'user/default/logout',
		'change-password' => '/user/account',
		'change-profile' => '/user/profile',
		'change-avatar' => '/user/avatar',
		
		'state-delete/<id:\d+>' => 'dashboard/state/delete',
		'state-edit/<id:\d+>' => 'dashboard/state/update',
		
		'city-delete/<id:\d+>' => 'dashboard/city/delete',
		'city-edit/<id:\d+>' => 'dashboard/city/update',
		'zone-delete/<id:\d+>' => 'dashboard/zone/delete',
		'zone-edit/<id:\d+>' => 'dashboard/zone/update',
		
		'dashboard' => 'dashboard/default/index',
		'State-List' => 'dashboard/state/index',
		'Create-State' => 'dashboard/state/create',
		
		'City-List' => 'dashboard/city/index',
		'Create-City' => 'dashboard/city/create',
		
		'Zone-List' => 'dashboard/zone/index',
		'zone-create' => 'dashboard/zone/create',
		
		'pages' => 'dashboard/pages/index',
		'page-edit/<id:\d+>' => 'dashboard/pages/update',
		
		'settings' => 'dashboard/settings/index',
		
		'Home-Type' => 'dashboard/home/index',
		'Bargain-Type' => 'dashboard/bargain/index',
		'Total-Price' => 'dashboard/price/index',
		'Area-Groups' => 'dashboard/area/index',
		
		'homeType-create' => 'dashboard/home/create',
		'homeType-delete/<id:\d+>' => 'dashboard/home/delete',
		'homeType-edit/<id:\d+>' => 'dashboard/home/update',
		
		'Area-Create' => 'dashboard/area/create',
		'area-delete/<id:\d+>' => 'dashboard/area/delete',
		'area-edit/<id:\d+>' => 'dashboard/area/update',
		'area-list' => 'dashboard/area/index',
		
		'price-create' => 'dashboard/price/create',
		'price-delete/<id:\d+>' => 'dashboard/price/delete',
		'price-edit/<id:\d+>' => 'dashboard/price/update',
		'price-list' => 'dashboard/price/index',
		
		'bargain-create' => 'dashboard/bargain/create',
		'bargain-delete/<id:\d+>' => 'dashboard/bargain/delete',
		'bargain-edit/<id:\d+>' => 'dashboard/bargain/update',
		'bargain-list' => 'dashboard/bargain/index',	
		
		'subcat' => 'dashboard/zone/subcat',
		'subcity' => 'dashboard/zone/subcity',
		'zone-edit/subcat' => 'dashboard/zone/subcat',
		'zone-edit/subcity' => 'dashboard/zone/subcity'
	

		
	
		
		

];