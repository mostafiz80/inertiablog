<?php

namespace App\Helpers;

use DateTime;
class DobHelper {
    public static function calculateAgeRange($dateOfBirth, $currentDate = null) {
        // If current date is not provided, use the current date
        if ($currentDate === null) {
            $currentDate = new DateTime();
        } else {
            // If provided, create a DateTime object from the provided date
            $currentDate = new DateTime($currentDate);
        }
    
        // Create a DateTime object from the date of birth
        $dob = new DateTime($dateOfBirth);
    
        // Calculate the difference between the current date and the date of birth
        $ageInterval = $dob->diff($currentDate);
    
        // Get the years part from the interval

        $days = $ageInterval->d;
        $month = $ageInterval->m;
        $year = $ageInterval->y;
        return "{$year} Years {$month} Months {$days} Days";
    
    
    }
    
   public static function yourtype($data){

            $get = explode(" ",$data);
            $years = $get[0];
            // Define age ranges and return the appropriate range based on the age
            if ($years <= 12) {
                return 'Child'; // Or any appropriate label for this age range
            } elseif ($years <= 19) {
                return 'Teenager'; // Or any appropriate label for this age range
            } elseif ($years <= 40) {
                return 'Young Adult'; // Or any appropriate label for this age range
            } elseif ($years <= 65) {
                return 'Adult'; // Or any appropriate label for this age range
            } else {
                return 'Senior'; // Or any appropriate label for this age range
            }
    }
}
