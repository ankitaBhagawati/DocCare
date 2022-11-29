<?php
include 'conne.php'; 
$query="select * from article";
$result=mysqli_query($conn,$query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="articlestyle.php">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title> Article </title>
</head>
<!-- 
<body style="background-color: #e3f2fd;"> -->
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
<body>
  
<?php 
    include'include/navbar.php'


  ?>
  <div class="d-flex justify-content-center">
    <h1 class="display-4" style="gap:80px;"> Health Articles </h1>
    </div>

    <header>



      <div class="row" style="justify-content: center;  gap: 80px; padding-left: 30px; padding-right: 30px;">
        <?php
             while($rows=mysqli_fetch_assoc($result))
            {
              ?>
        <div class="card" style="width: 20rem;">
          <img src="<?php echo $rows['image']; ?>" class="card-img-top" style="height: 45vh; width: 18rem;" alt="">
          <div class="card-body">

            <h5 class="card-title"><?php echo $rows['title']; ?> </h5>
            <p class="card-text"><?php echo $rows['subhead']; ?></p>

            <a href="read.php?post_id=<?php echo $rows['post_id'];?>" class="btn btn-primary">Read More...</a>

            <button type="button" class="btn btn-outline-danger"> <i class="bi bi-heart-fill"></i></i></i> </button>
            <button type="button" class="btn btn-outline-danger"> <i class="bi bi-share"></i> </button>

          </div>
        </div>

        <?php
}

?>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
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