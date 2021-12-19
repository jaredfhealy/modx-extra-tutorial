<?php

// Set API Mode
define('MODX_API_MODE', true);

// Include the index to load MODX in API Mode
@include(dirname(__FILE__, 3) . DIRECTORY_SEPARATOR . 'index.php');

/**
 * @var \MODX\Revolution\modX $modx
 * 
 */

// Directories
$projectRootDir = MODX_BASE_PATH . 'project1' . DIRECTORY_SEPARATOR; //{base_path}/project1/
$corePath = $projectRootDir . 'StoreManager' . DIRECTORY_SEPARATOR; //{base_path}/project1/StoreManager/
$coreDirName = 'StoreManager';

// Get manager and version
$manager = $modx->getManager();
$version = $modx->getVersionData();

if ($version['version'] < 3) 
{
    // v2.x Add package
    $result = $modx->addPackage('StoreManager.src.Model', $projectRootDir);

    // v2.x Create the tables
    $manager->createObjectContainer('smStore');
} 
else 
{
    // v3.x Add package
    $modx->addPackage('StoreManager\src\Model', $projectRootDir);

    // v3.x Create the tables
    $manager->createObjectContainer('StoreManager\Model\smStore');
}