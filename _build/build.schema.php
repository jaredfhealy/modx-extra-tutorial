<?php

// Set API Mode
define('MODX_API_MODE', true);

// Define some variables
$namespace = 'storemanager';
$dbType = 'mysql';

// Include the index to load MODX in API Mode
@include(dirname(__FILE__, 3) . DIRECTORY_SEPARATOR . 'index.php');

/**
 * @var \MODX\Revolution\modX $modx
 * 
 */

// Get the manager and generator
$manager = $modx->getManager();
$generator = $manager->getGenerator();

// Define the schema file path and model paths
$projectRootDir = MODX_BASE_PATH . 'project1' . DIRECTORY_SEPARATOR; //{base_path}/project1/
$corePath = $projectRootDir . 'StoreManager' . DIRECTORY_SEPARATOR; //{base_path}/project1/StoreManager/
$schemaFile = $corePath . "schema" . DIRECTORY_SEPARATOR . "storemanager.mysql.schema.xml"; //{base_path}/project1/StoreManager/schema/storemanager.mysql.schema.xml

// Get MODX version data
$version = $modx->getVersionData();

// Check the major version
if ($version['version'] < 3) {
    // Parse for 2
    $generator->parseSchema(
        $schemaFile,
        $projectRootDir,
        false
    );
} 
else 
{
    // Parse for 3
    // Parse the schema to generate the class files
    $generator->parseSchema(
        $schemaFile,
        $corePath . 'src' . DIRECTORY_SEPARATOR,
        [
            "compile" => 0,
            "update" => 0,
            "regenerate" => 1,
            "namespacePrefix" => "StoreManager\\"
        ]
    );
}
