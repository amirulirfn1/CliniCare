<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up | CliniCare </title>

    <!-- Favicons -->
    <link href="images/gambar/icon.jpeg" rel="icon">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="signup" id="register-form"
                            action="/MasterCliniCare/Customer/CustomerEntry.php">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" pattern=".{8,}" name="password" id="password" placeholder="Password"  required title="8 characters minimum">
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" pattern=".{10,}" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" required title="10 numbers minimum">
                            </div>
                            <div class="form-group">
                                <label for="icNumber"><i class="zmdi zmdi-card"></i></label>
                                <input type="text" pattern=".{12,}" name="icNumber" id="icNumber" placeholder="IC Number" required title="12 numbers minimum">
                            </div>
                            <div class="form-group">
                                <label for="birthDate"><i class="zmdi zmdi-calendar"></i></label>
                                <input type="date" name="birthDate" id="birthDate" placeholder="BirthDate" required>
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" required>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="/MasterCliniCare/Customer/Sign In Page/Sign In/signin.php" class="signup-image-link">
                            I am already member</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- JS -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>