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
		'change-email' => '/user/email',
		
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
		'Doc-Type' => 'dashboard/doc/index',
		'Total-Price' => 'dashboard/price/index',
		'Metr-Groups' => 'dashboard/metr/index',
		
		'homeType-create' => 'dashboard/home/create',
		'homeType-delete/<id:\d+>' => 'dashboard/home/delete',
		'homeType-edit/<id:\d+>' => 'dashboard/home/update',
		
		'Metr-Create' => 'dashboard/metr/create',
		'metr-delete/<id:\d+>' => 'dashboard/metr/delete',
		'metr-edit/<id:\d+>' => 'dashboard/metr/update',
		'metr-list' => 'dashboard/metr/index',
		
		'price-create' => 'dashboard/price/create',
		'price-delete/<id:\d+>' => 'dashboard/price/delete',
		'price-edit/<id:\d+>' => 'dashboard/price/update',
		'price-list' => 'dashboard/price/index',
		
		'doc-create' => 'dashboard/doc/create',
		'doc-delete/<id:\d+>' => 'dashboard/doc/delete',
		'doc-edit/<id:\d+>' => 'dashboard/doc/update',
		'doc-list' => 'dashboard/doc/index',	
		
		'subcat' => 'dashboard/zone/subcat',
		'subcity' => 'dashboard/zone/subcity',
		'zone-edit/subcat' => 'dashboard/zone/subcat',
		'zone-edit/subcity' => 'dashboard/zone/subcity',
		
		'create' => 'backup/default/create',
		'backup-restore/<file:\d+>' => 'backup/default/restore',
		'backup-delete/<file:\d+>' => 'backup/default/delete',
		'backup-download/<file:\d+>' => 'backup/default/download',
		'backup-upload' => 'backup/default/upload',
		
		
		'media-upload' => 'filemanager/file/uploadmanager',
		'media-file' => 'filemanager/file/index',
		
		'request-home' =>'dashboard/request/index',
		'create-request-home' => 'dashboard/request/create',
		'request-home-edit/<id:\d+>' => 'dashboard/request/update',
		'request-home-delete/<id:\d+>' => 'dashboard/request/delete',
		'request-home-edit/subcat' => 'dashboard/zone/subcat',
		'request-home-edit/subcity' => 'dashboard/zone/subcity',
		
		
		'apartments' => 'dashboard/apartments/index',
		'apartment-create' => 'dashboard/apartments/create',
		'apartment-edit/<id:\d+>' => 'dashboard/apartments/update',
		'apartment-delete/<id:\d+>' => 'dashboard/apartments/delete',
		'apartment-edit/subcat' => 'dashboard/zone/subcat',
		'apartment-edit/subcity' => 'dashboard/zone/subcity',
		
		
		

];