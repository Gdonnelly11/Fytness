<?php
    $title = 'Edit Fitness Profile';
    include '../view/header.php'; 
?>
 
    <!---------------------------------------------------------------------------------------------------------------
     - Final Project
     - Author: Garrison Donnelly
     - Date: 12/7/2021
     - 
     - Filename: fitness_profile_edit.php
     - 
     - View page that shows the form to edit fitness profile information.
     -------------------------------------------------------------------------------------------------------------->

        <div id="cardForm" class="card col-md-6 mx-auto text-center shadow mb-5">
            <div class="card-header w-100">
                <h2>Update Fitness Profile</h2>
            </div>

            <?php if(isset($error_message)): ?>
                    <p class="error"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <form action="." method="post" id="registration_form" class="mb-0">
            <div class="card-body shadow">            
                <input type="hidden" name="action" value="fitness_profile_update">
                <div class="row">
                    <div class="col-md-6 error"><?php if(isset($error_message[0])){echo $error_message[0];} ?></div>
                    <div class="col-md-6 error"><?php if(isset($error_message[1])){echo $error_message[1];} ?></div>
                </div>
                
                <div class="row my-3">                    
                    <div class="col-md-6 form-floating mb-1">                      
                        <input type="text" class="form-control" id="height" value="<?php echo $_SESSION['fitness_profile']['fp_height'];?>" name="height">
                        <label for="height" class="form-label">Height:</label>                        
                    </div>
                    
                    <div class="col-md-6 form-floating mb-md-1">
                        <input type="text" class="form-control" id="weight" value="<?php echo $_SESSION['fitness_profile']['fp_weight'];?>" name="weight">
                        <label for="weight" class="form-label">Weight:</label>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-md-6 error"><?php if(isset($error_message[2])){echo $error_message[2];} ?></div>
                    <div class="col-md-6 error"><?php if(isset($error_message[3])){echo $error_message[3];} ?></div>
                </div>
                <div class="row mb-3">
                    <div class="form-floating col-md-6 mb-3">                        
                        <input type="text" class="form-control" id="pulse" value="<?php echo $_SESSION['fitness_profile']['fp_heart_rate'];?>" name="pulse">
                        <label for="pulse" class="form-label">Heart Rate:</label>
                    </div>
                    <div class="form-floating col-md-6 mb-1">                        
                        <input type="text" class="form-control" id="cholesterol" value="<?php echo $_SESSION['fitness_profile']['fp_cholesterol'];?>" name="cholesterol">
                        <label for="cholesterol" class="form-label">Cholesterol:</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 error"><?php if(isset($error_message[4])){echo $error_message[4];} ?></div>
                    <div class="col-md-6 error"><?php if(isset($error_message[5])){echo $error_message[5];} ?></div>
                </div>
                <div class="row mb-3">
                    <div class="form-floating col-md-6 mb-1">                        
                        <input type="text" class="form-control" id="systolic" value="<?php echo $_SESSION['fitness_profile']['fp_bp_systolic'];?>" name="systolic">
                        <label for="systolic" class="form-label">Systolic Blood Pressure:</label>
                    </div>  
                    <div class="form-floating col-md-6 mb-1">                        
                        <input type="text" class="form-control" id="diastolic" value="<?php echo $_SESSION['fitness_profile']['fp_bp_diastolic'];?>" name="diastolic">
                        <label for="diastolic" class="form-label">Diastolic Blood Pressure:</label>
                    </div> 
                </div> 
                
                <div class="row">
                    <div class="col-md-6 error"><?php if(isset($error_message[6])){echo $error_message[6];} ?></div>
                    <div class="col-md-6 error"><?php if(isset($error_message[7])){echo $error_message[7];} ?></div>
                </div>
                <div class="row my-3">
                    <div class="col-md-6 form-floating mb-1">                        
                        <input type="text" class="form-control" id="sleep" value="<?php echo $_SESSION['fitness_profile']['fp_sleep'];?>" name="sleep">
                        <label for="sleep" class="form-label">Sleep:</label>
                    </div>
                    <div class="col-md-6 form-floating mb-md-1">
                        <input type="text" class="form-control" id="exercise" value="<?php echo $_SESSION['fitness_profile']['fp_exercise'];?>" name="exercise">
                        <label for="exercise" class="form-label">Exercise:</label>
                    </div>
                    
                </div>
            </div>
            <div class="card-footer w-100">
                <input type="submit" value="Update" class="btn btn-lg btn-primary px-0 mt-3 mb-3 w-25">
            </div>
            </form>
        </div>
    </div>


<?php include '../view/footer.php'; ?>