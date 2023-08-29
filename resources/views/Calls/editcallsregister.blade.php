<!DOCTYPE html>
<head>
  <title> Call Register</title>
</head>
<body>
<form class="form" method="POST" name="login" action="{{route('callRegister')}}">
{{csrf_field()}}
<h1 align="center"> KALASAM INFO TECH </h1>
<h2 align="center"> Call Register </h2>
<table border=1 align="center">
@foreach($calls as $row)
<tr><td>Date</td><td>{{$row->Date}}</td></tr>
<tr><td>Company Name</td><td>{{$row->id}}</td></tr>
<tr><td>Phone No</td><td>{{$row->phoneno}}</td></tr>
<tr><td>Contact Person</td><td>{{$row->conperson}}</td></tr>
<tr><td>Work</td><td>{{$row->work}}</td></tr>
<tr><td>Staff name</td><td>{{$row->staff_id}}</td></tr>
<tr><td>Status</td><td><select name="status" id= "status">
         <option value="Pending">Pending</option>
         <option value="Completed">Completed</option>   
    </select> 
  </td></tr>
<tr><td>Remarks</td><td><textarea id="remarks" name="remarks" rows="4" cols="50"></textarea></td></tr>
<tr><td>Completeperson</td><td><input type="name"  id="completeperson" name="completeperson"></td></tr>
<tr><td>Completeddate</td><td><input type="date"  id="completeddate" name="completeddate"></td></tr>
<tr><td></td><td align="center"><input type="submit" name="save"></td></tr>
</table>
</form>
</body>
</html>