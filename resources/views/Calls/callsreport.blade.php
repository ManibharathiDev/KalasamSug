<!DOCTYPE html>
<head>
  <title> Add Customer </title>
</head>
<body>
<form method="post" name="calReport" action="{{route('CallsReport')}}">
{{csrf_field()}}
<h1 align="center"> KALASAM INFO TECH </h1>
<h2 align="center"> Calls Report </h2>
<label>From Date:</label><input type="date" id="FDate" name="FDate">
<label>To Date:</label><input type="date" id="TDate" name="TDate">
<label>Customer Name</label><select name="cust_id" id= "cust_id" cols="25">
<option value="All">All</option>
       @foreach($cust as $row)
           <Option value ="{{$row->id}}">{{$row->comname}}
        @endforeach       
</select>  
<label> Call Status</label><select name="status" id= "status" cols="25">
         <option value="All">All</option>
         <option value="Pending">Pending</option>
         <option value="Completed">Completed</option>      
</select>    
<label> Work </label><select name="work" id= "work" cols="25">
         <option value="All">All</option>
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
<input type="submit" name="submit">
<table border=1>
 <tr><th>SNo</th>
 <th>Date</th>
 <th>Company Name</th>
 <th>Phone No</th>
 <th>Contact Person</th>
 <th>Work</th>
 <th>Call Attend Person</th>
 <th>Status</th>
 <th>Remarks</th>
 <th>Completed Person</th>
 <th>Completed Date</th>
 <th>Action</th>
</tr>
 @foreach($calls as $row)
 <tr>
 <td>{{$row->id}}</td>
 <td>{{$row->Date}}</td>
 <td>{{$row->cust_id}}</td>
 <td>{{$row->phoneno}}</td>
 <td>{{$row->conperson}}</td>
 <td>{{$row->work}}</td>
 <td>{{$row->staff_id}}</td>
 <td>{{$row->status}}</td>
 <td>{{$row->remarks}}</td>
 <td>{{$row->completeperson}}</td>
 <td>{{$row->completeddate}}</td> 
 <td><a href="{{route('editcalls',[$row->id])}}">Edit</a></td>
</tr>
 @endforeach   
</table>
</form>
</body>
</html>