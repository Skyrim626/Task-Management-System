<?php

include_once("./model/task.class.php");

/**
 * A class that is responsible to handle data of task prompts
 */
class TaskController extends Task{

    // A method that adds a new task
    public function insertNewTask($title, $description, $priority, $dueDate) {

        $title = $title;

        $result = $this->setTask($title, $description, $priority, $dueDate); // Pass the parameters

        
        return $result; // Returns the result
    }

    // A method that deletes a task by ID
    public function deleteTaskbyID($id) {

        $result = $this->deleteTask($id);

        return $result; // Returns the result

    }

}