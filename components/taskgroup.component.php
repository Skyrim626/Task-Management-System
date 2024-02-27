


<link rel="stylesheet" href="./css/taskgroup.css" />





  <div class="task-group">
    <div class="task-data">
      <div class="data names">
      
        <span class="data-title"><?php echo $row['Title'] ?></span>
        <div class="due-date">
          <div class="due">
            Due Date:
            <span class="date"><?php echo $row['Due_date'] ?></span>
          </div>
        </div>
      </div>
    </div>
    <!-- Priority Level -->
    <div class="priority_level">
      <div class="text">Priority Level</div>
      <span class="level"><?php echo $row['Priority'] ?></span>
    </div>

    <!-- Edit and Delete Buttons -->
    <div class="task-buttons">
      <div class="buttons | d-flex">
        <div class="edit-button">
          <a href="edit-page.html" title="Edit Page">
            <i class="fa-solid fa-pen-to-square"></i>
          </a>
        </div>
        <button class="delete-button" name="deleteTask" value="<?php echo $row['Task_ID'] ?>" type="submit">
          <p title="Delete Page">
            <i class="fa-solid fa-trash"></i>
          </p>
        </button>
      </div>
    </div>
  </div>



