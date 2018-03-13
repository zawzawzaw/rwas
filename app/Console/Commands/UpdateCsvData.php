<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use DB;

use App\Models\Cabin;
use App\Models\Cruise;
use App\Models\Itinerary;
use App\Models\XtopiaCsv;
use App\Models\SeawareCsv;
use App\Models\CabinPrice;

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
        set_time_limit(0);
        // $cabinCruise = Cruise::select('id', 'cruise_id', 'itinerary', 'departure_date', 'departure_date_end')->with('itinerary')->get();
        //         $this->info("before cabin");
        //         sleep(2);

        //         $counter = 0;

        //         foreach($cabinCruise as $cc){
        //             if($counter>30){
        //                 $counter = 0;
        //                 sleep(2);
        //             }
        //             $this->info("Parsing seaware cabin ".$counter);
        //             $cabins = Cabin::where('cruise', $cc->id)->get();
        //             $cc = $cc->toArray();
                    
        //             $counter2 = 0;
        //             foreach($cabins as $ca) {
        //                 if($counter2>30){
        //                     $counter2 = 0;
        //                     sleep(2);
        //                 }
        //                 $this->info("Parsing seaware cabin price ".$counter2.$cc['itinerary']['itin_code']);
        //                 $xtopia = XtopiaCsv::select(
        //                     DB::raw($ca->id." as cabin_id"),
        //                     'card_type',
        //                     'pax_type_code',
        //                     'gp',
        //                     'rwcc',
        //                     'exec_pax',
        //                     'holiday_charge',
        //                     'promo_code'
        //                 )
        //                 ->where('itinerary_code', $cc['itinerary']['itin_code'])
        //                 ->where('ship_code', $cc['itinerary']['ship_code'])
        //                 // ->where('dep_start', str_replace("-", "", $cc['departure_date']))
        //                 // ->where('dep_end', str_replace("-", "", $cc['departure_date_end']))
        //                 ->where('cabin_code', $ca->cabin_category)
        //                 ->get()->toArray();

        //                 CabinPrice::insert($xtopia);
        //             }
        //             $counter++;
        //         }
        //         die();
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
                XtopiaCsv::truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
                $this->info("Parsing seaware");
                $handle = fopen(storage_path('csv/Seaware.CSV'), "r");
                $header = true;
                while ($csvLine = fgetcsv($handle, 1000, ",")) {
                    
                    if($header===true){
                        $header=false;
                        continue;
                    }
                    
                    $this->info("Parsing seaware list");
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
                sleep(2);

                $this->info("Parsing xtopia");
                $handle = fopen(storage_path('csv/Xtopia.csv'), "r");
                $header = true;
                while ($csvLine = fgetcsv($handle, 1000, ",")) {
                    
                    $this->info("Parsing xtopia list");

                    if($header===true){
                        $header=false;
                        continue;
                    }

                    $res = [
                        'itinerary_code' => $csvLine[0],
                        'card_type' => $csvLine[1],
                        'cabin_code' => $csvLine[2],
                        'pax_type_code' => $csvLine[3],
                        'gp' => $csvLine[4],
                        'rwcc' => $csvLine[5],
                        'exec_pax' => $csvLine[6],
                        'holiday_charge' => $csvLine[7],
                        'ship_code' => $csvLine[8],
                        'promo_code' => $csvLine[9],
                        'dep_start' => $csvLine[10],
                        'dep_end' => $csvLine[11]
                    ];

                    XtopiaCsv::create($res);
                }
                $this->info("Parsing seaware itinerary");
                $itinerary = SeawareCsv::select('ship_code', 'sector', 'day', 'night', DB::raw('"'.date("Y-m-d H:i:s").'" as created_at'), DB::raw('"'.date("Y-m-d H:i:s").'" as updated_at'), DB::raw('itenerary_name as itin_name'), DB::raw('itinerary_code as itin_code'), 'departure_port', 'arrival_port')->groupBy('ship_code', 'itinerary_code')->get()->toArray();
                Itinerary::insert($itinerary);
                $itin = Itinerary::get();
                sleep(2);

                $counter = 0;

                foreach($itin as $i) {
                    if($counter>30){
                        $counter = 0;
                        sleep(2);
                    }
                    $this->info("Parsing seaware cruise ".$counter);
                    $cruise = SeawareCsv::select(
                        DB::raw($i->id." as itinerary"),
                        'cruise_id',
                        'week_day',
                        'departure_date',
                        DB::raw('DATE(DATE_ADD(departure_date, INTERVAL day DAY)) as departure_date_end'),
                        DB::raw('"'.date("Y-m-d H:i:s").'" as created_at'),
                        DB::raw('"'.date("Y-m-d H:i:s").'" as updated_at')
                    )->where('ship_code', $i->ship_code)
                    ->where('itinerary_code', $i->itin_code)
                    ->groupBy('cruise_id')->get()->toArray();

                    Cruise::insert($cruise);

                    $counter++;
                }
                $this->info("before cabin");
                $cabinCruise = Cruise::select('id', 'cruise_id', 'itinerary', 'departure_date', 'departure_date_end')->with('itinerary')->get();
                $this->info("before cabin");
                sleep(2);

                $counter = 0;

                foreach($cabinCruise as $cc){
                    if($counter>30){
                        $counter = 0;
                        sleep(2);
                    }
                    $this->info("Parsing seaware cabin ".$counter);
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
                    $cabins = Cabin::where('cruise', $cc->id)->get();
                    $cc = $cc->toArray();
                    
                    $counter2 = 0;
                    foreach($cabins as $ca) {
                        if($counter2>30){
                            $counter2 = 0;
                            sleep(2);
                        }
                        $this->info("Parsing seaware cabin price ".$counter2);
                        $xtopia = XtopiaCsv::select(
                            DB::raw($ca->id." as cabin_id"),
                            'card_type',
                            'pax_type_code',
                            'gp',
                            'rwcc',
                            'exec_pax',
                            'holiday_charge',
                            'promo_code'
                        )
                        ->where('itinerary_code', $cc['itinerary']['itin_code'])
                        ->where('ship_code', $cc['itinerary']['ship_code'])
                        // ->where('dep_start', $cc['departure_date'])
                        // ->where('dep_end', $cc['departure_date_end'])
                        ->where('cabin_code', $ca->cabin_category)->get()->toArray();
                        CabinPrice::insert($xtopia);
                    }
                    $counter++;
                }
            }else{
                $this->info("Faild to download csv");
            }
        }

        $this->info('Fetched and imported the seaware CSV');
    }
}
