<?php

    /***************************************************************************************************************
     * Final Project
     * Author: Garrison Donnelly
     * Date: 12/7/2021
     * 
     * Filename: exercise/index.php
     * 
     * Controller for the exercise pages
     **************************************************************************************************************/
//Utility Functions
require_once('../util/main.php');
require_once('../util/validation.php');
//Model Pages
require_once('../model/exercise_db.php');
require_once('../model/fitness_profile_db.php');

if (isset($_SESSION['user'])) {
    $action = filter_input(INPUT_POST, 'action');
    if($action == NULL){
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {        
            $action = 'view_exercise_list';
        }
    }
}
else{
    redirect('../account/');
}
//Controller - Default is error page
switch($action) {
    case 'view_exercise_list':
        if(empty($_SESSION['exercises'])){$_SESSION['exercises'] = array();}
        $_SESSION['exercises'] = get_all_exercises();
        include '../exercise/view_exercise_list.php';
        break;
    
    case 'select_exercise_list':
        $exercise_list_id = filter_input(INPUT_POST, 'exercise_list', FILTER_VALIDATE_INT);
        $exercise_list = get_exercise_list($exercise_list_id);
        $exercise_list_items = get_exercise_list_items($exercise_list_id);
        include '../exercise/view_exercise_list.php';
        break;

    case 'add_exercise':
        if(empty($_SESSION['exercise_list'])){$_SESSION['exercise_list'] = array();}
        $exercise_id = filter_input(INPUT_POST, 'exercise_id');
        $_SESSION['exercise_list'][$exercise_id] = get_exercise($exercise_id);
        if(!isset($_SESSION['selected_days'][$exercise_id])){$_SESSION['selected_days'][$exercise_id] = array();}
        include '../exercise/view_exercise_list.php';
        break;

    case 'create_exercise_list':
        if(empty($_SESSION['exercise_list'])){
            $error_message = 'No exercises have been selected for the exercise list.';
            include '../exercise/view_exercise_list.php';
        }
        else{
            $days = ['M', 'T', 'W', 'TR', 'F', 'S', 'SU'];
            if(!isset($_SESSION['selected_days'])){$_SESSION['selected_days'] = array();}
            include '../exercise/create_exercise_list.php';
        }
        

        break;
       
    case 'add_exercise_days':
        if(empty($_SESSION['selected_days'])){$_SESSION['selected_days'] = array();}

        $days = ['M', 'T', 'W', 'TR', 'F', 'S', 'SU'];        
        $exercise_id = filter_input(INPUT_POST, 'exercise_id');
        $_SESSION['selected_days'][$exercise_id] = filter_input(INPUT_POST, 'days', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        include '../exercise/create_exercise_list.php';
        break;

    case 'add_exercise_list':
        if(is_day_selected($_SESSION['selected_days'])){
            $exercise_list_id = add_exercise_list($_SESSION['user']['user_id']);
            foreach($_SESSION['exercise_list'] as $exercise_id => $exercise){
                if(isset($_SESSION['selected_days'][$exercise_id])){
                    add_exercise_list_item($exercise_id, $exercise_list_id, $_SESSION['selected_days'][$exercise_id]);
                }
            }
            $exercise_list = get_exercise_list($exercise_list_id);
            $exercise_list_items = get_exercise_list_items($exercise_list_id);
            unset($_SESSION['exercise_list']);
            unset($_SESSION['selected_days']);
            include '../exercise/view_exercise_list.php';
        }
        elseif(isset($_SESSION['exercise_list'])){
            $error_message = 'Exercise must have days selected before creating a new exercise list.';
            $days = ['M', 'T', 'W', 'TR', 'F', 'S', 'SU']; 
            include '../exercise/create_exercise_list.php';
        }
        else{
            include '../exercise/view_exercise_list.php';
        }
        break;

    case 'clear_exercise_list':
        unset($_SESSION['exercise_list']);
        unset($_SESSION['selected_days']);
        redirect('.');
        break;

    case 'remove_exercise':
        $exercise_id = filter_input(INPUT_POST, 'exercise_id');
        unset($_SESSION['exercise_list'][$exercise_id]);
        unset($_SESSION['selected_days'][$exercise_id]);
        redirect('.');
        break;

    default:
        display_error("$action is an unrecognized action.");
        break;
}
?>