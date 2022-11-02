<html>
<head>
    <title>
     Login page
    </title>
    <link rel="stylesheet"  href="login1.css">
</head>

<body>
<!----------------------------------->
<div class="container1">
    <div class="subcontainer1">
        <img src="logo.png" /> 
    </div>
</div> 
<!----------------------------------->
<div class="container2">
    <div class="subcontainer2">
    <?php
       echo date('d-m-Y');
       ?>
    </div>   
</div>
<!----------------------------------->
<div class="container3">
    <div class="subcontainer3">
        
    <form method="post" action="{{url('login-form')}}" > 
    {{csrf_field()}}
    <table>
        <tr>
            <td></td>
            <td class="login-heading">Login</td>
        </tr>
            <tr>
                <td> <label>Username</label></td>
                <td><input type="text" name="name"/></td>
            </tr>
            <tr>
                <td><label> Password</label></td>
                <td><input type="password" name="password" /></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="login" value="Login" class="login_btn" />
                </td>
            </tr>
    </table>
    </form>
    </div>
</div>
<!----------------------------------->

<div class="container4"></div>
</body>
</html>