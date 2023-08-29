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
<tr><td>Date</td><td><input type="date" id="Date" name="Date"></td></tr>
<tr><td>Company Name</td><td><select name="cust_id" id= "cust_id" cols="25">
           <option> Select </option>
       @foreach($cust as $row)
           <Option value ="{{$row->id}}">{{$row->comname}}
        @endforeach
</select>   
<tr><td>Phone No</td><td><input type="name" id="phoneno" name="phoneno">
<tr><td>Contact Person</td><td><input type="name" id="conperson" name="conperson"></td></tr>
<tr><td>Work</td><td><select id="work" name="work">
        <option value="Tally Support">Tally Support</option>
        <option value="TSS Renewal">TSS Renewal</option> 
        <option value="AMC Renewal">AMC Renewal</option>
        <option value="TDL Customization">TDL Customization</option>
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
  <tr><td>Completeperson</td><td><input type="name"  id="completeperson" name="completeperson"></td></tr>
  <tr><td>Completeddate</td><td><input type="date"  id="completeddate" name="completeddate"></td></tr>
  <tr><td></td><td align="center"><input type="submit" name="save"></td></tr>
</table>
</form>
</body>
</html>