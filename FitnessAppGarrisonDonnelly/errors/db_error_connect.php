<?php 
    $title = 'Database Error';
    include '../view/header.php'; 
?>

    <!---------------------------------------------------------------------------------------------------------------
     - Final Project
     - Author: Garrison Donnelly
     - Date: 12/7/2021
     - 
     - Filename: db_error_connect.php
     - 
     - Error page only shows if there is an issue connecting to the database. 
     -------------------------------------------------------------------------------------------------------------->

        <div id="cardForm" class="card mb-5 shadow">
            <div class="card-header text-center">
                <h2>Database Error</h2>
            </div>
            <div class="card-body shadow">
                <p>An error occurred connecting to the database.</p>
                <p>Error message: <?php echo $error_message; ?></p>
            </div>
        </div>
    </div>

<?php include '../view/footer.php'; ?>