<?php

    /***************************************************************************************************************
     * Final Project
     * Author: Garrison Donnelly
     * Date: 12/7/2021
     * 
     * Filename: account_db.php
     * 
     * Model page for adding, updating, and getting information from the user table in DB.
     **************************************************************************************************************/

function get_account($user_id){
    global $db;

    $query = 'SELECT * FROM user WHERE user_id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}

function get_account_by_username($username){
    global $db;

    $query = 'SELECT * FROM user WHERE user_name = :user_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $username);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}

function add_account($username, $fname, $lname, $password, $email){
    global $db;

    $password = sha1($username . $password);
    $query = 'INSERT INTO user (user_name, user_email, user_fname, user_lname, user_password)
                VALUES (:username, :email, :fname, :lname, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':lname', $lname);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $user_id = $db->lastInsertId();
    $statement->closeCursor();
    return $user_id;
}

//Parameters: User ID, username, email address, first name, last name, and two password entries.
//Return: -1 if passwords are entered and do not match
//Return: 1 if passwords do match (user wants to update their password)
//Return: 0 if passwords are empty (user only wants to update account details)
function update_account($user_id, $username, $email, $fname, $lname, $password1, $password2){
    global $db;

    if(password_match($password1, $password2) === -1){
        return -1;
    }
    elseif(password_match($password1, $password2)){
        $password = sha1($username . $password1);
        $query = 'UPDATE user
                    SET user_email = :email,
                        user_fname = :fname,
                        user_lname = :lname,
                        user_password = :password
                    WHERE user_id = :user_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':fname', $fname);
        $statement->bindValue(':lname', $lname);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
        $statement->closeCursor();
        return 1;
    }
    //password_match($password1, $password2) === FALSE - Assumed user did not intend to change password - See util/validation.php for more information on password_match()
    else{
        $query = 'UPDATE user
                    SET user_email = :email,
                        user_fname = :fname,
                        user_lname = :lname
                    WHERE user_id = :user_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':fname', $fname);
        $statement->bindValue(':lname', $lname);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
        $statement->closeCursor();
        return 0;
    }
}

//Takes username and password as parameters and checks if any entries exist in the database that match the combination. Used for login page.
//Returns TRUE if there are any matching rows in database.
//Returns FALSE otherwise.
function is_valid_login($username, $password) {
    global $db;

    $password = sha1($username . $password);
    $query = 'SELECT * FROM user
                WHERE user_name = :user_name AND user_password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    if($statement->rowCount() == 1){
        $valid = true;
    }
    else{
        $valid = false;
    }
    $statement->closeCursor();
    return $valid;
}

//Takes username as parameter and checks if any entries exist in the database that match the username. Used for registration page.
//Returns TRUE if there are any matching rows in database.
//Returns FALSE otherwise.
//TODO: Reversing the output would make more semantic sense.
function is_valid_username($username) {
    global $db;

    $query = 'SELECT user_name FROM user
                WHERE user_name = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    if($statement->rowCount() == 1){
        $valid = true;
    }
    else{
        $valid = false;
    }
    $statement->closeCursor();
    return $valid;
}
?>