<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Forgot Password | CliniCare</title>
       <!-- CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	   <!-- Favicons -->
       <link href="images/gambar/icon.jpeg" rel="icon">
       <!-- Font Icon -->
       <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
       <!-- Main css -->
       <link rel="stylesheet" href="css/style.css">
	   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   </head>
   
   <body>

   
   <div class="main">

        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sign up image"></figure>
						
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Reset Password</h2>
                        <form method="POST" class="signin" id="login-form"
                            action="changePassword.php">
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="np" id="Npassword" placeholder="New Password" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="cp" id="Cpassword" placeholder="Confirm Password" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" class="form-submit" value="Change" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
		
   </body>
</html>



