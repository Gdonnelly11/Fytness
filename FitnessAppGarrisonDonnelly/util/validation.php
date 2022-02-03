<?php

    /***************************************************************************************************************
     * Final Project
     * Author: Garrison Donnelly
     * Date: 12/7/2021
     * 
     * Filename: validation.php
     * 
     * Utility page with validating functions.
     **************************************************************************************************************/

//Takes any field and ensures that it is set and not an empty string.
//Return: TRUE if filled
//Return: FALSE if empty
function is_filled($field){
    if(isset($field) && strlen(trim($field)) > 0){
        return true;
    }
    else{
        return false;
    }
}

//Takes two passwords as parameters and checks them against each other.
//Return: TRUE if filled and strings match
//Return: -1 if they are filled and do not match
//Return: FALSE if either field is empty
function password_match($password1, $password2){
    if(is_filled($password1) && is_filled($password2)){
        if(strcmp($password1, $password2) == 0){
            return true;
        }
        else{
            return -1;
        }
    }
    return false;
}

//Validation function for selecting days on the exercise list. Takes $_SESSION['selected_days'] as input.
//Parameter: array of selected days(array of arrays)
//Return: FALSE if outer array empty or one of inner arrays is null/not set.
//Return: TRUE otherwise
//TODO: Can probably remove some conditions and better abstract the function but did not want to break the program currently. 
function is_day_selected($days){
    $result = true;
    if(empty($days)){
        return false;
    }
    else{
        foreach($days as $id => $day){
            if(!isset($day)){
                return false;
            }
            elseif($day === NULL){
                return false;
            }
            elseif(empty(implode('', $day))){
                return false;
            }
        }
    }
    return true;
}
?>