<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Reset Your Password</h1>
    <a href="http://127.0.0.1:8000/ChangePassword/{{Session::get('key')}}/{{Session::get('id')}}"target="_blank"><button>Enter</button></a>
  </body>
</html>
