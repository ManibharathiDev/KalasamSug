<?php
    session_start();
    if(!isset($_SESSION['name']))
?>
<!DOCTYPE html>
<head>
    <title> Home Page </title>
    <style>
    .topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
/* Add a color to the active/current link */
.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
  </style>   
</head>
<body>
  <!-- <h2> This is my page {{$data->name}}</h2> -->
<div class="topnav">
 <a class="active" href="{{route('home1')}}">Home Page</a>
 <a href="{{route('addcall')}}">Call Register</a>
 <a href="{{route('custReport')}}">Calls Report</a>
 <a href="{{route('addcust')}}">Add Customer</a>
 <a href="{{route('logout')}}">LogOut</a>
</div>
<h1 style="color:blue;" align="center">WELCOME TO HOME PAGE</h1>
</body>
</html>