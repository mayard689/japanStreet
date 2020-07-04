<?php

namespace App\Repository;

use Symfony\Component\HttpClient\HttpClient;

/**
 *
 */
class WindyRepository
{

    protected $client;

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        $this->client = HttpClient::create();
    }


    /*
     * get data from the object with the given id
     * use var dump to check available keys
     */
    public function getPicture(int $webcamid=1525295653): string
    {
        $content=null;
        $apiKey="N4JQbLhh5stOTNr6HnKt9KUSwB8qwO5q";
        $response = $this->client->request(
            'GET',
            "https://api.windy.com/api/webcams/v2/list/webcam=".$webcamid."?show=webcams:image&key=".$apiKey
        );

        $statusCode = $response->getStatusCode(); // get Response status code 200

        if ($statusCode === 200) {
            $content = $response->getContent();
            // get the response in JSON format

            $content = $response->toArray();
            // convert the response (here in JSON) to an PHP array
        }
        $image=$content['result']['webcams']['0']['image']['current']['thumbnail'];
        return $image;
    }
}
