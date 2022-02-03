/*
 *Final Project
 *
 *Author: Garrison Donnelly
 *Date: 12/6/2021
 *
 *Filename: fitness_app.sql
*/

DROP DATABASE IF EXISTS fitness_app;
CREATE DATABASE fitness_app;
USE fitness_app;

CREATE TABLE user (
    user_id             INT             NOT NULL    AUTO_INCREMENT,
    user_name           VARCHAR(60)     NOT NULL,
    user_email          VARCHAR(100),
    user_fname          VARCHAR(30)     NOT NULL,
    user_lname          VARCHAR(30)     NOT NULL,
    user_password       VARCHAR(60)     NOT NULL,
    PRIMARY KEY (user_id)
);

CREATE TABLE fitness_profile (
    fp_profile_id       INT             NOT NULL    AUTO_INCREMENT,
    user_id             INT             NOT NULL,
    fp_height           DECIMAL(5,2), /*Inches*/
    fp_weight           DECIMAL(5,2), /*Pounds*/
    fp_heart_rate       INT,
    fp_bp_systolic      INT,
    fp_bp_diastolic     INT,
    fp_cholesterol      INT,
    fp_sleep            DECIMAL(6,2), /*Minutes a day*/
    fp_exercise         DECIMAL(6,2),  /*Minutes a day*/
    PRIMARY KEY (fp_profile_id),
    INDEX user_id (user_id)
);

CREATE TABLE exercise (
    exercise_id             INT             NOT NULL    AUTO_INCREMENT,
    exercise_name           VARCHAR(60)     NOT NULL,
    exercise_duration       DECIMAL(5,2), /*Either repetition or duration based exercise*/
    exercise_reps           INT,
    exercise_calories_burnt INT,
    PRIMARY KEY (exercise_id)
);

CREATE TABLE user_exercise_list (
    exercise_list_id        INT             NOT NULL    AUTO_INCREMENT,
    user_id                 INT             NOT NULL,
    exercise_list_date      DATETIME        NOT NULL,
    PRIMARY KEY (exercise_list_id),
    INDEX user_id (user_id)
);

CREATE TABLE user_exercise_list_item (
    item_id                 INT             NOT NULL    AUTO_INCREMENT,
    exercise_id             INT             NOT NULL,
    exercise_list_id        INT             NOT NULL,
    item_days               VARCHAR(15)     NOT NULL, /*String of comma separated values - M,T,W,TR,F,S,SU*/
    PRIMARY KEY (item_id),
    INDEX exercise_id (exercise_id),
    INDEX exercise_list_id (exercise_list_id)
);

INSERT INTO user
( 
 user_name, user_email, user_fname, user_lname, user_password
)
VALUES
( 
 'admin', 'admin@aol.com', 'John', 'Doe', 'dd94709528bb1c83d08f3088d4043f4742891f4f'
),
( 
 'user', 'user@aol.com', 'Betty', 'White', 'c73ba2982c55b7ead0e4098a92f722bdb3a3b3d8'
),
(
 'gdonne11y', 'donnelly@yahoo.com', 'Garrison', 'Donnelly', '6fb90995398c4251a9f8c49d78befa1ea42c16e1'
);

INSERT INTO fitness_profile
( 
    user_id            ,
    fp_height          ,
    fp_weight          ,
    fp_heart_rate      ,
    fp_bp_systolic     ,
    fp_bp_diastolic    ,
    fp_cholesterol     ,
    fp_sleep           ,
    fp_exercise        
)
VALUES
( 
 1, 130.25, 175.33, 87, 132, 89, 156, 480, 63
),
( 
 2, 119, 150.3, 68, 120, 75, 123, 356, 79.48
),
(
 3, 126.45, 165.43, 98, 143, 98, 177, 322.23, 48
);

INSERT INTO exercise
( 
    exercise_name           ,
    exercise_duration       ,
    exercise_reps           ,
    exercise_calories_burnt 
)
VALUES
( 
 'Curls', NULL, 10, 33
),
( 
 'Running', 60, NULL, 400
),
(
 'Swimming', 45, NULL, 378
),
(
 'Pilates', 30, NULL, 175
),
(
 'Yoga', 55, NULL, 225
),
(
 'HIIT', 20, NULL, 300
),
(
 'Bench Press', NULL, 7, 50
),
(
 'Squat', NULL, 5, 65
);

INSERT INTO user_exercise_list
( 
    user_id             ,
    exercise_list_date
)
VALUES
( 
 1, NOW()
),
( 
 2, NOW()
),
(
 1, NOW()
);

INSERT INTO user_exercise_list_item
( 
    exercise_id             ,
    exercise_list_id        ,
    item_days
)
VALUES
( 
 1, 1, 'M,T,W,TR,F,S,SU'
),
( 
 2, 1, 'M,W,F'
),
(
 1, 2, 'T,TR'
),
(
 2, 2, 'M,W'
),
(
 3, 3, 'F'
);
