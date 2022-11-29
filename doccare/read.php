<?php
include 'conne.php'; 
$post_id=$_GET['post_id'];
$query="select * from article where`post_id`= '$post_id' ";
$result=mysqli_query($conn,$query);
$post_id=$_GET['post_id'];
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="readstyle.php">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <title> Article </title>
</head>

<body >
<?php 
    include'include/navbar.php'


  ?>
  <!-- <div class="p-3 mb-2 bg-dark text-white">
    <nav id="fix" class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid" style="background-color:#343a40 text:white;">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="hair.php">Healthy Hair</a>
            </li>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="skin.php">Healthy Skin</a>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">

                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Weight loss</a>
                </li>

            </div>
        </div>
    </nav>
  </div> -->


  <?php
             while($rows=mysqli_fetch_assoc($result))
            {
              ?>
  <div class="container-fluid ">
    <div class="row ">
      <!-- to get the space form left and right -->
      <div class="col-xl-10  col-lg-10 col-md-12 col-11 mx-auto my-5">
        <div class="row gx-5 mx-sm-auto">
          <!-- left side of the blog  -->
          <div class="col-lg-8 col-md-11 col-11 mx-auto">
            <div class="row gy-5 ">
              <div class="col-12 card p-4 shadow blog_left__div">
                <div class="d-flex justify-content-center align-items-center flex-column pt-3 pb-5 ">
                  <h1 class="text-uppercase"><?php echo$rows['title'];?></h1>
                  <p class="blog_title"> <span class="font-weight-bold"> By, </span>
                    <?  echo$rows[''];  ?>
                  </p>
                </div>
                <figure>
                  <img src="read2.jpg" class="img-fluid" alt="...">
                </figure>
                <p><span class="font-weight-bold"> </span> <?php echo$rows['body'];?> </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
}
?>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
          document.getElementById('fix').classList.add('fixed-top');
          // add padding top to show content behind navbar
          navbar_height = document.querySelector('.navbar').offsetHeight;
          document.body.style.paddingTop = navbar_height + 'px';
        } else {
          document.getElementById('fix').classList.remove('fixed-top');
          // remove padding top from body
          document.body.style.paddingTop = '0';
        }
      });
    });
  </script>

</body>

</html>