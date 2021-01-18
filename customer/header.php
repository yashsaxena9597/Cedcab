
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserDashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky">
        <a class="navbar-brand logo-margin" href="index.php"><h3><span style="color:#787F09">Ced</span>Cab</h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link " href="index.php" id="home-user">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/CEDCAB/">Book New Ride</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Rides
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="pendingrides.php" id="pendingrides">Pending Rides</a>
                        <a class="dropdown-item" href="approvedride.php" id="completedrides">Completed Rides</a>
                        <a class="dropdown-item" href="cancelledride.php" id="cancelledrides">Cancelled Rides</a>
                        <a class="dropdown-item" href="allrides.php" id="allrides">All Rides</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="account.php"  id="editprofile">Update Information</a>
                        <a class="dropdown-item" href="changepass.php" id="resetpassword">Change Password</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <div style="color:white;">Hi <?php echo $_SESSION['name'] ?> </div>
                <a href="logout.php"class="btn btn-outline-info my-2 my-sm-0" type="submit">Logout</a>
            </form>
        </div>
    </nav>
    <div class="page-content"></div>
    
    
</body>
</html>