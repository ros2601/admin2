<html>

<head>
    <title>
     Control pannel 
    </title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" type="text/css" >

</head>

<body>
<!----------------------------------->
<div class="container1">
    <div class="subcontainer1">
        <img src="logo.png" /> 
        <button>Logout</button>
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
<div class="maincontainer">
    <div class="innerconatiner">
        <div class="left-section">
            <div class="left">
                <br/>
                <div class="content1">
                    <h3><a href="pagesummary.blade.php">Page Summary</a></h3><hr/>
                    <p><a href="addpage.blade.php">Add Page</a></p><hr/>
                    <h3>Event Summary</h3><hr/>
                    <p>Page Summary</p><hr/>
                    <h3>Change Password</h3><hr/>
                    <h3>Module Summary</h3><hr/>
                    <p>Login Information</p>
                    <p>Username : admin</p>
                 </div> 
            </div>
        </div> 
        <div class="right-section">
            <div class="right">

            </div>
        </div>
    </div>
</div>

     
<div class="container4"></div>
</body>

</html>