<?php
echo form_open('auth/login');
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Admin</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css');?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <body >
  <div class="box" >
<form >
  <h1>Login</h1>
  	<input type="text" name="username" placeholder="Username">
  	<input type="password" name="password" placeholder="Password">
<input type="submit" name="LOGIN"></input>
</form>
</div>

  </body>
</html>
