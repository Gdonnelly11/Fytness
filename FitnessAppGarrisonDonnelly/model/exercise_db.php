<?php

    /***************************************************************************************************************************************
     * Final Project
     * Author: Garrison Donnelly
     * Date: 12/7/2021
     * 
     * Filename: exercise_db.php
     * 
     * Model page for adding, updating, and getting information from the exercise, user_exercise_list, and user_exercise_list_item in DB.
     **************************************************************************************************************************************/

function get_all_exercises(){
    global $db;

    $query = 'SELECT * FROM exercise';
    $statement = $db->prepare($query);
    $statement->execute();
    $exercises = $statement->fetchAll();
    $statement->closeCursor();

    return $exercises;
}

function get_exercise($exercise_id){
    global $db;

    $query = 'SELECT * FROM exercise WHERE exercise_id = :exercise_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':exercise_id', $exercise_id);
    $statement->execute();
    $exercise = $statement->fetch();
    $statement->closeCursor();

    return $exercise;
}

function get_exercise_list($exercise_list_id){
    global $db;

    $query = 'SELECT * FROM user_exercise_list WHERE exercise_list_id = :exercise_list_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':exercise_list_id', $exercise_list_id);
    $statement->execute();
    $exercise_list = $statement->fetch();
    $statement->closeCursor();

    return $exercise_list;
}

function get_exercise_list_by_user($user_id){
    global $db;

    $query = 'SELECT * FROM user_exercise_list WHERE user_id = :user_id ORDER BY exercise_list_date ASC';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $exercise_lists = $statement->fetchAll();
    $statement->closeCursor();

    return $exercise_lists;
}

function get_exercise_list_items($exercise_list_id){
    global $db;

    $query = 'SELECT * FROM user_exercise_list_item WHERE exercise_list_id = :exercise_list_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':exercise_list_id', $exercise_list_id);
    $statement->execute();
    $exercise_list_items = $statement->fetchAll();
    $statement->closeCursor();

    return $exercise_list_items;
}

function add_exercise_list($user_id){
    global $db;
    $exercise_list_date = date("Y-m-d H:i:s");

    $query = 'INSERT INTO user_exercise_list (user_id, exercise_list_date)
                VALUES (:user_id, :exercise_list_date)';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':exercise_list_date', $exercise_list_date);
    $statement->execute();
    $exercise_list_id = $db->lastInsertId();
    $statement->closeCursor();

    return $exercise_list_id;
}

function add_exercise_list_item($exercise_id, $exercise_list_id, $item_days){
    global $db;
    $exercise_list_date = date("Y-m-d H:i:s");
    $item_days = implode(',', $item_days);

    $query = 'INSERT INTO user_exercise_list_item (exercise_id, exercise_list_id, item_days)
                VALUES (:exercise_id, :exercise_list_id, :item_days)';
    $statement = $db->prepare($query);
    $statement->bindValue(':exercise_id', $exercise_id);
    $statement->bindValue(':exercise_list_id', $exercise_list_id);
    $statement->bindValue(':item_days', $item_days);
    $statement->execute();
    $exercise_list_item_id = $db->lastInsertId();
    $statement->closeCursor();

    return $exercise_list_item_id;
}

?>