<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
// use App\Http\Requests;
// use App\Http\Controllers\Controller;
use App\Calendar;
class CalendarContriller extends Controller
{
    public function store(Request $request){
        
        $this->validate(request,[
            'userData' => 'required|max:10'
        ]);

        $userData = $request->get("userData");
  
        $expDate = explode(".", $userData);
        $day = $expDate[0]; 
        $month = $expDate[1]; 
        $year = $expDate[2]; 
      
        $lmim = date("Y-m-d",strtotime($year."-03-01 last monday"));//Monday of the last week of March
        $m3j = date("Y-m-d",strtotime($year."-01 third monday")); //Monday of the 3rd week of January "Y-m-d"
        $ftin = date("Y-m-d",strtotime($year."-11 fourth thursday"));//Thursday of the 4th week of November
        
        // echo '<br>$m3j'.$m3j.'<br>'; //.$year.'-'.$month.'-'.$day;

        $tasks = array('01.01.'.$year => 'It’s New Year on that date!',
          '07.01.'.$year => 'It’s Merry Christmas on that date!',
          '01.05.'.$year => 'It’s first day of the May holidays on that date!',
          '02.05.'.$year => 'It’s second day of the May holidays on that date!',
          '03.05.'.$year => 'It’s third day of the May holidays on that date!',
          '04.05.'.$year => 'It’s fourth day of the May holidays on that date!',
          '05.05.'.$year => 'It’s fifth day of the May holidays on that date!',
          '06.05.'.$year => 'It’s sixth day of the May holidays on that date!',
          '07.05.'.$year => 'It’s seventh day of the May holidays on that date!',
          $lmim => 'It’s Monday of the last week of March on that date!',
          $m3j  => 'It’s Monday of the 3rd week of January on that date!',
          $ftin => 'It’s Thursday of the 4th week of November on that date!'
        ); 

        $key = $userData;
        $result = isset($tasks[$key]) ? $tasks[$key] : null;
        //echo $result;

        return view('welcome', ['userData' => $userData, 'result'=>$result]);
}
}
     