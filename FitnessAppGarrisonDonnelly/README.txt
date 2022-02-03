*******************************************************************************************************************************************************
************************************************************ Fytness - A Fitness Application **********************************************************
************************************************************   Final Project for CIS332      **********************************************************
************************************************************       Garrison Donnelly         **********************************************************
*******************************************************************************************************************************************************

Going into this project I wanted to work on better learning MVC and responsive design. 

I studied the final project in Murach's PHP and MySQL 2nd edition (CH. 24). The overall layout of folders and the structure of the models, views and 
controllers are heavily influenced by Murach and Harris. The page util/main.php is essentially taken from the chapter's project with slight edits to 
features that I did not intend to use. In particular, the redirect() function was very simple and I would not have thought of it otherwise. 

I had intended to learn Bootstrap for a while, so I decided to use this project as an opportunity to practice. There are two precompiled Bootstrap
files in the project. The first is css/bootstrap.min.css and the other is js/bootstrap.bundle.min.js. I don't believe this project uses Javascript,
but I wanted to include it just in case. 

I've included any important details or issues I can see arising by surrounding the comment in exclamation points! 

*******************************************************************************************************************************************************
                                                                        Bootstrap
*******************************************************************************************************************************************************
                                                
The CSS file is listed in the view/header.php right before my main CSS link. This is because there are some slight stylistic overrides. The JS file is 
linked in the script section in view/footer.php. 

!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
If there are any issues with the appearance, there are also CDN links for both the JS and CSS files commented out in view/header.php. I left these there
just in case there were any issues. However, the application has run just fine from my PC with and without the links.
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

I checked that the application is usable without the style sheets still (it looks awful), but Bootstrap allowed me to quickly spin up something that both
looked polished and is responsive on different sized devices.  

*******************************************************************************************************************************************************
                                                                        Database
*******************************************************************************************************************************************************

The connection to the database is located in file model/database.php. The username is 'root' and the password is '' (empty string). These were the 
settings on my system. If there is an issue with connecting to the database, errors/db_error_connect.php will be shown. 

The database can be created with SQL file fitness_app.sql. This should be located in the root folder. I tried to include some notes with thoughts 
regarding my logic or which measurements were intended in the database file. There should not be any issues running that file as many times as need
be - after all, I've run it a lot in the past few weeks.

One thing that might be confusing is the way I chose to encode the days of the week for the user_exercise_list_item table. These are encoded - both in
the SQL script and the model files - as a string of comma separated values. The max is 15 characters ('M,T,W,TR,F,S,SU') if the user chose all 7 days.
Only the selected days are included in this field, no extra commas, blank spaces or anything ('M,W,F'). 

The passwords have already been hashed with SHA1. There are currently three user entries in the database. The three account logins are:

    username: admin         password: admin
    username: user          password: password
    username: gdonne11y     password: purple

The username and password combinations above should all work. I've already created them exercise lists, except for gdonne11y. I left that empty to show
what the account would look like without any exercise lists. 

!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
If there are any issues with the username/password combinations, the registration function should still work. Sign up and see if that account will work.
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


*******************************************************************************************************************************************************
                                                                        Model
*******************************************************************************************************************************************************

The model folder contains the database connection file along with the various SELECT, INSERT, and UPDATE commands needed for the USER, FITNESS_PROFILE,
user_exercise_list_item, and USER_EXERCISE_LIST tables. 

There is no functionality for a user to add, update, or delete exercises. Currently can only be done directly through the database. 

model/database.php is called from util/main.php which is included in the index files. This ensures the database connection is started. 

*******************************************************************************************************************************************************
                                                                        View
*******************************************************************************************************************************************************

The view folder itself only contains the header and footer for this application. These are included on every other view page except the landing page.

Other view files include:
    -account/account_edit.php
    -account/account_login.php
    -account/account_register.php
    -account/fitness_profile_edit.php
    -account/view_account.php
    -account/view_home.php
    -exercise/create_exercise_list.php
    -exercise/view_exercise_list.php
    -errors/db_error_connect.php
    -errors/error.php
    
*******************************************************************************************************************************************************
                                                                        Controller
*******************************************************************************************************************************************************

There are only two controllers for this project. They are in the account folder and the exercise folder. The files are:

    -account/index.php
    -exercise/index.php

They utilize switch statements to go through the different available actions contained in that area of the code. The controllers typically redirect to their
own folder; however, exercise/index.php has one exception. If someone attempts to click on the exercise nave link while $_SESSION['user'] is not set
(i.e. while logging in or registering) then the controller will direct them to the login page in account folder.  
    
*******************************************************************************************************************************************************
                                                                    Using the Application
*******************************************************************************************************************************************************

                                                                        Landing page
                                                                ------------------------------

Basic HTML landing page located at the root of the folder. Only allows two options. User can login or register a new account. The user should only be
able to access this page when first accessing the website or upon logging out of their account. You can also back out of the login and registration 
pages to get back to the landing page. 

                                                                        Navigation
                                                                ------------------------------

