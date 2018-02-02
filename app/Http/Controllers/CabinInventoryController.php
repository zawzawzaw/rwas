<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CsvReader;
use App\Cabin;

class CabinInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $reader = CsvReader::open(resource_path('assets/csv/Seaware_Sample.CSV'));
        // $header = $reader->getHeader();
        // $data = [];

        // $i = 0;
        
        // while (($line = $reader->readLine()) !== false) {
            
        //     $data[] = $line;

        //     if($i > 10) {
        //       break;
        //     }

        //     $i++;

        // }        

        return 'get all cabins';

        // return $data;
        // return response()->json(['test'=>'test']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
