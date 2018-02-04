<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Cabin;

class UpdateCsvData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rwas:parsecsv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download csv and update database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = 'http://clients.manic.com.sg/rwas/resources/assets/csv/Seaware_Sample.CSV';
        $path = storage_path('csv/Seaware.CSV');

        $headers = getHeaders($url);

        if ($headers['http_code'] === 200 and $headers['download_content_length'] < 1024*1024) {
            if (download($url, $path)){

                Cabin::truncate();

                $handle = fopen(storage_path('csv/Seaware.CSV'), "r");
                $header = true;
                while ($csvLine = fgetcsv($handle, 1000, ",")) {

                    if($header===true){
                        $header=false;
                        continue;
                    }

                    $port = explode('-', $csvLine[4]);
                    $res = [
                        'ship_code' => $csvLine[0],
                        'departure_date' => date("Y-m-d" , strtotime($csvLine[1])),
                        'cruise_id' => $csvLine[2],
                        'week_day' => $csvLine[3],
                        'sector' => $csvLine[4],
                        'cabin_category' => $csvLine[5],
                        'cabin_group' => $csvLine[6],
                        'cabin_blocked' => $csvLine[7],
                        'cabin_sold' => $csvLine[8],
                        'cabin_available' => $csvLine[9],
                        'pax_count' => $csvLine[10],
                        'itinerary_code' => substr($csvLine[2], 2,2)."N ".$csvLine[4],
                        'departure_port' => $port[0],
                        'arrival_port' => $port[1]
                    ];

                    Cabin::create($res);
                }
            }else{
                $this->info("Faild to download csv");
            }
        }

        $this->info('Fetched and imported the seaware CSV');
    }
}
