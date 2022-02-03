    <!---------------------------------------------------------------------------------------------------------------
     - Final Project
     - Author: Garrison Donnelly
     - Date: 12/7/2021
     - 
     - Filename: account_login.php
     - 
     - View page that shows the form to login to the app. All links will lead here if not signed in.
     -------------------------------------------------------------------------------------------------------------->

<?php
    $title = 'Login';
    include '../view/header.php'; 
?>
        <!-- Heading -->
        <div id="cardForm" class="card col-md-4 mx-auto text-center shadow mb-5">
            <div class="card-header w-100">
                <h2>Login</h2>
            </div>            

            <form action="." method="post" id="registration_form" class="mb-0">
            <div class="card-body shadow">            
                <input type="hidden" name="action" value="login">
                <!--Error Message-->
                <?php if(isset($error_message)): ?>
                    <p class="error"><?php echo $error_message; ?></p>
                <?php endif; ?>

                <div class="form-floating">                        
                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="<?php if(isset($user_name)){echo $user_name;} ?>">
                    <label for="username" class="form-label">Username:</label>
                </div>

                <div class="form-floating">                        
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                    <label for="password" class="form-label">Password:</label>
                </div>                
            </div>
            <!-- Buttons -->
            <div class="card-footer w-100">
                <a class="btn btn-lg btn-outline-primary px-0 mx-3 mx-md-5 mt-3 mb-3 w-25" href="..">Back</a>
                <input type="submit" value="Login" class="btn btn-lg btn-primary px-0 mx-3 mx-md-5 mt-3 mb-3 w-25">
            </div>
            </form>
        </div>
    </div>


<?php include '../view/footer.php'; ?>