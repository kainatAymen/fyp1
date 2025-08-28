<!DOCTYPE html>
<html>
<head>
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.1/css/boxicons.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-wordpress'></i>
      <span class="logo_name">Web app</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="employeedashboard.php">
          <i class='bx bx-home-smile' ></i>
          <span class="link_name">home</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="employeedashboard.php">Home</a></li>
        </ul>
      </li>
      <li>
        <a href="payrol.php">
          <i class='bx bx-user' ></i>
          <span class="link_name">My Profile</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="payrol.php">My Profile</a></li>
        </ul>
      </li>
      
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-task' ></i>
            <span class="link_name">Task</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="">Task</a></li>
          <li><a href="submit_task.php">submit_task</a></li>
          <li><a href="employee.php">Task_History</a></li>
          
        </ul>
      </li>
      <li>
        <a href="salary.php">
          <i class='bx bx-money' ></i>
          <span class="link_name">Payroll</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="salary.php">Payroll</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-calendar-heart' ></i>
            <span class="link_name">Leave</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Leave</a></li>
          <li><a href="employee_dashboard.php">Apply leave</a></li>
          <li><a href="leave_history.php">Leave History</a></li>
        </ul>
      </li>
      
      <li>
        <a href="#" id="settingOption">
        <i class='fa fa-sign-out'></i>
          <span class="link_name">Logout</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">logout</a></li>
        </ul>
      </li>
      
</ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Hello Employee</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>  
       
    
    </nav>
</head>
<body>
<h1>View Tasks</h1>
<div class="recent_order">
 
    <table border="0.5">
        <tr>
        <th>Employee id</th>
            <th>Task Name</th>
            <th>Due Date</th>
            <th>Submit Date</th>
            <th>Mark</th>
            <th>Status</th>
        </tr>
        <?php
        // Connect to database
        $conn = mysqli_connect("localhost", "root", "", "emss");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM task";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['eid'] . "</td>"; // Display employee ID
                echo "<td>" . $row['tname'] . "</td>";
                echo "<td>" . $row['duedate'] . "</td>";
                echo "<td>" . $row['subdate'] . "</td>";
                echo "<td>" . $row['mark'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }

        mysqli_close($conn)
        ?>
    </table>
      </div>
      <script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e)=>{
     let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
     arrowParent.classList.toggle("showMenu");
      });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", ()=>{
      sidebar.classList.toggle("close");
    });

    //logout
document.getElementById("settingOption").addEventListener("click", function() {
    // Show an alert when "Setting" option is clicked
    alert("Are you sure you want to log out?");
    // After the user clicks "OK" in the alert, log them out
    logout();
});

function logout() {
    // Perform logout functionality
    // For example, clear session or authentication tokens
    // After that, you can redirect the user to a login page or any other desired page
    window.location.href = "login.php"; // Redirect to the login page
}

    </script>
</body>
</html>





















