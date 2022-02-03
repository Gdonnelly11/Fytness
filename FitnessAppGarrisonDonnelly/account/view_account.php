<?php 
    $title = 'Account';
    include '../view/header.php'; 
?>

    <!---------------------------------------------------------------------------------------------------------------
     - Final Project
     - Author: Garrison Donnelly
     - Date: 12/7/2021
     - 
     - Filename: view_account.php
     - 
     - View page that shows the account and fitness profile for the user.
     -------------------------------------------------------------------------------------------------------------->

        <div id="cardForm" class="card shadow mb-5">
            <div class="card-header text-center">
                <h2>Account</h2>
            </div>
            <div class="card-body shadow">
                <h3 class="text-center">Welcome <?php echo($_SESSION['user']['user_fname'] . ' ' . $_SESSION['user']['user_lname'])?>!</h3>

                <?php if(isset($error_message)): ?>
                    <p class="error"><?php echo $error_message; ?></p>
                <?php endif; ?>

                <div class="row mt-5 mb-3 row-bot">
                    <div class="card col-md-3 mx-auto mb-3 shadow">
                        <div class="card-header">
                            <h4 class="text-center">Username</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-center"><?php echo $_SESSION['user']['user_name']?></p>
                        </div>
                    </div>

                    <div class="card col-md-3 mx-auto mb-3 shadow">
                        <div class="card-header">
                            <h4 class="text-center">Personal Information</h4>
                        </div>
                        <div class="card-body">
                            <dl class="text-center">
                                <dt>First Name:</dt>
                                <dd><?php echo $_SESSION['user']['user_fname']?></dd>
                                <dt>Last Name:</dt>
                                <dd><?php echo $_SESSION['user']['user_lname']?></dd>
                            </dl>
                        </div>
                    </div>

                    <div class="card col-md-3 mx-auto mb-3 shadow">
                        <div class="card-header">
                            <h4 class="text-center">Email Address</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-center"><?php echo $_SESSION['user']['user_email']?></p>
                        </div>
                    </div>
                    <div id="top_button" class="col-md-4 text-center pb-5 mx-auto my-auto">
                        <a href="../account/index.php?action=account_edit" type="button" class="btn btn-lg btn-primary mt-3 w-50">Update Account</a>
                    </div>
                </div>

                <div class="row mt-5 mb-3">
                    <div class="card col-md-4 mx-auto mb-3 shadow">
                        <div class="card-header">
                            <h4 class="text-center">Height</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-center"><?php echo $_SESSION['fitness_profile']['fp_height']?></p>
                        </div>
                    </div>

                    <div class="card col-md-4 mx-auto mb-3 shadow">
                        <div class="card-header">
                            <h4 class="text-center">Weight</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-center"><?php echo $_SESSION['fitness_profile']['fp_weight']?> lbs</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 mb-3">
                    <div class="card col-md-3 mx-auto mb-3 shadow">
                        <div class="card-header">
                            <h4 class="text-center">Heart Rate</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-center"><?php echo $_SESSION['fitness_profile']['fp_heart_rate']?></p>
                        </div>
                    </div>

                    <div class="card col-md-3 mx-auto mb-3 shadow">
                        <div class="card-header">
                            <h4 class="text-center">Blood Pressure</h4>
                        </div>
                        <div class="card-body">
                        <p class="text-center"><?php echo $_SESSION['fitness_profile']['fp_bp_systolic']?></p>
                        <p class="text-center">----------</p>
                        <p class="text-center"><?php echo $_SESSION['fitness_profile']['fp_bp_diastolic']?></p>
                        </div>
                    </div>

                    <div class="card col-md-3 mx-auto mb-3 shadow">
                        <div class="card-header">
                            <h4 class="text-center">Cholesterol</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-center"><?php echo $_SESSION['fitness_profile']['fp_cholesterol']?></p>
                        </div>
                    </div>

                </div>

                <div class="row mt-5 mb-3">
                    <div class="card col-md-4 mx-auto mb-3 shadow">
                        <div class="card-header">
                            <h4 class="text-center">Exercise</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-center"><?php echo $_SESSION['fitness_profile']['fp_exercise']?> Minutes Per Day</p>
                        </div>
                    </div>

                    <div class="card col-md-4 mx-auto mb-3 shadow">
                        <div class="card-header">
                            <h4 class="text-center">Sleep</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-center"><?php echo $_SESSION['fitness_profile']['fp_sleep']?> Minutes Per Day</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 text-center pb-5 mx-auto my-auto">
                    <a href="../account/index.php?action=fitness_profile_edit" type="button" class="btn btn-lg btn-primary mt-3 w-50">Update Fitness Profile</a>
                </div>
            </div>
        </div>
    </div>


<?php include '../view/footer.php'; ?>