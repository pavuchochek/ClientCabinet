<?php
function getAllPhrases()
{
    include __DIR__.'/../configuration.php';
    $url = $_ENV['URL_APP'].'/medecins';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    $token="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dpbiI6InNlY3JldGFpcmUxIiwiZXhwIjoxNzEwNDEwMjU4fQ.9i4OGSGS_0EI8YEPLgcaEuCJJKMvG8sfebfP0yXouD4";
    $headers = array(
        'Authorization: Bearer ' . $token,
        'Accept: application/json'
    );
    
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($curl);
    return  $response;
    //echo json_decode($response, true);
}
getAllPhrases();    