<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// Get all cities
$app->get('/api/cities', function(Request $request, Response $response){
    $sql = "SELECT * from `City`";
    try {
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $cities = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($cities);

    }
    catch(PDOException $e)
    {
        echo '{"error": {"text": '.$e->getMessage().'}}';
    }
});

// Get all restaurents
$app->get('/api/rest/{city}', function(Request $request, Response $response, $args){
    $argument = $args['city'];
    $fields = "`Restaurant ID`,`Restaurant Name`, Address, `Locality Verbose`, `Rating text`";
    $sql = "SELECT $fields FROM `TABLE 1` WHERE City=\"$argument\"";
    try {
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $restaurents = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        //Send JSON Result
        echo json_encode($restaurents );
    }
    catch(PDOException $e)
    {
        echo '{"error": {"text": '.$e->getMessage().'}}';
    }
});

// Get detailed info
$app->get('/api/restid/{restid}', function(Request $request, Response $response, $args){
    $argument = $args['restid'];
    // $fields = "`Restaurant ID`,`Restaurant Name`, Address, `Locality Verbose`, `Rating text`";
    $sql = "SELECT * FROM `TABLE 1` WHERE `Restaurant ID`=\"$argument\"";
    try {
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $restaurents = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        //Send JSON Result
        echo json_encode($restaurents );
    }
    catch(PDOException $e)
    {
        echo '{"error": {"text": '.$e->getMessage().'}}';
    }
});