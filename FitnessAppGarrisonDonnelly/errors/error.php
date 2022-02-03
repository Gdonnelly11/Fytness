<?php
    $title = 'Page Unavailable';
    include '../view/header.php'; 
?>

    <!---------------------------------------------------------------------------------------------------------------
     - Final Project
     - Author: Garrison Donnelly
     - Date: 12/7/2021
     - 
     - Filename: error.php
     - 
     - Error page only shows if an invalid action value is passed to exercise controller. 
     - Should never happen normally. Only happens if user manually enters invalid query string in URL.
     - account/index.php handles this case by rerouting to the login page.  
     -------------------------------------------------------------------------------------------------------------->

        <div id="cardForm" class="card mb-5 shadow">
            <div class="card-header text-center">
                <h2>Error</h2>
            </div>
            <div class="card-body shadow">
                <p>Error message: <?php echo $error_message; ?></p>
            </div>
        </div>

<?php include '../view/footer.php'; ?>