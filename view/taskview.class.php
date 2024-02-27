<?php

include_once("./model/task.class.php");

/**
 * A class that is responsible for displaying outputs
 */
class TaskView extends Task {

    // A function that shows all the tasks to the user
    public function showAllTasks() {

        $results = $this->getAllTasks();

        /* while($row = $results->fetch_assoc()) {
            var_dump($row);
            echo "<br>";
            echo "<br>";
        } */

        return $results;

    }

    // A function that gets the total of all tasks
    public function showTotalTasks() {

        $results = $this->getTotalTasks();

        return $results->fetch_assoc()['Total_tasks']; // Returns the Number of Total Task

    }

    // A function that gets the total of all medium tasks
    public function showTotalMediumTasks() {

        $results = $this->getAllMediumTasks();

        return $results->fetch_assoc()['Total_tasks'];

    }   

    // A function that gets the total of all medium tasks
    public function showTotalHighTasks() {

        $results = $this->getAllHighTasks();

        return $results->fetch_assoc()['Total_tasks'];

    }  

}