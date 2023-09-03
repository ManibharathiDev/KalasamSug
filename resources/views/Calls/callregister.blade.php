<!DOCTYPE html>
<head>
  <title> Call Register</title>
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
<form class="form" method="POST" name="login" action="{{route('callRegister')}}">
{{csrf_field()}}
<div class="topnav">
 <a href="{{route('home1')}}">Home Page</a>
 <a class="active" href="{{route('addcall')}}">Call Register</a>
 <a href="{{route('custReport')}}">Calls Report</a>
 <a href="{{route('addcust')}}">Add Customer</a>
 <a href="{{route('loginpage')}}">LogOut</a>
</div>
<h1 align="center"> KALASAM INFO TECH </h1>
<h2 align="center"> Call Register </h2>
<table border=1 align="center">
<tr><td>Date</td><td><input type="date" id="Date" name="Date"></td></tr>
<tr><td>Company Name</td><td><select name="cust_id" id= "cust_id" cols="25">
           <option> Select </option>
       @foreach($cust as $row)
           <Option value ="{{$row->id}}">{{$row->comname}}
        @endforeach
</select>  
<a href="{{route('addcust')}}">Add Customer</a> 
<tr><td>Phone No</td><td><input type="name" id="phoneno" name="phoneno">
<tr><td>Contact Person</td><td><input type="name" id="conperson" name="conperson"></td></tr>
<tr><td>Work</td><td><select id="work" name="work">
        <option value="Tally Support">Tally Support</option>
        <option value="TSS Renewal">TSS Renewal</option> 
        <option value="AMC Renewal">AMC Renewal</option>
        <option value="TDL Customization">TDL Customization</option>
        <option value="TDL Demo">TDL Demo</option>
        <option value="TDL Support">TDL Support</option>
        <option value="New Project">New Project </option>
        <option value="New Pack">New Pack</option> 
        <option value="Tally Conversation">Tally Conversation</option>
        <option value="Release update">Release update</option>      
    </select> 
    </td></tr>
  <tr><td>Staff name</td><td><select name="staff_id" id= "staff_id">
         <option>select</option>
        @foreach($data as $row)
           <option value ="{{$row->id}}">{{$row->name}}
        @endforeach
    </select> 
    </td></tr>
  <tr><td>Status</td></td><td><select name="status" id= "status">
         <option value="Pending">Pending</option>
         <option value="Completed">Completed</option>   
    </select> 
  </td></tr>
  <tr><td>Remarks</td><td><textarea id="remarks" name="remarks" rows="4" cols="50"></textarea></td></tr>
  <tr><td>serialNo</td><td><textarea id="serialNo" name="serialNo" rows="4" cols="50"></textarea></td></tr>
  <tr><td>Call Back Date</td><td><textarea id="date" name="Ncalldate" name="Ncalldate"></textarea></td></tr>
  <tr><tr><td>Bill Type</td><td><select id="type" name="type">
        <option value="AMC">AMC</option>
        <option value="NoAMC">No AMC</option> 
</select></td></tr>
  <tr><td>Completeperson</td><td><input type="name"  id="completeperson" name="completeperson"></td></tr>
  <tr><td>Completeddate</td><td><input type="date"  id="completeddate" name="completeddate"></td></tr>
  <tr><td><a href="{{route('home1')}}">Home Page</a></td><td align="center"><input type="submit" name="save"></td></tr>
</table>
</form>
</body>
</html>