<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <style>
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
        background-image: url('log.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh; 
        margin: 0; 
    }

    h1{
      font-family: Georgia, 'Times New Roman', Times, serif;
      font-size: 50px;
    }

    .form-container {
        
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        width: 300px;
        margin: 0 auto; 
        margin-top: 50px; 
        display: block;
        backdrop-filter: blur(15px);
        background:rgba(255,255,255,0.2);
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"], 
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }

    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .alert {
        font-size: 24px;
        font-weight: bold;
        color: red;
        background-color: white;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        display: inline-block;
        margin-bottom: 20px;
    }

    .container {
        text-align: center;
        margin: 0 auto;
        width: 50%;
    }
  </style>

  <body>
    

  <div class="container">
    <?php
    if (@$_GET['Empty'] == true) {
        ?>
        <div class="alert text-center my-3"><?php echo $_GET['Empty'] ?></div>
        <?php
    }
    ?>

    <?php
    if (@$_GET['Invalid'] == true) {
        ?>
        <div class="alert text-center my-3"><?php echo $_GET['Invalid'] ?></div>
        <?php
    }
    ?>

    <form action="loginback.php" method="POST" class="form-container">
      <h1>Log In</h1><br>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Enter username">
      </div>
      
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter Password">
      </div>
      <select name="role">
          <option value="Patient">Patient</option>
          <option value="Doctor">Doctor</option>
          <option value="Nurse">Nurse</option>
          <option value="Receptionist">Receptionist</option>
          <option value="Admin">Admin</option>
      </select>
      <input name="login" type="submit" value="login">
    </form>
  </div>

  </body>
</html>
