<?php 
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['email'])) {

 ?>
 
 
 
<!DOCTYPE html>
<html>
<head>
	<title>TRYYYYYYYYYYYYY</title>
	<link rel="stylesheet" href="../../assets/css/styleUpdateProfile.css">
	
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Update Profile Info</h4>
                    </div>
					
                    <div class="card-body">
                        <form action="updateProcess.php" method="POST">

                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" >
                            </div>
							
							 <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" >
                            </div>
							
                            <div class="form-group mb-3">
                                <label for="">Phone Number</label>
                                <input type="text" name="phoneNumber" class="form-control" >
                            </div>
							
                            <div class="form-group mb-3">
                                <label for="">IC Number</label>
                                <input type="text" name="ICnumber" class="form-control" >
                            </div>
							
							 <div class="form-group mb-3">
                                <label for="">Birth of Date</label>
                                <input type="date" name="birthDate" class="form-control" >
                            </div>
							
                            <div class="form-group mb-3">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control" >
                            </div>
							
                            <div class="form-group mb-3">
                                <button type="submit" name="update_customer_data"
								class="btn btn-primary">Update Data</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


<?php 
}

else
{
     header("Location: updateForm.php");
     exit();
}
 ?>