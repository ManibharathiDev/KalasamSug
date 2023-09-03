<!DOCTYPE html>
<head>
  <title> Call Register</title>
  <style>
  .css-serial {
       counter-reset: serial-number; /* Set the serial number counter to 0 */
   }
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
<form class="form" method="POST" name="login" action="{{route('updateregister')}}">
{{csrf_field()}}
<div class="topnav">
<a href="{{route('home1')}}">Home Page</a>
 <a href="{{route('addcall')}}">Call Register</a>
 <a href="{{route('custReport')}}">Calls Report</a>
 <a href="{{route('addcust')}}">Add Customer</a>
 <a href="{{route('loginpage')}}">LogOut</a>
</div>
<h1 align="center"> KALASAM INFO TECH </h1>
<h2 align="center"> Call Register </h2>
<h3><ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">Sign out</a></li>
</ul></h3>
<table border=1 align="center">
<tr><td>Date</td><td><input type="date" id="Date" name="Date" value="{{$calls->date}}"></td></tr>
<tr><td>Company Name</td><td><select name="cust_id" id= "cust_id" cols="25" readonly>
        <option value ="{{$calls->cust_id}}">{{$cust->comname}}
  </select>   
<tr><td>Phone No</td><td><input type="name" id="phoneno" name="phoneno" value="{{$calls->phoneno}}" readonly></td></tr>
<tr><td>Contact Person</td><td><input type="name" id="conperson" name="conperson" value="{{$calls->conperson}}" readonly></td></tr>
<tr><td>Work</td><td><input type="name" id="work" name="work" value="{{$calls->work}}" readonly></td></tr>
<tr><td>Staff name</td><td><select name="staff_id" id= "staff_id">
  <option value ="{{$calls->staff_id}}">{{$data->name}}
  </select> 
  </td></tr>
<tr><td>Status</td></td><td><select name="status" id= "status">
         <option value="Pending">Pending</option>
         <option value="Completed">Completed</option> 
</select> 
</td></tr>
<tr><td>Remarks</td><td><textarea id="remarks" name="remarks" rows="4" cols="50">{{$calls->remarks}}</textarea></td></tr>
<tr><td>Completeperson</td><td><input type="name"  id="completeperson" name="completeperson"></td></tr>
<tr><td>Completeddate</td><td><input type="date"  id="completeddate" name="completeddate"></td></tr>
<tr><td></td><td align="center"><input type="submit" name="save"></td></tr>
</table>
<ol>
  <li><a href="{{route('home1')}}">Home Page</a></li>
  <li><a href="{{route('custReport')}}">Calls Report</a></li>
</ol>
</form>
</body>
</html>