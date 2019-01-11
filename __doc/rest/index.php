<?php
/**
 * Privacy api
 * @version v1
 */

require_once __DIR__ . '/vendor/autoload.php';

$app = new Slim\App();


/**
 * GET getTreatments
 * Summary: Get term
 * Notes: 
 * Output-Formats: [application/json]
 */
$app->GET('/api/owner/term',  'App\Action\PrivacyManager:getTreatments');


/**
 * POST createTreatment
 * Summary: Create Treatment
 * Notes: 
 * Output-Formats: [application/json]
 */
$app->POST('/api/owner/treatment',  'App\Action\PrivacyManager:createTreatment');


/**
 * DELETE deleteTreatment
 * Summary: Delete Treatment
 * Notes: 
 * Output-Formats: [application/json]
 */
$app->DELETE('/api/owner/treatment/{id}',  'App\Action\PrivacyManager:deleteTreatment');


/**
 * GET getTreatment
 * Summary: Get Treatment
 * Notes: 
 * Output-Formats: [application/json]
 */
$app->GET('/api/owner/treatment/{id}',  'App\Action\PrivacyManager:getTreatment');


/**
 * GET listTreatments
 * Summary: List Treatments
 * Notes: 
 * Output-Formats: [application/json]
 */
$app->GET('/api/owner/treatment',  'App\Action\PrivacyManager:listTreatments');


/**
 * PUT updateTreatment
 * Summary: Update Treatment
 * Notes: 
 * Output-Formats: [application/json]
 */
$app->PUT('/api/owner/treatment/{id}',  'App\Action\PrivacyManager:updateTreatment');



$app->run();
