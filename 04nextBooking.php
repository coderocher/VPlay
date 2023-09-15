<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>
<link href='./01about.css' rel='stylesheet'>
<?php
$conn = mysqli_connect("localhost", "root", "", "VPLAY");
$q1 = "SELECT accno, bid from Bookings WHERE bid in (SELECT MAX(bid) FROM Bookings);";
$e1 = mysqli_query($conn, $q1);
$t1 = mysqli_fetch_assoc($e1);
$a = $t1['accno'];
$b = $t1['bid'];
$b = $b+1;
$q2 = "INSERT INTO Bookings VALUES('$b',CURDATE(),'$a',NULL);";
$e2 = mysqli_query($conn,$q2);
echo "
<!DOCTYPE html>
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
            <h5><a href = './04home.html'>Click to be directed to Home.</a></h5>
          </div>
          <hr class='my-4'>
        </form>
      </div>
    </div>
  </div>
    </body>
    </html>
";
mysqli_close($conn);
?>