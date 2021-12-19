<?php

// Set API Mode
define('MODX_API_MODE', true);
// Include the index to load MODX in API Mode
@include(dirname(__FILE__, 3) . DIRECTORY_SEPARATOR . 'index.php');

$namespace = 'storemanager';
$dbType = 'mysql';

$extraCore = dirname(__DIR__,1) . DIRECTORY_SEPARATOR . 'StoreManager' . DIRECTORY_SEPARATOR;
$schemaFile = $extraCore . "schema" . DIRECTORY_SEPARATOR ."$namespace.$dbType.schema.xml";
$modelPath = $extraCore . 'src' . DIRECTORY_SEPARATOR;

echo($extraCore . PHP_EOL);
echo($schemaFile . PHP_EOL);
echo($modelPath . PHP_EOL);

echo("\StoreManager\Model\smStore");

$schemaPath = MODX_BASE_PATH . join(DIRECTORY_SEPARATOR, ['StoreManager','schema','storemanager.mysql.schema.xml']);
echo($schemaPath);