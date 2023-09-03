<!DOCTYPE html>
<head>
    <title>Register Form</title>
</head>
<body>
 <h1 align="center">KALASAM INFO TECH</h1>
<form class="form" method="POST" name="login" action="{{route('adduser')}}">
  <h3 align="center"> Register Form</h3>
  {{csrf_field()}}
 <table align="center" border="1">
  <tr><td>Username </td><td><input type = "text" name = "name" id = "name"/></td></tr>
  <tr><td>Email Id </td><td><input type = "text" name = "email" id = "email"/></td></tr>
  <tr><td>Password </td><td><input type = "password " name = "password" id = "password"/></td></tr>
  <tr><td>Con password </td><td><input type = "password " name = "password" id = "password"/></td></tr>
  <tr><td>Con password </td><td><select id="usertype" name="usertype">
        <option>Select</option>
        <option value="admin">admin</option>
        <option value="user">user</option> 
</select></td></tr>
  <tr><td></td><td align="center"><input type="submit" name="submit"></td></tr>
</table>
</form>
</body>
</html>