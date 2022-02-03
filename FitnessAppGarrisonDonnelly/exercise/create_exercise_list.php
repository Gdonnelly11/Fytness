<?php
    $title = 'Create Exercise List';
    include '../view/header.php'; 
?>

    <!-----------------------------------------------------------------------------------------------------------------------------------------------
     - Final Project
     - Author: Garrison Donnelly
     - Date: 12/7/2021
     - 
     - Filename: create_exercise_list.php
     - 
     - Outputs exercises in $_SESSION['exercise_list'] to a table. 
     - User can select the days they would like to perform the exercise as part of their routine.
     - User can either finalize an exercise list and add to database, clear the session, or go back to view_exercise_list.php to add more exercises. 
     ----------------------------------------------------------------------------------------------------------------------------------------------->

        <div id="cardForm" class="card shadow mb-5">
            <div class="card-header text-center">
                <h2>New Exercise List</h2>
            </div>
            <div class="card-body shadow">
                <h3>Selected Exercises</h3>

                <?php if(isset($error_message)): ?>
                    <p class="error"><?php echo $error_message; ?></p>
                <?php endif; ?>

                <div class="row py-5 table-responsive-md">
                    <table class="table table-hover">
                        <tr>
                            <th>Exercise Name</th>
                            <th>Number of Repetitions</th>
                            <th>Duration</th>
                            <th>Calories Burned</th>
                            <th>Days of the Week</th>
                        </tr>
                        <?php foreach($_SESSION['exercise_list'] as $id => $exercise): ?>
                            <form action="." method="post" id="exercises">
                                <tr>                            
                                    <td>
                                        <?php echo $exercise['exercise_name']; ?>                                    
                                    </td>
                                    <td>
                                        <?php echo $exercise['exercise_reps']; ?>
                                    </td>
                                    <td>
                                        <?php echo $exercise['exercise_duration']; ?>
                                    </td>
                                    <td>
                                        <?php echo $exercise['exercise_calories_burnt']; ?>
                                    </td>
                                    <td>
                                        <?php foreach($days as $day): ?>
                                            <?php if(isset($_SESSION['selected_days'][$exercise['exercise_id']])): ?> 
                                                <?php if((array_search($day, $_SESSION['selected_days'][$exercise['exercise_id']]) || array_search($day, $_SESSION['selected_days'][$exercise['exercise_id']]) === 0)) : ?>
                                                    <input type="checkbox" value="<?php echo $day; ?>" name="days[]" checked>
                                                    <label for="days"><?php echo $day; ?></label>  
                                                <?php else: ?>
                                                    <input type="checkbox" value="<?php echo $day; ?>" name="days[]">
                                                    <label for="days"><?php echo $day; ?></label>                                          
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <input type="checkbox" value="<?php echo $day; ?>" name="days[]">
                                                <label for="days"><?php echo $day; ?></label>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <input type="hidden" name="exercise_id" value="<?php echo $exercise['exercise_id']; ?>">
                                        <input type="hidden" name="action" value="add_exercise_days">
                                        <input type="submit" class="btn btn-primary px-3" value="Add Days"><span></span>
                                    </td>                                
                                </tr>
                            </form>
                        <?php endforeach; ?>
                    </table>
                </div>
                <div class="row-bot row mb-1 py-5">
                    <div class="col-4 text-center">
                        <a class="btn btn-outline-primary px-3" href="../exercise/index.php?action=view_exercise_list">Cancel</a>
                    </div>
                    <div class="col-4 text-center">
                        <a class="btn btn-warning px-3" href="../exercise/index.php?action=clear_exercise_list">Clear</a>
                    </div>
                    <div class="col-4 text-center">
                        <a class="btn btn-primary px-3" href="../exercise/index.php?action=add_exercise_list">Add Exercise List</a>
                    </div>
                </div>
                
                
            </div>
        </div>

        
    </div>


<?php include '../view/footer.php'; ?>