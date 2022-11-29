<?php
include 'conne.php'; 
$query="select * from article";
$result=mysqli_query($conn,$query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocCare! </title>

    <!-- aos css file cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- magnific popup css cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

    <!-- bootstrap cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="homestyle.php">

</head>

<body>
    <header>

        <div class="container">

            <a href="#" class="logo"><span>D</span>oc<span>C</span>are</a>

            <nav class="nav">
                <ul>
                    <li><a href="doctor-login">Doctors</a></li>
                    <li><a href="patient-login.php">Login</a></li>
                    <li><a href="#facility">Booking</a></li>
                    <li><a href="article.php">Blogs</a></li>
                    <li><a href="#contact">Contact us</a></li>


                </ul>
            </nav>

            <div class="fas fa-bars"></div>

        </div>

    </header>

    <!-- header section ends  -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="container">

            <div class="row min-vh-100 align-items-center text-center text-md-left">

                <div class="col-md-6 pr-md-5" data-aos="zoom-in">
                    <img src="logo.jpg" width="100%" alt="">
                </div>

                <div class="col-md-6 pl-md-5 content" data-aos="fade-left">
                    <h1><span>stay</span> safe, <span>stay</span> healthy.</h1>
                    <h3>caring for you.</h3>
                    <a href="#facility"><button class="button">learn more</button></a>
                </div>

            </div>

        </div>

    </section>


    <!-- home section ends -->

    <!-- about section start  -->

    <section class="about" id="about">

        <div class="container">

            <div class="row min-vh-100 align-items-center">

                <div class="col-md-6 content" data-aos="fade-right">

                    <div class="box">
                        <h3> <i class="fas fa-stethoscope"></i></i> Find Doctors Near You </h3>
                        <p>DocCare has the best team of doctors. You will find doctor of almost every specialization.
                        </p>
                    </div>

                    <div class="box">
                        <h3> <i class="fas fa-clinic-medical"></i> Quick Appointment Booking </h3>
                        <p>With just one click you can book your appointment and visit your doctor</p>
                    </div>

                    <div class="box">
                        <h3> <i class="fas fa-notes-medical"></i> Previous Medical History </h3>
                        <p>DocCare has record of your medical history. You can also download the prescription</p>
                    </div>

                </div>

                <div class="col-md-6 d-none d-md-block" data-aos="fade-left">
                    <img src="images/about-img.png" width="100%" alt="">
                </div>

            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- facility section starts  -->

    <section class="facility" id="facility">

        <div class="container">
            <style>
                mark {
                    background-color: black;
                    color: white;
                }
            </style>
            <h1 class="heading"><span></span> Our facilities <span></span></h1>

            <div class="box-container">

                <div class="box" data-aos="zoom-in">
                    <a href="" title="our team">
                        <img src="doc.jpg" alt="">
                        <div class="carousel-caption d-none d-md-block" style="color: black;">
                            <h2 class="display-6"><strong><mark>Expert Doctors</mark> </h2></strong> </strong>
                        </div>
                    </a>
                </div>

                <div class="box" data-aos="zoom-in">
                    <a href="" title="online consult">
                        <img src="video.jpeg" alt="">
                        <div class="carousel-caption d-none d-md-block" style="color: black;">
                            <h2 class="display-5"><strong> <mark>Online Consultation</h2></strong>

                        </div>
                    </a>
                </div>

                <div class="box" data-aos="zoom-in">
                    <a href="article.php" title="Top blogs from experts">
                        <img src="blog.jpg" alt="">
                        <div class="carousel-caption d-none d-md-block" style="color: black;">
                            <h3 class="display-6"><strong><mark>Top Articles From Experts</h3></strong>

                        </div>
                    </a>
                </div>

                <div class="box" data-aos="zoom-in">
                    <a href="" title="Emergency Services">
                        <img src="emergency.jpeg" alt="">
                        <div class="carousel-caption d-none d-md-block" style="color: black;">
                            <h2 class="display-5"><strong><mark>Emergency Service</h2></strong>

                        </div>
                    </a>
                </div>

                <div class="box" data-aos="zoom-in">
                    <a href="" title="Book Online">
                        <img src="book.jpg" alt="">
                        <div class="carousel-caption d-none d-md-block" style="color: black;">
                            <h2 class="display-5"><strong><mark>Book Appointment</h2></strong>

                        </div>
                    </a>
                </div>

                <div class="box" data-aos="zoom-in">
                    <a href="" title="Check Symtoms">
                        <img src="self.jpg" alt="">
                        <div class="carousel-caption d-none d-md-block" style="color: black;">
                            <h2 class="display-5"><strong><mark> Check your symtoms</h2></strong>

                        </div>
                    </a>
                </div>

                <div class="box" data-aos="zoom-in">
                    <a href="#" title="Fight Corona">
                        <img src="Corona.jpg" alt="">
                        <div class="carousel-caption d-none d-md-block" style="color: black;">
                            <h2 class="display-5"><strong><mark>Lets Fight Corona</h2></strong>
                        </div>
                    </a>
                </div>

                <!-- <div class="box" data-aos="zoom-in">
        <a href="" title="Find vaccination slots">
            <img src="vaccine.jpg" alt="">
            <div class="carousel-caption d-none d-md-block" style="color: black;">
        <h2 class="display-5"><strong><mark>Vaccination</h2></strong>

      </div>
        </a>
    </div>

    <div class="box" data-aos="zoom-in">
        <a href="" title="Blood Bank">
            <img src="blood.jpg" alt="">
            <div class="carousel-caption d-none d-md-block" style="color: black;">
        <h2 class="display-5"> <strong><mark>Blood Bank</h2></strong>
      </div> -->
                </a>
            </div>
        </div>
        </div>

        </div>

        </div>

    </section>

    <!-- facility section ends -->

    <!-- counter section starts  -->
    <?php

?>


    <section class="counter">

        <div class="container">

            <div class="box-container">

                <div class="box" data-aos="fade-up">
                    <i class="fas fa-users"></i>
                    <span><?php  ?> </span>
                    <h3>Doctors</h3>
                </div>

                <div class="box" data-aos="fade-up">
                    <i class="fas fa-smile"></i>
                    <span><?php ?> </span>
                    <h3>Happy patients</h3>
                </div>


            </div>

        </div>

    </section>

    <!-- counter section ends -->
    <!-- post section starts  -->

    <section class="post" id="post">

        <div class="container min-vh-100">

            <h1 class="heading"><span></span> Health Related Articles <span></span></h1>
            <?php
    while($rows=mysqli_fetch_assoc($result))
            {
              ?>
            <div class="box-container">

                <div class="box" data-aos="fade-right">
                    <img src="<?php echo $rows['image']; ?>" alt="">
                    <div class="content">
                        <a href="#">
                            <h3><?php echo $rows['title']; ?> </h3>
                        </a>
                        <p><?php echo $rows['subhead'];?></p>
                        <a href="read.php?post_id=<?php echo $rows['post_id'];?>"><button class="button">read
                                more</button></a>
                    </div>
                </div>
                <?php
}
?>


            </div>

        </div>

    </section>
    <!-- <a href="article.php"><button class="button" style="margin-left: 580px;">See all the articles</button></a> -->
    <!-- post section ends -->

    <!-- contact section starts  -->
    <?php
include 'conne.php';
if(isset($_POST['done']))
{
$name = $_POST['name'];
$number = $_POST['number'];
$email = $_POST['email'];
$address = $_POST['address'];
$msg = $_POST['msg'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $query="INSERT INTO `contact` ( `name`, `number`,`email`, `address`,`msg`) VALUES ( '$name', '$number' , '$email','$address','$msg')";
    $query= mysqli_query($conn,$query);
    echo '<script>alert("Submission Done!")</script>';

}
}
?>

    <section class="contact" id="contact">

        <div class="container min-vh-100">

            <div class="row justify-content-center">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="bg2.jpg" class="d-block w-100" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="heading"><span></span> Having a problem? Write us here! <span></span></h1>

                                <div class="col-md-10" data-aos="flip-down" style="padding-left: 150px;">

                                    <form action="" method="post">

                                        <div class="inputBox">
                                            <input type="text" name="name" id="name" placeholder="your full name">
                                            <input type="number" name="number" id="number"
                                                placeholder="your phone number">
                                        </div>

                                        <div class="inputBox">
                                            <input type="email" name="email" id="email" placeholder="your email">
                                            <input type="text" name="adress" id="address" placeholder="your address">
                                        </div>

                                        <textarea name="msg" id="msg" cols="30" rows="10"
                                            placeholder="Your problem(Please elaborate)"></textarea>

                                        <input type="submit" name="done" id="done" value="submit" class="button">

                                    </form>

                                </div>

                            </div>

                        </div>

    </section>
    </div>
    </div>



    <!-- contact section ends -->



    <!-- footer section starts  -->

    <section class="footer">

        <!-- <div class="container"> -->
<div class="col-lg-12">


            <div class="row d-flex justify-content-center">

                <div class="col-md-4 " data-aos="fade-right">
                    <a href="#" class="logo"><span>D</span>oc<span>C</span>are.</a>
                    <p>Fitter,Healthier,Happier!</p>
                    <p>Designed and built with all the love in the world by our team.</p>
                </div>

                <div class="col-md-4 text-center " data-aos="fade-left">
                    <h4 class="text-light">Developed By</h4>
                    <a href="#">Prasenjit Manna</a>
                    <a href="#">Lakshita Rajkhowa</a>
                    <a href="#">Ankita Bhagawati</a>
                </div>


            </div>
            </div>
            <h4 class="credit text-center mx-auto">mail us at <span>doccare11@gmail.com</span> | all rights reserved.
            </h4>
    </section>

    <!-- footer section ends -->


















    <!-- jquery cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- magnific popup js link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <!-- aos js file cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- custom js link  -->
    <script src="js/main.js"></script>


    <script>
        AOS.init({
            duration: 1000,
            delay: 400
        });
    </script>

</body>

</html>