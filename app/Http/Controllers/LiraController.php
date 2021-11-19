<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;
use Spatie\ArrayToXml\ArrayToXml;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;


class LiraController extends Controller
{
    //
    public function index(){

       /* $html = file_get_contents('https://lirarate.org/converter/');

        $crawler = new Crawler($html);

        $nodes = $crawler->filter('.buy-result .amount');

        echo $nodes->text();*/
    }

}
