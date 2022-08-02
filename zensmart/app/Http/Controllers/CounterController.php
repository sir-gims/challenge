<?php

namespace App\Http\Controllers;

use App\Counter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // read from database
        /*
         * on each get we need    - check the the time   - if day is completed   - mark it as complete  - make new record
         */
        $count = Counter::where('completed', 0)->first();
        return new Response($count);
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
//     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, $id)
    public function update(Request $request)
    {
        // getting the active tally
        $count = Counter::where('completed', 0)->first();
        // updating the active tally
        $count->setClicksTallyAttribute($request->get('clicksTally'));
       // $count->setCompletedAttribute($request->get(false));
        $count->save();
        //sending the request
        if($request->get('clicksTally')){
            return new Response([
                "message" => "success"
            ],200);
        }else{
            return new Response('Something was wrong', 500);
        }
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

    public function iniateCounter()
    {

        $count = Counter::where('completed', 0)->first();
        dd($count->getAttributes()['clicksTally']);

//        return new Response($count);
    }
}
