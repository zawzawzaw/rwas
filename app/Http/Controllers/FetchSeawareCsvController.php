<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CsvReader;
use App\Cabin;

class FetchSeawareCsvController extends Controller
{
    //
    public function index()
    {

      $url = 'http://clients.manic.com.sg/rwas/resources/assets/csv/Seaware_Sample.CSV';
      $path = storage_path('csv/Seaware.CSV');

      $headers = getHeaders($url);

      if ($headers['http_code'] === 200 and $headers['download_content_length'] < 1024*1024) {
        if (download($url, $path)){

          Cabin::truncate();

          Cabin::fromCsv(storage_path('csv/Seaware.CSV'));

        }
      }

      return 'Fetched and imported the seaware CSV';
    }
}
