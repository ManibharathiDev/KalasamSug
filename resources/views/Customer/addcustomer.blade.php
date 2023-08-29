<!DOCTYPE html>
<head>
  <title> Add Customer </title>
</head>
<body>
<form class="form" method="POST" name="login" action="{{route('customer')}}">
{{csrf_field()}}
<h1 align="center"> KALASAM INFO TECH </h1>
<h2 align="center"> Add Customer </h2>
<table border=1 align="center">
  <tr><td>Company Name</td><td><input type="name" id="comname" name="comname"></td></tr>
  <tr> <td>Contact Person</td><td><input type="name" id="name" name="name"></td></tr>
  <tr><td>Phone No</td><td><input type="name" id="phone" name="phone"></td></tr>
  <tr><td>Mobile No</td><td><input type="name"  id="mobile" name="mobile"></td></tr>
  <tr><td>Email ID</td><td><input type="name"  id="email" name="email"></td></tr>
  <tr><td>Serial No</td><td><input type="name"  id="serialNo" name="serialNo"></td></tr>
  <tr><td>GST No</td><td><input type="name"  id="gstno" name="gstno"></td></tr>
  <tr><td>Reference Person</td><td><input type="name"  id="refname" name="refname"></td></tr>
  <tr><td>Tally Pack Details</td><td><input type="name"  id="pack" name="pack"></td></tr>
  <tr><td></td><td align="center"><input type="submit" name="save"></td></tr>
</table>
</form>
</body>
</html>