<?php

    /***************************************************************************************************************
     * Final Project
     * Author: Garrison Donnelly
     * Date: 12/7/2021
     * 
     * Filename: main.php
     * 
     * Utility page that contains common code and functions. Connects to the database and start the session.
     **************************************************************************************************************/

// Get common code
require_once('../model/database.php');

// Define some common functions

//Only called if exercise/index.php receives an unknown action 
function display_error($error_message) {
    include '../errors/error.php';
    exit;
}

//Typically called to redirect to the same page. Also called when user tries to access the exercise page before logging in.
function redirect($url) {
    session_write_close();
    header("Location: " . $url);
    exit;
}

// Start session to store user, fitness profile, exercises, selected_days, and exercise_list(similar to a cart)
session_start();
?>