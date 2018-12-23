<?php
function number_of_working_days($from, $to) {
    $workingDays = [1, 2, 3, 4, 5]; # date format = N (1 = Monday, ...)
    $holidayDays = ['2015-11-13', '2015-11-12', '2015-11-11']; # variable and fixed holidays

    $from = new DateTime($from);
    $to = new DateTime($to);
    $to->modify('+1 day');
    $interval = new DateInterval('P1D');
    $periods = new DatePeriod($from, $interval, $to);

    $days = 0;
    foreach ($periods as $period) {
        if (!in_array($period->format('N'), $workingDays)) continue;
        if (in_array($period->format('Y-m-d'), $holidayDays)) continue;
        if (in_array($period->format('*-m-d'), $holidayDays)) continue;
        $days++;
    }
    return $days;
}


echo number_of_working_days('2015-11-2', '2015-11-15'); // y-m-d 



/**
 * National American Holidays
 * @param string $year
 * @return array

public static function getNationalAmericanHolidays($year) {


    //  January 1 - New Year’s Day (Observed)
    //  Calc Last Monday in May - Memorial Day  strtotime("last Monday of May 2011");
    //  July 4 Independence Day
    //  First monday in september - Labor Day strtotime("first Monday of September 2011")
    //  November 11 - Veterans’ Day (Observed)
    //  Fourth Thursday in November Thanksgiving strtotime("fourth Thursday of November 2011");
    //  December 25 - Christmas Day        
    $bankHolidays = array(
          $year . "-01-01" // New Years
        , "". date("Y-m-d",strtotime("last Monday of May " . $year) ) // Memorial Day
        , $year . "-07-04" // Independence Day (corrected)
        , "". date("Y-m-d",strtotime("first Monday of September " . $year) ) // Labor Day
        , $year . "-11-11" // Veterans Day
        , "". date("Y-m-d",strtotime("fourth Thursday of November " . $year) ) // Thanksgiving
        , $year . "-12-25" // XMAS
        );

    return $bankHolidays;
}