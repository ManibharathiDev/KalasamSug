<!DOCTYPE html>
<head>
    <title> Login Form </title>
    <style>
      marquee{
        color: #FFFFFF;
        font-size: 10px;
        font-weight: 800;
        font-family: Cambria;
      }
      table, th, td {
        border: 1px solid black;
      }
      table.center {
        margin-left: auto;
        margin-right: auto;
      }
    </style>
</head>
<body>
  <marquee><h1>KALASAM INFO TECH</h1></marquee>
<form class="form" method="POST" name="login" action="{{route('login')}}">
  <h3 align="center"> Login </h3>
  {{csrf_field()}}
 <table class="center" border="1">
  <tr><td>Username </td><td><input type = "text" name = "name" id = "name"/></td></tr>
  <tr><td>Password </td><td><input type = "password " name = "password" id = "password"/></td></tr>
  <tr><td><input type="submit" name="submit"></td><td><a href="{{route('register')}}">New User</a></td></tr>
</table>
</form>
</body>
</html>