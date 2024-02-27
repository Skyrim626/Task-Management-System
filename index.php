<?php 

    include("view/taskview.class.php");
    include("controller/taskcontroller.class.php");


    // Create a View
    $taskView = new TaskView();

    // Create Controller
    $taskController = new TaskController();

    // Processing the form submission
    if(isset($_POST['deleteTask'])) {
      // Get the Task_ID of the task being deleted
      $taskID = $_POST['deleteTask'];
      
      $result = $taskController->deleteTaskbyID($taskID); // Returned value true or false
     
    }
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/utilities.css" />
    <link rel="stylesheet" href="css/index.css" />

    <!-- CDJNS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous" ></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" ></script>

    <!-- Scripts -->
    <script src="js/events.js" defer></script>
  </head>
  <body>
    <!-- Sidebar -->
    <section class="sidebar">
      <div class="top">
        <div class="logo_name">
          <a href="#" class="sidebar__logo-name | fw-500">Task Zen</a>
        </div>
      </div>
      <div
        class="menu-items | d-flex flex-column justify-content-space-between"
      >
        <ul class="nav-links |">
          <li>
            <a href="#home" class="d-flex">
              <i class="fa-solid fa-house"></i>
              <span class="link-name">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="task_view.html" class="d-flex">
              <i class="fa-solid fa-list-check"></i>
              <span class="link-name">Tasks</span>
            </a>
          </li>
          <li>
            <a href="add_edit_task.html" class="d-flex">
              <i class="fa-solid fa-pen-to-square"></i>
              <span class="link-name">Add/Edit Task</span>
            </a>
          </li>
        </ul>

        <ul class="logout-mode">
          <li>
            <a href="#" class="d-flex">
              <i class="fa-solid fa-right-from-bracket"></i>
              <span class="link-name">Logout</span>
            </a>
          </li>
          <li class="mode">
            <a href="#" class="d-flex">
              <i class="fa-solid fa-moon"></i>
              <span class="link-name">Dark Mode</span>
            </a>
            <div class="mode-toggle">
              <span class="switch"></span>
            </div>
          </li>
        </ul>
      </div>
    </section>

    <section class="dashboard">
      <div class="top">
        <i class="fa-solid fa-bars sidebar-toggle" sidebar-toggle></i>

        <div class="search-box">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Search here..." />
          <!-- <button class="btn">Search</button> -->
        </div>
      </div>

      <div class="dash-content">
        <div class="overview">
          <div class="title-dash">
            <i class="fa-solid fa-gauge"></i>
            <span class="text fs-3">Dashboard</span>
          </div>

          <div class="boxes">
            <div class="box">
              <a href="task_view.html">
                <i class="fa-solid fa-list-check"></i>
                <span class="text">Total Tasks</span>
                <span class="number"
                  ><?php echo $taskView->showTotalTasks(); ?></span
                >
              </a>
            </div>

            <div class="box">
              <a href="task_view.html">
                <i class="fa-solid fa-list-check"></i>
                <span class="text">Medium Priority Tasks</span>
                <span class="number"
                  ><?php echo $taskView->showTotalMediumTasks(); ?></span
                >
              </a>
            </div>

            <div class="box">
              <a href="task_view.html">
                <i class="fa-solid fa-list-check"></i>
                <span class="text">High Priority Tasks</span>
                <span class="number"
                  ><?php echo $taskView->showTotalHighTasks(); ?></span
                >
              </a>
            </div>
          </div>
        </div>

        <div class="task">
          <div class="title">
            <div class="title-name">
              <i class="fa-solid fa-list-check"></i>
              <span class="text">Tasks</span>
            </div>

            <div class="add-button">
              <a href="add-task.php" class="add-task-btn">
                <i class="fa-solid fa-plus"></i> Add Task
              </a>
            </div>
          </div>

          <!-- Display Tasks Here -->
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

          <?php 

            $results = $taskView->showAllTasks();

            if($results->num_rows > 0) {

              while($row = $results->fetch_assoc()) {
                  // Generates a Task Group
                  include("components/taskgroup.component.php");   
              }

            }

            else {
              echo "<h1 class='text-center'>Empty Task</h1>";
            }

            ?>

            </form>

            <?php 
            
            if(isset($_POST['deleteTask'])) {
                 // Checks if the task is delete
                if($result) {
                  echo "<script>
            swal('Success!', 'Your task has been deleted!', 'success');
                  </script>";
                }

                else {
                  echo "<script>
            swal('Failed!', 'Your task has not been deleted!', 'error');
                  </script>";
                }
            }
            ?>
          
          
        </div>

      
      </div>
      
    </section>
    

    
  </body>
</html>
