<?php
    $title = 'View Exercise List';
    include '../view/header.php'; 
?>

    <!--------------------------------------------------------------------------------------------------------------------------
     - Final Project
     - Author: Garrison Donnelly
     - Date: 12/7/2021
     - 
     - Filename: view_exercise_list.php
     - 
     - View page for exercises and exercise list. Split into three sections.
     - Top section shows all available exercises. User can select to add them to a session to create their own exercise list.
     - Middle section shows the already selected exercises in the session.
     - Bottom section allows the user to select one of their already created exercise lists and view the information.
     -------------------------------------------------------------------------------------------------------------------------->

        <div id="cardForm" class="card shadow mb-5">
            <div class="card-header text-center">
                <h2>Exercises</h2>
            </div>
            <div class="card-body shadow">
                <h3>Available Exercises</h3>

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
                            <th>Add Exercise</th>
                        </tr>
                        <?php foreach($_SESSION['exercises'] as $id => $exercise): ?>
                            <tr>
                                <form action="." method="post" id="exercises">
                                    <input type="hidden" name="exercise_id" value="<?php echo $exercise['exercise_id']; ?>">
                                    <input type="hidden" name="action" value="add_exercise">
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
                                        <input type="submit" class="btn btn-primary px-3" value="&plus;">
                                    </td>
                                </form>
                            </tr>
                            <?php endforeach; ?>
                    </table>
                </div>
                <?php if(!empty($_SESSION['exercise_list'])): ?>
                    <div class="row py-5 table-responsive-md">
                        <h3>Selected Exercises</h3>
                        <table class="table table-hover">
                            <tr>
                                <th>Exercise Name</th>
                                <th>Number of Repetitions</th>
                                <th>Duration</th>
                                <th>Calories Burned</th>
                                <th>Remove Exercise</th>
                            </tr>
                            <?php foreach($_SESSION['exercise_list'] as $id => $exercise): ?>
                                <tr>
                                    <form action="." method="post" id="selected_exercises">
                                        <input type="hidden" name="exercise_id" value="<?php echo $exercise['exercise_id']; ?>">
                                        <input type="hidden" name="action" value="remove_exercise">
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
                                            <input type="submit" class="btn btn-primary px-3" value="X">
                                        </td>
                                    </form>
                                </tr>
                                <?php endforeach; ?>
                        </table>
                    </div>

                    <div class="row-bot row mb-1 py-5">
                        <div class="col-12 text-center">
                            <label class="mx-5 h4">Create New Exercise List:</label>
                            <a class="btn btn-primary px-3" href="../exercise/index.php?action=create_exercise_list"><span>&plus;</span></a>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="row py-5">
                    <h3>Exercise List</h3>
                    <form action="." method="post" id="exercise_list" class="mb-0 col-8 my-auto mx-auto text-center">
                        <input type="hidden" name="action" value="select_exercise_list">
                        <div class="form-floating">                            
                            <select class="form-select" id="list_select" name="exercise_list">
                                <?php $exercise_lists = get_exercise_list_by_user($_SESSION['user']['user_id']);?>
                                <?php if(isset($exercise_lists)): ?>
                                    <?php foreach($exercise_lists as $exercise_list): ?>
                                        <option value="<?php echo $exercise_list['exercise_list_id']; ?>"><?php echo $exercise_list['exercise_list_date']; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <label for="exercise_list" class="form-label">Select exercise list:</label>                                                       
                        </div>
                        <input class="btn btn-outline-primary my-3" type="submit" value="Select">
                    </form>
                    
                    
                </div>
                <div class="table-responsive-md">
                    <?php if(isset($exercise_list) && isset($exercise_list_items)): ?>
                        <table class="table table-hover">
                            <tr>
                                <th>Exercise Name</th>
                                <th>Number of Repetitions</th>
                                <th>Duration</th>
                                <th>Calories Burned</th>
                                <th>Days of the Week</th>
                            </tr>
                            <?php foreach($exercise_list_items as $item): ?>
                                <?php $exercise = get_exercise($item['exercise_id']); ?>
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
                                            <?php echo $item['item_days']; ?>
                                        </td>
                                    </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        
    </div>


<?php include '../view/footer.php'; ?>