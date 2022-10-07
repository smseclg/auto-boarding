<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


<! --
 Multiline comment
-->

<style>

body {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto;
      height: 100vh;
      background-color: #f1f1f1;
    }
.container {
      #background-color: #2ecc71;
      width: 200px;
      height: 200px;
    }
</style>

</head>

<body>

<form method="post" action="app/login.php" name="signin-form">

  <div class="container">
    <label>Username</label>
    <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    <br>
    <label>Password</label>
    <input type="password" name="password" required />
    <br>
    <br>
    <button type="submit" name="login" value="login">Log In</button>
    <button type="reset" name="reset" value="reset">Reset</button>
  </div>

</form>

</body>

</html>

