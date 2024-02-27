<?php

include("./services/databaseservice.inc.php");

class Test extends DatabaseService {

    // A test function that gets all the tasks
    private function getAllTask() {

        // SQL Command
        $sql = "SELECT * FROM task;";
        
        // Connects to the Database and Execute Query
        $query_result = mysqli_query($this->connectLocal(), $sql);

        if($query_result->num_rows > 0) {

            while($row = $query_result->fetch_assoc()) {
                var_dump($row);
                echo "<br>";
                echo "<br>";
            }

        }
    }

    // A test function for inserting the task
    private function insertNewTask($title, $description, $priority, $dueDate) {
       
        // SQL Command
        $sql = "INSERT INTO `task` (`Title`, `Description`, `Priority`, `Due_date`) VALUES ('$title', '$description', '$priority', '$dueDate');";

        // Connects to the Database and Execute Query
        $query_result = mysqli_query($this->connectLocal(), $sql);

        // Checks if the query is executed properly
        if($query_result) {
            echo "Task Inserted Successfully <br>";
            $query_result;
        }
    
        else {
            echo "Task Inserted Invalid <br>";
            $query_result;
        }

    }

    // A test function that gets the task based on what type of priority
    private function getTaskByPriority($priority) {

        // SQL Command
        $sql = "SELECT * FROM task WHERE Priority='$priority';";

        // Connects to the Database and Execute Query
        $query_result = mysqli_query($this->connectLocal(), $sql);

        if($query_result->num_rows > 0) {

            while($row = $query_result->fetch_assoc()) {
                var_dump($row);
                echo "<br>";
                echo "<br>";
            }

        }
    
    }

    // A test function that updates the task
    private function updateTask($taskID, $title, $description, $priority, $dueDate) {
        
        //SQL Command
        $sql = "UPDATE task 
        SET Title='$title',
        Description = '$description',
        Priority = '$priority',
        Due_date = '$dueDate'
        WHERE Task_ID = '$taskID';
        ";

        // var_dump($sql);

        // Connects to the Database and Execute Query
        $query_result = mysqli_query($this->connectLocal(), $sql);

        if($query_result) {
            echo "Data Updated Successfully!";
        }

        else {
            echo "Data cannot be updated!";
        }

    }

    // A test function that deletes a task by ID
    private function deleteTask($taskID) {

        //SQL Command
        $sql = "DELETE FROM task WHERE Task_ID='$taskID';";
        
        // Connects to the Database and Execute Query
        $query_result = mysqli_query($this->connectLocal(), $sql);

        if($query_result) {
            echo "Data Deleted Successfully!<br>";
        }

        else {
            echo "Unable to delete the data";
        }

    }

}