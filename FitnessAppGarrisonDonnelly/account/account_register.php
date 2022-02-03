<?php
    $title = 'Register';
    include '../view/header.php'; 
?>
    <!---------------------------------------------------------------------------------------------------------------
     - Final Project
     - Author: Garrison Donnelly
     - Date: 12/7/2021
     - 
     - Filename: account_register.php
     - 
     - View page that shows the form to create an account along with a fitness profile.
     -------------------------------------------------------------------------------------------------------------->

        <div id="cardForm" class="card shadow mb-5">

            <div class="card-header text-center">
                <h2>Registration</h2>
            </div>

            <?php if(isset($account_message)): ?>
                <p class="error"><?php echo $account_message; ?></p>
            <?php endif; ?>

            <div class="card-body shadow">
                
                    <form action="." method="post" id="registration_form">
                        <input type="hidden" name="action" value="register">
                        
                        <div id="account">
                            <h3 class="mb-3">Account Information</h3>

                            <div id="name" class="row mb-4">
                                <h4 class="text-center">User Information</h4>
                                <div class="col-md-6">                        
                                    <label for="fname" class="form-label">Enter your first name:</label>
                                    <input type="text" class="form-control" id="fname" placeholder="e.g. John" name="fname" value="<?php if(isset($fname)){echo $fname;} ?>">                                
                                </div>

                                <div class="col-md-6">                        
                                    <label for="lname" class="form-label">Enter your last name:</label>
                                    <input type="text" class="form-control" id="lname" placeholder="e.g. Doe" name="lname" value="<?php if(isset($lname)){echo $lname;} ?>">                                
                                </div>

                                <div class="col-12">                        
                                    <label for="email" class="form-label">Enter your email address (optional):</label>
                                    <input type="text" class="form-control" id="email" placeholder="e.g. xyz@yourDomain.com" name="email" value="<?php if(isset($email)){echo $email;} ?>">                                
                                </div>
                            </div>
                            <div id="login" class="row mb-4">
                                <h4 class="text-center">Login Information</h4>
                                <div class="col-12">                        
                                    <label for="username" class="form-label">Create a Username:</label>
                                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="<?php if(isset($username)){echo $username;} ?>">                                
                                </div>

                                <!-- Password Error Message -->
                                <span class="error"><?php if(isset($password_message)){echo $password_message;} ?></span>
                                <div class="col-12">                        
                                    <label for="password_1" class="form-label">Password:</label>
                                    <input type="password" class="form-control" id="password_1" placeholder="Enter password" name="password_1">                                
                                </div>

                                <div class="col-12"> 
                                    <label for="password_2" class="form-label">Re-enter Password:</label>                       
                                    <input type="password" class="form-control" id="password_2" placeholder="Enter password" name="password_2">                                
                                </div>
                            </div>
                        </div>

                        <div id="fitnessProfile">
                            <h3 class="mb-3">Fitness Profile</h3>
                            <h4 class="text-center">Measurables</h4>

                            <!-- Errors -->
                            <div class="row">
                                <div class="col-md-6 error"><?php if(isset($error_message[0])){echo $error_message[0];} ?></div>
                                <div class="col-md-6 error"><?php if(isset($error_message[1])){echo $error_message[1];} ?></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2">                        
                                    <label for="height" class="form-label">Enter your height (in inches):</label>
                                    <input type="text" class="form-control" id="height" placeholder="e.g. 68.75&quot" name="height" value="<?php if(isset($height)){echo $height;} ?>">                                
                                </div>

                                <div class="col-md-6 mb-2">                        
                                    <label for="weight" class="form-label">Enter your weight (in pounds):</label>
                                    <input type="text" class="form-control" id="weight" placeholder="e.g. 156 lbs" name="weight" value="<?php if(isset($weight)){echo $weight;} ?>">                                
                                </div>                                
                            </div>

                            <!-- Errors -->
                            <div class="row">
                                <div class="col-md-6 error"><?php if(isset($error_message[2])){echo $error_message[2];} ?></div>
                                <div class="col-md-6 error"><?php if(isset($error_message[3])){echo $error_message[3];} ?></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2">                        
                                    <label for="pulse" class="form-label">Enter your heart rate (beats per minute):</label>
                                    <input type="text" class="form-control" id="pulse" placeholder="e.g. 60 bpm" name="pulse" value="<?php if(isset($pulse)){echo $pulse;} ?>">                                
                                </div>

                                <div class="col-md-6 mb-2">                        
                                    <label for="cholesterol" class="form-label">Enter your cholesterol:</label>
                                    <input type="text" class="form-control" id="cholesterol" placeholder="e.g. 175" name="cholesterol" value="<?php if(isset($cholesterol)){echo $cholesterol;} ?>">                                
                                </div>
                            </div>

                            <!-- Errors -->
                            <div class="row">
                                <div class="col-md-6 error"><?php if(isset($error_message[4])){echo $error_message[4];} ?></div>
                                <div class="col-md-6 error"><?php if(isset($error_message[5])){echo $error_message[5];} ?></div>
                            </div>
                            <div class="row mb-2">                                
                                <div class="col-md-6 mb-2">                        
                                    <label for="systolic" class="form-label">Enter your systolic blood pressure (number on top):</label>
                                    <input type="text" class="form-control" id="systolic" placeholder="e.g. 135" name="systolic" value="<?php if(isset($systolic)){echo $systolic;} ?>">                                
                                </div>

                                <div class="col-md-6 mb-2">                        
                                    <label for="diastolic" class="form-label">Enter your diastolic blood pressure (number on bottom):</label>
                                    <input type="text" class="form-control" id="diastolic" placeholder="e.g. 85" name="diastolic" value="<?php if(isset($diastolic)){echo $diastolic;} ?>">                                
                                </div>
                            </div>

                            <h4 class="text-center">Lifestyle</h4>

                            <!-- Errors -->
                            <div class="row">
                                <div class="col-md-6 error"><?php if(isset($error_message[6])){echo $error_message[6];} ?></div>
                                <div class="col-md-6 error"><?php if(isset($error_message[7])){echo $error_message[7];} ?></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2">                        
                                    <label for="sleep" class="form-label">Amount of sleep per night (minutes):</label>
                                    <input type="text" class="form-control" id="sleep" placeholder="e.g. 480 minutes" name="sleep" value="<?php if(isset($sleep)){echo $sleep;} ?>">                                
                                </div>

                                <div class="col-md-6 mb-2">                        
                                    <label for="exercise" class="form-label">Amount of exercise per day (minutes):</label>
                                    <input type="text" class="form-control" id="exercise" placeholder="e.g. 45 minutes" name="exercise" value="<?php if(isset($exercise)){echo $exercise;} ?>">                                
                                </div>                                
                            </div>
                            <div class="text-center">
                                <a class="btn btn-lg btn-outline-primary px-0 mx-3 mx-md-5 mt-3 mb-3 w-25" href="..">Back</a>
                                <input class="btn btn-lg btn-primary px-0 mx-3 mx-md-5 mt-5 mb-5 w-25" type="submit" value="Register">
                            </div>
                        </div>
                        
                    </form>
                
            </div>
        </div>
    </div>


<?php include '../view/footer.php'; ?>