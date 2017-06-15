<?php

require '/home/jimmy/EbayAPI/php-autoloader.php';

$config = require '/home/jimmy/EbayAPI/configuration.php';

/**
 * The namespaces provided by the SDK.
 */

use \DTS\eBaySDK\Inventory\Services;
use \DTS\eBaySDK\Inventory\Types;
use \DTS\eBaySDK\Inventory\Enums;

/**
 * Create the service object.
 */
$service = new Services\InventoryService([
    'authorization'    => $config['sandbox']['oauthUserToken'],
    'requestLanguage'  => 'en-US',
    'responseLanguage' => 'en-US',
    'sandbox'          => true
]);

/**
 * Create the request object.
 */
$request = new Types\CreateOrReplaceInventoryItemRestRequest();

/**
 * Note how URI parameters are just properties on the request object.
 */
$request->sku = '123';

$request->availability = new Types\Availability();
$request->availability->shipToLocationAvailability = new Types\ShipToLocationAvailability();
$request->availability->shipToLocationAvailability->quantity = 50;

$request->condition = Enums\ConditionEnum::C_NEW_OTHER;

$request->product = new Types\Product();
$request->product->title = 'Microphone stand - VisioSound';
$request->product->description = 'The heavy big white box with the microphone stand in it';
/**
 * Aspects are specified as an associative array.
 */
$request->product->aspects = [
    'Brand'                => ['VisioSound'],
    'Type'                 => ['Microphone Stand'],
    'Storage Type'         => ['Not really sure'],
];
$request->product->imageUrls = [
    'http://i.ebayimg.com/images/i/182196556219-0-1/s-l1000.jpg'
];

/**
 * Send the request.
 */
$response = $service->createOrReplaceInventoryItem($request);

/**
 * Output the result of calling the service operation.
 */
printf("\nStatus Code: %s\n\n", $response->getStatusCode());
if (isset($response->errors)) {
    foreach ($response->errors as $error) {
        printf(
            "%s: %s\n%s\n\n",
            $error->errorId,
            $error->message,
            $error->longMessage
        );
    }
}

if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 400) {
    echo "Success\n";
}
