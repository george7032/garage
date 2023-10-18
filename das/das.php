<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Garage";
$connn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <li rel="stylesheet" href="/das/styles.css"></li>
</head>
<body>
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}
.sidebar {
    background-color: #2c7997;
    color: #fff;
    height: 160vh;
    width: 200px;
    float: left;
    margin-bottom: 100%;

}

.sidebar h2 {
    padding: 20px;
    margin: 0;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.sidebar li a {
    display: block;
    padding: 10px 20px;
    color: #fff;
    text-decoration: none;
}
.sidebar img{
    background-image: url('/images/car.png');
}

.sidebar li a:hover {
    background-color: #1da885;
}

.content {
    margin-left: 200px;
    padding: 20px;
    margin-left: 200px;
    padding-top: 60px;
}

.content h2 {
    margin-top: 0;
}

.loader {
    border: 16px solid #f3f3f3;
    border-top: 16px solid #3498db;
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite;
    margin: 50px auto;
}
header {
position: flex;
top: 0;
right: 0;
left: 200px;
height: 50px;
background-color:  #2c7997;
color: #fff;
display: flex;
align-items: center;
justify-content: space-between;
padding: 0 20px;
z-index: 9999;
}

.logo {
font-size: 1.5rem;
}

.search {
display: flex;
align-items: center;
}

.search input[type="text"] {
padding: 5px;
border-radius: 5px;
border: none;
margin-right: 10px;
}

.admin-icon {
font-size: 1.5rem;
}


@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
.panel-1 {
        background-color:   #3ca77a;
        border: 1px solid #b4afaf;
        border-radius: 25px;
        box-shadow: 0 0 5px #85d1e4;
        padding: 0px;
        margin: 10px;
        display: inline-block;
        vertical-align: top;
        width: calc(24% - 20px);
    }
    .panel-2 {
    background-color: #3ca77a;
    border: 1px solid #b4afaf;
    border-radius: 25px;
    box-shadow: 0 0 5px #cc7d16;
    padding: 0px;
    margin: 10px;
    display: inline-block;
    vertical-align: top;
    width: calc(24% - 20px); 
}

    .panel-3 {
        background-color:    #3ca77a;
        border: 1px solid #b4afaf;
        border-radius: 25px;
        box-shadow: 0 0 5px #310406e3;
        padding: 0px;
        margin: 10px;
        display: inline-block;
        vertical-align: top;
        width: calc(24% - 20px);
    }
    .panel-4 {
        background-color:   #3ca77a;
        border: 1px solid #b4afaf;
        border-radius: 25px;
        box-shadow: 0 0 5px #cc7d16;
        padding: 0px;
        margin: 10px;
        display: inline-block;
        vertical-align: top;
        width: calc(24% - 20px);
    }
    .panel-1 h3 {
        margin-top: 0;
        color: #ffffff;
    
    }
    .panel-2 h3 {
        margin-top: 0;
        color: #ffffff;
    
    }
    .panel-3 h3 {
        margin-top: 0;
        color: #ffffff;
    
    }
    .panel-4 h3 {
        margin-top: 0;
        color: #ffffff;
    
    }
    .panel p {
        margin-bottom: 0;
     
    }
    .sidebar h2 {
display: flex;
align-items: center;
padding: 20px;
margin: 0;
}

.sidebar  img {
height: 100px;
width: 100px;
margin-right: 10px;
padding-left: 30%;
}

.roadmap {
        display: flex;
        justify-content: space-between;
        align-items: center; /* Align items vertically */
        margin-top: 50px;
    }

    .roadmap-step {
        text-align: center;
        flex: 1;
        position: relative;
        
        
    }

    .roadmap-step i {
        font-size: 1.5em;
        margin-bottom: 1px;
        border: 2px solid #cccccc;
        border-radius: 50%;
        padding: 15px;
        background-color: #3ca77a;
    }

    /* Style for the connecting lines */
    .roadmap-step::before {
        content: "";
        position: absolute;
        top: 50%;
        left: -40%;
        width: calc(100% - 55px); /* Adjust line length */
        height: 2px;
        background-color: #05a160;
        z-index: -1;
    }

    .roadmap-step:first-child::before {
        display: none; /* Hide line before the first step */
    }
    .small-button {
    font-size: 12px; /* Adjust the font size */
    padding: 5px 10px; /* Adjust the padding */
}


    .chart-row {
        display: flex;
        justify-content: space-between; /* Distribute space between charts */
        align-items: center; /* Center vertically */
    }

    .chart-container {
        width: 3000px; /* Adjust the width */
        height: 500px; /* Adjust the height */
        margin: 20px; /* Add some margin between the charts */
    }

    canvas {
        width: 100% !important;
        height: 100% !important;
    }

    </style>

    <header>
        <div class="logo">Dashboard</div>
        <div class="admin-icon">
           <i class="fas fa-user-circle"></i>
        </div>
     </header>
     
   
	<div class="sidebar">
        <a href="../index.html">
		<img src="../images/img 1.jpg" />
        </a>
		<ul>
            <li class="fa fa-home"><a href="das.php" onclick="loadData()">Dashboard</a></li>
			<li class="fa fa-parking"><a href="#" onclick="loadData('manage-service.php')">Service</a></li>
			<li class="fa fa-car"><a href="#" onclick="loadData('manage-vehicles.php')">Manage Vehicles</a></li>
            
		</ul>
	</div>
    <div class="container">
        <div id="data-container">
            <!-- Your panel code here -->
       
    
        <!-- Roadmap Section -->
        <div class="roadmap">
            <div class="roadmap-step">
                <i class="fa fa-car"></i>
                <p>Customer Arrival</p>
            </div>
            <div class="roadmap-step">
                <i class="fa fa-list-alt"></i>
                <p>Choose Service</p>
            </div>
            <div class="roadmap-step">
                <i class="fa fa-wrench"></i>
                <p>Servicing</p>
            </div>
            <div class="roadmap-step">
                <i class="fa fa-check-circle"></i>
                <p>Pick-up</p>
            </div>
        </div>
    </div>
	<div class="content">
		<div id="data-container">
			
			<div class="panel-1">
                <span class="fa-stack fa-2x">  <i class="fa fa-credit-card fa-stack-1x fa-inverse"></i> </span>
				<h3>Manage money</h3>
				<p>
                <button onclick="loadData('manage-money.php')">
                    <?php $result = mysqli_query($connn,"SELECT * FROM appointments ");
$num_rows = mysqli_num_rows($result);
{
?>
                Total funds :<?php echo htmlentities($num_rows);  } ?>		
</button>
                </p>
			</div>
			<div class="panel-2">
                <span class="fa-stack fa-2x">  <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
				<h3>Manage Mechanics</h3>
				<p>
                <button onclick="loadData('manage-operators.php')">
                <?php $result = mysqli_query($connn,"SELECT * FROM operator ");
$num_rows = mysqli_num_rows($result);
{
?>
                Total Mechanics :<?php echo htmlentities($num_rows);  } ?>		
</button>
                </p>
			</div>
			<div class="panel-3">
                <span class="fa-stack fa-2x">  <i class="fa fa-car fa-stack-1x fa-inverse"></i> </span>
				<h3>Manage vehicles</h3>
				<p>
                <button onclick="loadData('manage-vehicles.php')">
                <?php $result = mysqli_query($connn,"SELECT * FROM appointments ");
$num_rows = mysqli_num_rows($result);
{
?>
                Total vehicles :<?php echo htmlentities($num_rows);  } ?>		
                </button>
                </p>
			</div>
            <div class="panel-4">
                <span class="fa-stack fa-2x">  <i class="fa fa-smile fa-stack-1x fa-inverse"></i> </span>
				<h3>Manage Users</h3>
				<p>
                <button onclick="loadData('manage-user.php')">

                <?php $result = mysqli_query($connn,"SELECT * FROM user ");
$num_rows = mysqli_num_rows($result);
{
?>
                Total Users :<?php echo htmlentities($num_rows);  } ?>		
                </button>
                </p>
            </div></p>
			<div class="chart-row">
                <div class="chart-container">
                    <canvas id="barChart"></canvas>
                </div>
                <div class="chart-container">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
            

            <script>
                // Sample data for the bar chart
                var barChartData = {
                    labels: ['January', 'February', 'March', 'April', 'May','june','july','august','september','october','november','december'],
                    datasets: [{
                        label: 'earnings',
                        backgroundColor: '#3ca77a', // Set the bar color
                        data: [45, 32, 68, 28, 52, 34, 34, 44, 60, 20, 40, 90, 70]
                    }]
                };
            
                // Sample data for the pie chart
                var pieChartData = {
                    labels: ['AUDI', 'BMW', 'TOYOTA', 'VW', 'HONDA'],
                    datasets: [{
                        data: [20, 30, 25, 25, 30],
                        backgroundColor: ['#e74c3c', '#3498db', '#f39c12', '#2ecc71', '#3ca77a'] // Set pie chart segment colors
                    }]
                };
            
                // Create the bar chart
                var barChart = new Chart(document.getElementById('barChart'), {
                    type: 'bar',
                    data: barChartData,
                    options: {
                        responsive: true,
                    }
                });
            
                // Create the pie chart
                var pieChart = new Chart(document.getElementById('pieChart'), {
                    type: 'pie',
                    data: pieChartData,
                    options: {
                        responsive: true,
                    }
                });
            </script>
            <div class="calendar-container">
                <div class="calendar-flipper">
                    <div class="calendar-front">
                        <!-- Front content of the calendar -->
                    </div>
                    <div class="calendar-back">
                        <!-- Back content of the calendar -->
                    </div>
                </div>
            </div>
            
		</div>
	</div>

    <div>
   

	<script src="/das/script.js"></script>
    <script>
        
        function loadData(url) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("data-container").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}


    </script>
</body>
</html>
