<?php

namespace App\Helper;

use App\Characters;

class StarWarsIO
{
    private static $ENDPOINT = 'https://swapi.co/api/people/';

    //call to retrieve characters data 
    public static function get(): array
    {
        $url = static::$ENDPOINT;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);

        //get characters data
        $content = json_decode($response->getBody(), true);
        if (isset($content["results"])) {
            return $content["results"];
        }
        return [];
    }

    /**
     * Store Api data
     */
    public static function store()
    {
        $characters = StarWarsIO::get();


        collect($characters)
            ->each(function ($characters, $key) {
                Characters::firstOrCreate([
                    'name' => $characters["name"],
                    'height' => $characters["height"],
                    'hair_color' => $characters["hair_color"],
                    'skin_color' => $characters["skin_color"],
                    'eye_color' => $characters["eye_color"],
                    'birth_year' => $characters["birth_year"],
                    'gender' => $characters["gender"],
                ]);
            });

        $result =  $characters;

        return $result;
    }

    /**
     * Retrieve Stored characters
     */
    public static function getCharacters()
    {
        $result = StarWarsIO::store();
        return $result;
    }
}
