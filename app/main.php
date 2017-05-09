<?php

namespace inflationary\lib;

error_reporting(E_ALL);
ini_set('display_errors', 1);
/*
 * Calls Inflate class to perform 
 * return json to index for display
 */
include("../library/Inflate.php");
//check for POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sentence = $_POST['sentence'];

    //if sentence is not empty.
    if (!empty($sentence)) {
        $inflate = new Inflate(); //instantiate object inflate
        $inflated = $inflate->searchInflatable($sentence);

        //json encode array
        $response = array('inflated' => $inflated, 'status' => 'complete');
    } else {

        $response = array('error' => 'Empty Request.');
    }
    echo json_encode($response); //return response
} else {

    $response = array('error' => 'Not a valid request');
    echo json_encode($response); //return response
}
