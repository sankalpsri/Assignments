<?php

/*
 * Project: Lyinsly
 * File Name: classes
 * Created on: 20 Jul, 2017
 * Author: Sankalp Srivastava <sankalp@plobal.com>
 * Author Email: sankalp@plobal.com
 * Designation: Sr. PHP Developer
 */

class Assignments{
    public  $startTime, 
            $endTime, 
            $dayTimeStart, 
            $nightTimeStart;
    
    
    /**
     * @author Sankalp Srivastava
     * @date  22 July 2017
     *
     * @doc This function if construction function which will initialized the shift start, end time; day time start and night time start variables
     * @param string startTime
     * @param string endTime
     * @param string dayTimeStart
     * @param string nightTimeStart
     */
    public function __construct($startTime, $endTime, $dayTimeStart, $nightTimeStart) {
        if (!isset($startTime) || !isset($endTime) || !isset($dayTimeStart) || !isset($nightTimeStart)) {
            throw new Exception("Please provide all four values");
        }
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->dayTimeStart = $dayTimeStart;
        $this->nightTimeStart = $nightTimeStart;        
    }
    
    
    /**
     * @author Sankalp Srivastava
     * @date  20 Jul 2017
     *
     * @doc This function will check if the start time is greater than the end time
     * @param string startTime 
     * @param string endTime
     * @return boolean
     * @throws Exception exception_details
     */
    public function isTimeGreater($timeOne, $timeTwo) {
        $timeOneFormatted = DateTime::createFromFormat('H:i', $timeOne);
        $timeTwoFormatted = DateTime::createFromFormat('H:i', $timeTwo);
        return $timeOneFormatted > $timeTwoFormatted;
    }
    
    
    /**
     * @author Sankalp Srivastava
     * @date  21 July 2017
     *
     * @doc This function will count no. of Hours the employee worked
     * @param string startTime
     * @param string endTime
     * @return string
     * @throws Exception exception_details
     */
    public function countHours() {
        $startTimeFormatted = new DateTime($this->startTime);
        $endTimeFormatted = new DateTime($this->endTime);

        $interval = $startTimeFormatted->diff($endTimeFormatted, false);

        if($interval->invert){
            return $interval->format('%H:%I');
        }
        else{
            $hours24 = new DateTime('24:00');
            $updatedTime = new DateTime($interval->format('%H:%I'));
            return $updatedTime->diff($hours24)->format('%H:%I');
        }
    }
    
    /**
     * @author Sankalp Srivastava
     * @date  22 July 2017 
     *
     * @doc This function will return time spend in daytime hours
     * @param param_type charge_id
     * @return string
     */
    public function shiftInDayTime() {
        if($this->isTimeGreater($this->startTime, $this->dayTimeStart) && $this->isTimeGreater($this->nightTimeStart, $this->startTime)){
//            $startTimeFormated = 
        }
    }
}