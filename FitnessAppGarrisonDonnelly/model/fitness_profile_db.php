<?php

    /***************************************************************************************************************
     * Final Project
     * Author: Garrison Donnelly
     * Date: 12/7/2021
     * 
     * Filename: fitness_profile_db.php
     * 
     * Model page for adding, updating, and getting information from the fitness_profile table in DB.
     **************************************************************************************************************/

function get_fitness_profile($fp_id){
    global $db;

    $query = 'SELECT * FROM fitness_profile WHERE fp_profile_id = :fp_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':fp_id', $fp_id);
    $statement->execute();
    $fitness_profile = $statement->fetch();
    $statement->closeCursor();
    return $fitness_profile;
}

function add_fitness_profile($user_id, $height, $weight, $heart_rate, 
                                $systolic, $diastolic, $cholesterol,
                                $sleep, $exercise){
    global $db;

    $query = 'INSERT INTO fitness_profile (user_id, fp_height, fp_weight, fp_heart_rate, fp_bp_systolic,
                                            fp_bp_diastolic, fp_cholesterol, fp_sleep, fp_exercise)
                VALUES (:user_id, :height, :weight, :heart_rate, :systolic, :diastolic, :cholesterol, :sleep, :exercise)';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':height', $height);
    $statement->bindValue(':weight', $weight);
    $statement->bindValue(':heart_rate', $heart_rate);
    $statement->bindValue(':systolic', $systolic);
    $statement->bindValue(':diastolic', $diastolic);
    $statement->bindValue(':cholesterol', $cholesterol);
    $statement->bindValue(':sleep', $sleep);
    $statement->bindValue(':exercise', $exercise);
    $statement->execute();
    $fp_id = $db->lastInsertId();
    $statement->closeCursor();
    return $fp_id;
}

function update_fitness_profile($fp_id, $height, $weight, $heart_rate, 
                                $systolic, $diastolic, $cholesterol,
                                $sleep, $exercise){
    global $db;

    $query = 'UPDATE fitness_profile
                SET fp_height= :height,
                    fp_weight = :weight,
                    fp_heart_rate = :heart_rate,
                    fp_bp_systolic = :bp_systolic,
                    fp_bp_diastolic = :bp_diastolic,
                    fp_cholesterol = :cholesterol,
                    fp_sleep = :sleep,
                    fp_exercise = :exercise 
                WHERE fp_profile_id = :fp_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':height', $height);
    $statement->bindValue(':weight', $weight);
    $statement->bindValue(':heart_rate', $heart_rate);
    $statement->bindValue(':bp_systolic', $systolic);
    $statement->bindValue(':bp_diastolic', $diastolic);
    $statement->bindValue(':cholesterol', $cholesterol);
    $statement->bindValue(':exercise', $exercise);
    $statement->bindValue(':sleep', $sleep);
    $statement->bindValue(':fp_id', $fp_id);
    $statement->execute();
    $statement->closeCursor();
}
?>