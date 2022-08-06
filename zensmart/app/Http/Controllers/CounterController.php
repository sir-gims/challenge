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
        /*
         * on each get we need:
         *    - check the time
         *    - if day is completed
         *    - mark it as complete (if yes)
         *    - make new record
         */
        $count = Counter::where('completed', 0)->first();
        $this->createNewRowIfDatePassed($count);

        return new Response($count);
    }

    /**
     * Create new row when day passed,
     * Note: Original Idea was to use Jobs or Schedulers, but since jobs needs cron (which depends on server)
     * We're relying on this logic X).
     */
    private function createNewRowIfDatePassed($count)
    {
        if ($this->isDatePassed($count)) {
            $count->setCompletedAttribute(true);
            $count->save();

            $newCounter = new Counter;
            $newCounter->clicksTally = 0;
            $newCounter->completed = false;
            $newCounter->save();
        }
    }


    /**
     * Determines if date is passed.
     */
    private function isDatePassed($count) : bool
    {
        // get today's date
        $todaysDate = Carbon::now()->format('Y-m-d');
        // get updated_at's date
        $update_at = Counter::formatUpdatedAt($count->getAttributes()['updated_at']);

        return $todaysDate != $update_at;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // getting the active tally
        $count = Counter::where('completed', 0)->first();
        // updating the active tally
        $count->setClicksTallyAttribute($request->get('clicksTally'));
        $count->save();
        //sending the request
        if($request->get('clicksTally')){
            return new Response('success');
        }else{
            return new Response('Something was wrong', 500);
        }
    }

    // just used this function to dump and see data in Insomnia x) .
    public function test()
    {

        $count = Counter::where('completed', 0)->first();

        $result = $this->isDatePassed($count);
        dd($result);
//        return new Response($count);
    }
}
