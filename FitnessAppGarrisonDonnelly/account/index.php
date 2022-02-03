<?php

    /***************************************************************************************************************
     * Final Project
     * Author: Garrison Donnelly
     * Date: 12/7/2021
     * 
     * Filename: account/index.php
     * 
     * Controller for the account pages
     **************************************************************************************************************/
//Utility Functions
require_once('../util/main.php');
require_once('../util/validation.php');
//Model Pages
require_once('../model/account_db.php');
require_once('../model/fitness_profile_db.php');

$action = filter_input(INPUT_POST, 'action');

if (isset($_SESSION['user'])) {
    if ($action == NULL) {   
        $action = filter_input(INPUT_GET, 'action');  
        if($action == NULL){   
            $action = 'view_home';
        }
    }
}
else{
    if ($action == NULL) {   
        $action = filter_input(INPUT_GET, 'action');  
        if($action == 'view_register'){
            $action = 'view_register';
        }
        else{
            $action = 'view_login';
        }
    }
}

//Controller - Default is error page
switch($action) {
    case 'view_login':
        include '../account/account_login.php';
        break;
    
    case 'login':
        $user_name = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        if(is_valid_login($user_name, $password)){
            $_SESSION['user'] = get_account_by_username($user_name);
            $_SESSION['fitness_profile'] = get_fitness_profile($_SESSION['user']['user_id']);
            redirect('.');
        }
        else{
            $error_message = "$user_name & $password *Username or password do not match.*'";
            include '../account/account_login.php';
            break;
        }
        break;

    case 'view_register':
        include '../account/account_register.php';
        break;

    case 'register':
        $username = filter_input(INPUT_POST, 'username');
        $email = filter_input(INPUT_POST, 'email');
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $password1 = filter_input(INPUT_POST, 'password_1');
        $password2 = filter_input(INPUT_POST, 'password_2');
        $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_FLOAT);
        $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);
        $pulse = filter_input(INPUT_POST, 'pulse', FILTER_VALIDATE_INT);
        $systolic = filter_input(INPUT_POST, 'systolic', FILTER_VALIDATE_INT);
        $diastolic = filter_input(INPUT_POST, 'diastolic', FILTER_VALIDATE_INT);
        $cholesterol = filter_input(INPUT_POST, 'cholesterol', FILTER_VALIDATE_INT);
        $sleep = filter_input(INPUT_POST, 'sleep', FILTER_VALIDATE_FLOAT);
        $exercise = filter_input(INPUT_POST, 'exercise', FILTER_VALIDATE_FLOAT);

        if(!is_numeric($height)){$error_message[0] = 'Field does not contain a valid number.';}
        if(!is_numeric($weight)){$error_message[1] = 'Field does not contain a valid number.';}
        if(!is_numeric($pulse)){$error_message[2] = 'Field does not contain a valid number.';}
        if(!is_numeric($cholesterol)){$error_message[3] = 'Field does not contain a valid number.';}
        if(!is_numeric($systolic)){$error_message[4] = 'Field does not contain a valid number.';}
        if(!is_numeric($diastolic)){$error_message[5] = 'Field does not contain a valid number.';}        
        if(!is_numeric($sleep)){$error_message[6] = 'Field does not contain a valid number.';}
        if(!is_numeric($exercise)){$error_message[7] = 'Field does not contain a valid number.';}

        if(isset($error_message)){            
            include '../account/account_register.php';
            break;
        }

        //Passwords do not match or are empty -error
        if(!password_match($password1, $password2) || password_match($password1, $password2) === -1){
            $password_message = 'Passwords did not match.';
            include '../account/account_register.php';
            break;
        }

        //username, first name, or last name field is empty. -error
        if(!is_filled($username) || !is_filled($fname) || !is_filled($lname)){
            $account_message = 'You must fill in the username, first, and last names.';
            include '../account/account_register.php';
            break;
        }

        //Username already exists - error
        if(is_valid_username($username)){
            $account_message = "Username, $username, is already in use. Please select a different username.";
            include '../account/account_register.php';
            break;
        }

        $user_id = add_account($username, $fname, $lname, $password1, $email);
        $fp_id = add_fitness_profile($user_id, $height, $weight, $pulse, $systolic, $diastolic, $cholesterol, $sleep, $exercise);

        $_SESSION['user'] = get_account($user_id);
        $_SESSION['fitness_profile'] = get_fitness_profile($fp_id);

        redirect('.');

        break;
    
    case 'view_home':
        include '../account/view_home.php';
        break;

    case 'view_account':
        include '../account/view_account.php';
        break;

    case 'account_edit':
        include '../account/account_edit.php';
        break;

    case 'fitness_profile_edit':
        include '../account/fitness_profile_edit.php';
        break;

    case 'account_update':
        $user_id = $_SESSION['user']['user_id'];
        $username = filter_input(INPUT_POST, 'username');
        $email = filter_input(INPUT_POST, 'email');
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $password1 = filter_input(INPUT_POST, 'password_1');
        $password2 = filter_input(INPUT_POST, 'password_2');

        //update_account() throws a numeric flag instead of TRUE/FALSE. -1 is the only unacceptable response. See model/account_db.php for more information. 
        $flag = update_account($user_id, $username, $email, $fname, $lname, $password1, $password2);
        if($flag !== -1){
            $_SESSION['user'] = get_account($user_id);
            redirect('.');
        }
        else{
            $password_message = 'The passwords entered did not match.';
            include '../account/account_edit.php';
        }
        break;

    case 'fitness_profile_update':
        $user_id = $_SESSION['user']['user_id'];
        $fp_id = $_SESSION['fitness_profile']['fp_profile_id'];
        $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_FLOAT);
        $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);
        $heart_rate = filter_input(INPUT_POST, 'pulse', FILTER_VALIDATE_INT);
        $systolic = filter_input(INPUT_POST, 'systolic', FILTER_VALIDATE_INT);
        $diastolic = filter_input(INPUT_POST, 'diastolic', FILTER_VALIDATE_INT);
        $cholesterol = filter_input(INPUT_POST, 'cholesterol', FILTER_VALIDATE_INT);
        $sleep = filter_input(INPUT_POST, 'sleep', FILTER_VALIDATE_FLOAT);
        $exercise = filter_input(INPUT_POST, 'exercise', FILTER_VALIDATE_FLOAT);

        //All fields in the fitness profile are numeric
        if(!is_numeric($height)){$error_message[0] = 'Field does not contain a valid number.';}
        if(!is_numeric($weight)){$error_message[1] = 'Field does not contain a valid number.';}
        if(!is_numeric($heart_rate)){$error_message[2] = 'Field does not contain a valid number.';}
        if(!is_numeric($cholesterol)){$error_message[3] = 'Field does not contain a valid number.';}
        if(!is_numeric($systolic)){$error_message[4] = 'Field does not contain a valid number.';}
        if(!is_numeric($diastolic)){$error_message[5] = 'Field does not contain a valid number.';}        
        if(!is_numeric($sleep)){$error_message[6] = 'Field does not contain a valid number.';}
        if(!is_numeric($exercise)){$error_message[7] = 'Field does not contain a valid number.';}

        if(isset($error_message)){            
            include '../account/fitness_profile_edit.php';
        }
        else{
            update_fitness_profile($fp_id, $height, $weight, $heart_rate, $systolic, $diastolic, $cholesterol, $sleep, $exercise);
            $_SESSION['fitness_profile'] = get_fitness_profile($fp_id);
            redirect('.');
        }
        
        break;

    case 'logout':
        unset($_SESSION['user']);
        unset($_SESSION['fitness_profile']);
        unset($_SESSION['exercises']);
        unset($_SESSION['exercise_list']);
        redirect('..');
        break;

    default:
        display_error("$action is an unrecognized action.");
        break;
}
?>