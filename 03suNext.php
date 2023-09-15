<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>
<link rel="stylesheet" href="./01about.css">
<?php
$conn = mysqli_connect("localhost", "root", "", "VPLAY");

$q1 = "SELECT MAX(accno) AS ma FROM customer;";
$e1 = mysqli_query($conn, $q1);
$t1 = mysqli_fetch_assoc($e1);
$k = $t1['ma'];
$a = $k+1;
$b = mysqli_real_escape_string($conn, $_POST['Name']);
$c = mysqli_real_escape_string($conn, $_POST['Email']);
$d = mysqli_real_escape_string($conn, $_POST['Phone']);
$e = mysqli_real_escape_string($conn, $_POST['Username']);
$f = mysqli_real_escape_string($conn, $_POST['Password']);
//inserting into customer
$q2 = "INSERT INTO customer VALUES ('$a', '$b', '$c', '$d','$e','$f');";
//incrementing query
$q3 = "SELECT MAX(bid) AS mb FROM bookings;";
$qq3 = "SELECT * FROM customer WHERE USERNAME = '$e';";
$e3 = mysqli_query($conn, $q3);
$t2 = mysqli_fetch_assoc($e3);
$k2 = $t2['mb'];
$g = $k2+1;
//inserting into bookings
$q4 = "INSERT INTO bookings VALUES($g,CURDATE(),$a,NULL);";
$ett = mysqli_query($conn,$qq3);
$n = mysqli_num_rows($ett);
if($n>0){
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Login</title>
    </head>
    <body>
    
    </body>
    </html>
    <div class='container col-xl-10 col-xxl-8 px-4 py-5'>
        <div class='row align-items-center g-lg-5 py-5'>
          <div class='col-lg-7 text-center text-lg-start'>
            <h1 class='display-4 fw-bold lh-1 text-body-emphasis mb-3'>Welcome to VPLAY!</h1>
            <p class='col-lg-10 fs-4'>Get ready to unleash your inner athlete and book your favorite sports court with just a few clicks. Whether you're a seasoned player or a sports enthusiast, our user-friendly login page offers quick and secure access to a world of athletic possibilities. Sign in to explore our wide range of courts, from basketball and tennis to soccer and more, and secure your spot for some adrenaline-pumping action. Don't wait any longer; let the games begin!</p>
          </div>
          <div class='col-md-10 mx-auto col-lg-5'>
            <form class='p-4 p-md-5 border rounded-3 bg-body-tertiary'>
              <div class='form-floating mb-3'>  
                <h5>Username already taken!<br><a href = './03su.html'>Please try another username</a></h5>
              </div>
              <hr class='my-4'>
            </form>
          </div>
        </div>
      </div>";
}
else{
    $e2 = mysqli_query($conn, $q2);
    $e4 = mysqli_query($conn, $q4);
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
    
        <title>Login</title>
    </head>
    <body>
    <div class='container col-xl-10 col-xxl-8 px-4 py-5'>
    <div class='row align-items-center g-lg-5 py-5'>
      <div class='col-lg-7 text-center text-lg-start'>
        <h1 class='display-4 fw-bold lh-1 text-body-emphasis mb-3'>Welcome Back!</h1>
        <p class='col-lg-10 fs-4'>Get ready to unleash your inner athlete and book your favorite sports court with just a few clicks. Whether you're a seasoned player or a sports enthusiast, our user-friendly login page offers quick and secure access to a world of athletic possibilities. Sign in to explore our wide range of courts, from basketball and tennis to soccer and more, and secure your spot for some adrenaline-pumping action. Don't wait any longer; let the games begin!</p>
      </div>
      <div class='col-md-10 mx-auto col-lg-5'>
        <form class='p-4 p-md-5 border rounded-3 bg-body-tertiary'>
          <div class='form-floating mb-3'>  
            <h5>Account successfully created! <br><a href = './04home.html'>Proceed To Home</a></h5>
          </div>
          <hr class='my-4'>
        </form>
      </div>
    </div>
  </div>
    </body>
    </html>
  ";
}

mysqli_close($conn);
?>