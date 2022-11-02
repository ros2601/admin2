@if(session()->has('user_session'))
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
welcome you are logged in
<a href="{{('/logout')}}">Logout</a>
</body>
</html>
@else
<script>
  window.location="{{('login')}}"
</script>

@endif