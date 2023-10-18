<?php 

// Connect to the database
$servername = "sql109.epizy.com";
$username = "epiz_33860754";
$password = "KqTAP3lJsbip";
$dbname = "epiz_33860754_final_project";
$conn = new mysqli($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking Attendant Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <style>
      /* Header Styles */
            header {
        background-color: #333;
        color: #fff;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding-right: 10px;
        }

        /* Button Styles */
        .button-container {
        position: relative;
        float: right;
        
        }
        

        .button-container button {
        background-color: #fff;
        color: #333;
        border: none;
        padding: 6px 10px;
        margin-right: 300px;
        cursor: pointer;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        font-size: 14px;
        transition: background-color 0.2s ease;
        float: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    transition: box-shadow 0.2s ease;
  text-align: center;
        }

        .button-container button:hover {
        background-color: rgb(31, 132, 224);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
      .button-container .dropdown-content {
        display: none;
        position: absolute;
        top: 50px;
        background-color: #f9f9f9;
        min-width: 100px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        
      }
      .button-container:hover .dropdown-content {
        display: block;
      }
        body {
            background-color: #f1f1f1;
            text-align: center;
            background-image: url("https://cdn.pixabay.com/photo/2017/11/10/00/20/riga-2935035_960_720.jpg");
            background-size: cover;
            background-repeat: no-repeat ;
        }
        header {
            background-color: #cacad3ec;
            color: #0d0f25;
            padding: 20px;
        }
        h1 {
            margin: 0;
            font-size: 32px;
        }
        ul {
            margin-top: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            list-style-type: none;
        }
        ul li{
            margin: 10px;
        }
        btn{
            display: inline-block;
            background-color:rgb(31, 132, 224);
            border-radius: 10px;
            border: 4px double #cccccc;
            color: #090b1d;
            font-size: 28px;
            text-align: center;
            padding: 20px;
            transition: all 0.5s;
            cursor: pointer;
        
        }
        btn span{
            cursor:pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }
        btn span::after{
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }
        btn:hover{
            background-color: #90bdcfa6;
        }
        btn:hover span{
            padding-right: 25px;
        }
        btn:hover span::after{
            opacity: 1;
            right: 0;
        }
        btn:hover span::after {
            animation: spin 0.5s;
        }

    .in{
        
        margin-bottom: 18px;
    align-self: center;
    }
    .out{
        
        margin-bottom: 18px;
    align-self: center;
    }
    .welcome{
        color: aqua;
    }
        </style>
<body>
    
    <header>
        <h4>PARKING MANAGEMENT SYSTEM</h4>
      <div class="button-container">
        <button >Slots Available</button>
        <div class="dropdown-content">
          <iframe src="/parking attendant/operator/manageslot.php"></iframe>
        </div>
      </div>
    </header>
    <main>
      <p class="welcome">Welcome to our parking lot!</p>
  

    <ul>
        <li>
            <btn type="submit" class="Vehicle Entry" onclick="location.href='vehicle Entry.php';">
            <span class="in"><i class="fa fa-sign-in fa-stack-1x fa-inverse"></i></span>
                <br>
                Vehicle Entry
            </btn>
        </li>  
        <li>
            <btn type="submit" class="Vehicle Exit" onclick="location.href='vehicle Exit.php';">
              <span class="out"><i class="fa fa-sign-out fa-stack-1x fa-inverse"></i></span>
                <br>
                Vehicle Exit
            </btn>
        </li>
   

    </ul>
    </main>
</body>
</html>
