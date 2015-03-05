<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=amlak',
    'username' => 'root',
    'password' => '123456',
    'charset' => 'utf8',
	'tablePrefix' => 'yii_',
	'enableSchemaCache' => true,
	// Duration of schema cache.
	 'schemaCacheDuration' => 3600,
	// Name of the cache component used. Default is 'cache'.
	'schemaCache' => 'DbCache',
];
