<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>
<link href='./01about.css' rel='stylesheet'>
<?php
$sp = $_POST['sport'];
$sl = $_POST['slot'];
$conn = mysqli_connect("localhost", "root", "", "VPLAY");
$q1 = "SELECT * FROM SPORT WHERE sno = $sp;";
$r1 = mysqli_query($conn,$q1);
$tuple = mysqli_fetch_assoc($r1);
$s = "";
if($sl == 1){$s = "Morning";}
else if($sl == 2){$s = "Noon";}
else if($sl == 3){$s = "Evening";}
$courtMax = $tuple['num_of_courts'];
$q2 = "SELECT * FROM SCHEDULE WHERE sno = $sp AND slot = '$s';";
$r2 = mysqli_query($conn,$q2);
$tuple2 = mysqli_fetch_assoc($r2);
if($sl>0 and $sl<4){

    $usedCourt = $tuple2['num_of_courts'];
    $leftCourt = $courtMax-$usedCourt;
    $qq = "SELECT * FROM Bookings WHERE bdate = CURDATE();";
        $ee = mysqli_query($conn,$qq);
        $fe = mysqli_num_rows($ee);
        if($fe==1){
            $upd = mysqli_query($conn, "UPDATE schedule SET num_of_courts = 0;");
            $usedCourt = 0;
            $leftCourt = 1;
        }
    if($leftCourt>0){
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
                  <h5>Booking Successful!<br><br><a href = './04nextBooking.php'>Proceed with another booking</a><br><br><a href = './index.html'>LogOut</a></h5>
                </div>
                <hr class='my-4'>
              </form>
            </div>
        </div>
        </div>
        </body>
        </html>";
        $usedCourt = $usedCourt+1;
        $q3 = "UPDATE SCHEDULE SET num_of_courts = $usedCourt WHERE sno = $sp AND slot = '$s';";
        $q4 = "UPDATE Bookings SET sno = $sp where sno IS NULL;";
        $eb = mysqli_query($conn, $q4);
        $e = mysqli_query($conn,$q3);
    }
    else{
        $q5 = "DELETE FROM Bookings WHERE sno IS NULL;";
        $e2 = mysqli_query($conn, $q5);
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
                  <h5>Court not available!<br><br><a href = './index.html'>LogOut</a></h5>
                </div>
                <hr class='my-4'>
              </form>
            </div>
        </div>
        </div>
        </body>
        </html>";
    }
}
    else{
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
                  <h5><a href = './04home.html'>Please enter a valid slot!</a></h5>
                </div>
                <hr class='my-4'>
              </form>
            </div>
        </div>
        </div>
        </body>
        </html>";
    }
mysqli_close($conn);
?>