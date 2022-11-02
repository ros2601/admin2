<html>

<head>
    <title>
        Password
    </title>
    <link rel="stylesheet" type="text/css" href="{{asset('http://localhost/admin-panel/resources/css/login.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('http://localhost/admin-panel/resources/css/header.css')}}" >
    
</head>

<body>
<!----------------------------------->
<div class="container1">
    <div class="subcontainer1">
        <img src="logo.png" /> 
        <button><a href="{{url('/logout')}}">Logout</a></button>
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
                    <h3><a href="{{url('/summarypage')}}">Page Summary</a></h3><hr/>
                    <p><a href="{{url('/addpage')}}">Add Page</a></p><hr/>
                    <h3><a href="{{url('/summarycat')}}">Category Summary</a></h3><hr/>
                    <p><a href="{{url('/addcat')}}">Add Category</a></p><hr/>
                    <h3><a href="{{url('/summaryproduct')}}">Product Summary</a></h3><hr/>
                    <p><a href="{{url('/addproduct')}}">Add Product</a></p><hr/>
                    <h3><a href="{{url('/password')}}">Change Password</a></h3><hr/>
                    <p>Login Information<br/>Username : <?php $name = session()->get('user_session');
                    echo $name;?></p>
                 </div> 
            </div>
        </div> 

        <div class="right-section">
            <div class="right">
                    <div class="heading">
                    <h2>Change Password</h2>
                    </div><br/>
                    
            <div class="addpage">
                <p>Change Password</p>
             
            
                <form method="post" action="{{url('/password-change')}}" > 
                {{csrf_field()}}
                    <table>
                        <tr>
                            <td class="t1">Enter Old Password</td>
                            <td><input type="password" name="opassword" ></td>
                        </tr>
                        <tr>
                            <td class="t1">Enter New Password</td>
                            <td><input type="password" name="npassword"></td>
                        </tr>
                
                        <tr>
                            <td class="t1">Confirm New Password</td>
                            <td><input type="password" name="cpassword"></td>
                        </tr>

                    </table>

                    <div class="btns" >
                         <input type="submit" name="save" value="Save" />
                         <input type="button" name="cancel" value="Cancel" />  
                    </div>

               </form>  
            </div>
        </div>
    </div>
</div>

</div>
<div class="container4"></div>
</body>
</html>