The user can navigate the application primarily through the navigation bar. This has the two main features - account access and exercise list. It also allows 
the user to access their home page. If $_SESSION['user'] is set then the bar will display the user's name and a logout button. Otherwise, it will display 
a login button that takes them to the login page.

                                                                        Login Page
                                                                ------------------------------

Features a simple login system where the user enters a username and password. This form is submitted to the controller which calls a function to check for
a matching username and password pair in the database. If none are found, controller redirects to the login page with appropriate error. Otherwise, 
$_SESSION['user'] is set and they are redirected to their homepage.


                                                                       Registration Page
                                                                ------------------------------

Allows the user to create a new account. They will also need to create a fitness profile. 

User must create a unique username - they can only appear once in thedatabase. Passwords can not be empty strings and they must match. Currently there 
is no other requirements for passwords or usernames. First name and last name cannot be empty strings. All information in the fitness profile are numeric.
Do not currently differentiate between integers and floating point numbers. 

If any of the above criteria is not met, controller will redirect user to registration page and give appropriate error message.

All fields except for email address need to be filled in. 

                                                                        Home Page
                                                                ------------------------------

This is a simple home page with very little information. The user is given some basic information regarding the functionality of the application and links
to the individual pages. 

                                                                        Account Page
                                                                ------------------------------

The account page shows the user's account information (first name, last name, username, email address - if given). There is a button for updating the account information. 
They can also view their fitness profile here. There is a button beneath the fitness profile to update the information. 

!The update pages are split!

                                                                    Update Account Page
                                                                ------------------------------

Controller sends user to a form similar to the registration form. Here they can only change first name, last name, email address, and password. Boxes are prefilled 
with current information. Except for password. They are hashed with SHA1 which prevents us from decrypting the password even if we wanted to. The user can however
change their password here. 

If user fills in one or no password boxes, it is assumed that they did not want to update password - update other fields. Unmatched passwords (both boxes filled though)
will redirect back to the edit form with an error message for the passwords. Matching passwords will update all fields. 


                                                                    Update Fitness Profile Page
                                                                -----------------------------------

The fitness profile update page is similar to the registration form as well. All fields MUST be numeric. Otherwise, the controller redirects back to the edit form
with appropriate error messages. 


                                                                        Exercise Page
                                                                ------------------------------

User will be directed to exercise/view_exercise_list.php (if logged in). The initial layout of the page shows a table with all available exercises. 
I have only included 8 in the database as of now for testing. This table shows name, duration/reps (each should only have one), and calories burned. 
There is also a button at the end of the form. This button adds the exercise to $_SESSION['exercise_list']. The app also initializes $_SESSION['selected_days'] at this time
though this is not used until later. 

The exercises in the table are also stored in (and retrieved from) a session ($_SESSION['exercises']), however, this could have probably been done without a session with
better design.

Below the table there is a dropdown list with a list of the user's exercise lists. 

    -admin currently has 2 lists
    -user currently has 1 list
    -donne11y should have 0 lists

The user can select an entry from the dropdown and hit the button beneath the list. The controller will redirect back to exercise/view_exercise_list.php. 
However, the user will now be able to view their exercise list including exercises, duration/reps, calories burned, and days of the week they perform each exercise.

Once a user selects an exercise from the upper table, the controller redirects to the same page. However two new sessions are set - $_SESSION['exercise_list'] and
$_SESSION['selected_days']. With these set, a new table appears in the middle of the page (between all exercises and exercise list). This table is similar to a cart 
in a store application. It displays selected exercises along with the same information previously. The user can remove these exercises by clicking the 'X' on the row.
They can also now create a new exercise list. 

A button below the table will allow this functionality. 


                                                                        Exercise List Page
                                                                --------------------------------

This page features the same table as the "Selected Exercises" table from the previous page. The only addition is a column with a series of check boxes on each row. 
These allow the user to select which days they plan on performing that particular exercise. 

!Currently the application can only perform an update on a single row at a time!

Once they select their preferred days, there is a button on each row "Add Days" that allows the user to add the days to $_SESSION['selected_days']. The controller
redirects the user back to the same page but now the previously checked boxes are still checked. The user will continue to check date boxes for their other selections.

There are three other buttons for the user to interact with: "Cancel", "Clear", and "Add Exercise List". 

Cancel: Allows the user to go back to exercise/view_exercise_list.php. However, the sessions are still intact and the user can add more exercises to their list before 
going back to exercise/create_exercise_list.php

Clear: Unsets $_SESSION['exercise_list'] and $_SESSION['selected_days'] then redirects the user back to the previous page. This is good if the user realizes they 
want to start over. 

Add Exercise List: This will attempt to insert into the USER_EXERCISE_LIST and user_exercise_list_item tables. If days are not selected for a particular exercise, the
controller will send the user back to exercise/create_exercise_list.php withe the appropriate error message. Otherwise, the exercise list will be created then each item 
will be created using the exercise list's ID as a foreign key. 