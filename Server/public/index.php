<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require '../vendor/autoload.php';
require_once '../includes/DbOperation.php';

//Creating a new app with the config to show errors
$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$app->post('/saveLocation', function (Request $request, Response $response) {
    if (isTheseParametersAvailable(array('deviceId', 'latitude', 'longitude'))) {
        $requestData = $request->getParsedBody();
        $latitude = $requestData['latitude'];
        $longitude = $requestData['longitude'];
        $deviceId = $requestData['deviceId'];

        $cn = mysqli_connect("127.0.0.1", "root", "", "GpsLocationTest");
        $sql = "INSERT INTO Locations (DeviceId, Latitude,Longitude) VALUES ($deviceId, $latitude,$longitude)";
        mysqli_query($cn, $sql);

        $responseData = array();
        $responseData['error'] = false;
        $responseData['message'] = 'Success';
        $response->getBody()->write(json_encode($responseData));
    }
});

//function to check parameters
function isTheseParametersAvailable($required_fields)
{
    $error = false;
    $error_fields = "";
    $request_params = $_REQUEST;

    foreach ($required_fields as $field) {
        if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
            $error = true;
            $error_fields .= $field . ', ';
        }
    }

    if ($error) {
        $response = array();
        $response["error"] = true;
        $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
        echo json_encode($response);
        return false;
    }
    return true;
}


$app->run();