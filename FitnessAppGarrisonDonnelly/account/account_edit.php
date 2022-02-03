    <!---------------------------------------------------------------------------------------------------------------
     - Final Project
     - Author: Garrison Donnelly
     - Date: 12/7/2021
     - 
     - Filename: account_edit.php
     - 
     - View page that shows the form to edit account information such as email, first name, last name, and password.
     -------------------------------------------------------------------------------------------------------------->

<?php 
    $title = 'Edit Account';
    include '../view/header.php'; 
?>


        <div id="cardForm" class="card col-md-4 mx-auto text-center shadow mb-5">
            <div class="card-header w-100">
                <h2>Update Account</h2>
            </div>
            <form action="." method="post" id="registration_form" class="mb-0">
                <div class="card-body shadow"> 
                    
                    <?php if(isset($error_message)): ?>
                        <p class="error"><?php echo $error_message; ?></p>
                    <?php endif; ?>

                    <input type="hidden" name="action" value="account_update">

                    <div class="form-floating">                        
                        <input type="text" class="form-control" id="username" value="<?php echo $_SESSION['user']['user_name'];?>" readonly name="username">
                        <label for="username" class="form-label">Username:</label>
                    </div>

                    <div class="row my-3">
                        <div class="col-md-6 form-floating mb-md-1">
                            <input type="text" class="form-control" id="fname" value="<?php echo $_SESSION['user']['user_fname'];?>" name="fname">
                            <label for="fname" class="form-label">First Name:</label>
                        </div>
                        <div class="col-md-6 form-floating">
                            <input type="text" class="form-control" id="lname" value="<?php echo $_SESSION['user']['user_lname'];?>" name="lname">
                            <label for="lname" class="form-label">Last Name:</label>
                        </div>
                    </div>

                    <div class="form-floating mb-3">                        
                        <input type="text" class="form-control" id="email" value="<?php echo $_SESSION['user']['user_email'];?>" name="email">
                        <label for="email" class="form-label">Email Address:</label>
                    </div>
                    <span class="error"><?php if(isset($password_message)){echo $password_message;} ?></span>
                    <div class="form-floating mb-1">                        
                        <input type="password" class="form-control" id="password_1" name="password_1">
                        <label for="password_1" class="form-label">Enter New Password:</label>
                    </div>
                    
                    <div class="form-floating">                        
                        <input type="password" class="form-control" id="password_2" name="password_2">
                        <label for="password_2" class="form-label">Re-enter New Password:</label>
                    </div>    
                </div>
                <div class="card-footer w-100">
                    <input type="submit" value="Update" class="btn btn-lg btn-primary px-0 mt-3 mb-3 w-25">
                </div>
            </form>
        </div>
    </div>


<?php include '../view/footer.php'; ?>