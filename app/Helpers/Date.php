<?php

function StringToDate($dateString){
    $format = 'Y-m-d H:i:s';

    // Create a DateTime object from the string
    $dateTime = DateTime::createFromFormat($format, $dateString);

    // Check if the conversion was successful
    if ($dateTime instanceof DateTime) {
        // Output the formatted date
        return $dateTime->format('Y-m-d H:i:s');
    } else {
        $datetime = strtotime($dateString);
        return date('Y-m-d H:i', $datetime);
    }
}

function GetDayNameFromDate($dateString){
    $timestamp = strtotime($dateString);
    return date('l', $timestamp);
}