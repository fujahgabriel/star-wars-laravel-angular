<?php

namespace App\Http\Controllers;

use App\Helper\StarWarsIO;
use App\Characters;

class CharactersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get characters data
        $characters = Characters::all();
       
        if ($characters->isEmpty()) {
            $characters = StarWarsIO::getCharacters();
        }
      
        return $characters;
    }
}
