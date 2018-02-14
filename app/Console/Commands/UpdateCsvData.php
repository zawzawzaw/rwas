<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use DB;

use App\Models\Cabin;
use App\Models\Cruise;
use App\Models\Itinerary;
use App\Models\SeawareCsv;

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
                
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                SeawareCsv::truncate();
                Cruise::truncate();
                Itinerary::truncate();
                Cabin::truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');

                $handle = fopen(storage_path('csv/Seaware.CSV'), "r");
                $header = true;
                while ($csvLine = fgetcsv($handle, 1000, ",")) {

                    if($header===true){
                        $header=false;
                        continue;
                    }

                    $port = explode('-', $csvLine[4]);
                    $night = substr($csvLine[2], 2,2);
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
                        'day' => $night+1,
                        'night' => $night,
                        'itenerary_name' => ($night+1)."Days ".((int) $night)."Night ".$csvLine[4],
                        'itinerary_code' => $night."N ".$csvLine[4],
                        'departure_port' => $port[0],
                        'arrival_port' => $port[1]
                    ];

                    SeawareCsv::create($res);
                }

                $itinerary = SeawareCsv::select('ship_code', 'sector', 'day', 'night', DB::raw('"'.date("Y-m-d H:i:s").'" as created_at'), DB::raw('"'.date("Y-m-d H:i:s").'" as updated_at'), DB::raw('itenerary_name as itin_name'), DB::raw('itinerary_code as itin_code'), 'departure_port', 'arrival_port')->groupBy('ship_code', 'itinerary_code')->get()->toArray();
                Itinerary::insert($itinerary);
                $itin = Itinerary::get();

                foreach($itin as $i) {
                    $cruise = SeawareCsv::select(DB::raw($i->id." as itinerary"), 'cruise_id', 'week_day', 'departure_date', DB::raw('"'.date("Y-m-d H:i:s").'" as created_at'), DB::raw('"'.date("Y-m-d H:i:s").'" as updated_at'))->where('ship_code', $i->ship_code)->where('itinerary_code', $i->itin_code)->groupBy('cruise_id')->get()->toArray();
                    Cruise::insert($cruise);
                }
                $cabinCruise = Cruise::select('id', 'cruise_id')->get();;
                foreach($cabinCruise as $cc){
                    $cab = SeawareCsv::select(
                        DB::raw($cc->id.' as cruise'),
                        'cabin_category',
                        'cabin_group',
                        'cabin_blocked',
                        'cabin_sold',
                        'cabin_available',
                        'pax_count'
                    )->where('cruise_id', $cc->cruise_id)->get()->toArray();
                    Cabin::insert($cab);
                }
            }else{
                $this->info("Faild to download csv");
            }
        }

        $this->info('Fetched and imported the seaware CSV');
    }
}
