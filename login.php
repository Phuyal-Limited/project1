
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="#">

    <title>Login | VBS Nepal</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!-- Custom styles for this template -->
    <link href="css/signing.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Please Login</h2>
        <input type="text" class="form-control" placeholder="Email address" autofocus required>
        <input type="password" class="form-control" placeholder="Password" required>
        <label class="radio">
          <input type="radio" name="userType" value="seller" required> Seller
        </label>
        <label class="radio">
          <input type="radio" name="userType" value="buyer" checked required> Buyer
        </label>
        <button class="btn btn-lg btn-primary" type="submit">Login</button>
        <button class="btn btn-lg" type="clear">Clear</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
