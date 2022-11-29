<?php
 include 'conne.php';
 



?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"
        type="text/css">
    <title></title>
</head>

<body id="body-pd">

    <header class="header navbar navbar-expand navbar-light  topbar mb-4 static-top shadow" id="header">

        <div class="header_toggle"> <i class='fas fa-bars' id="header-toggle"></i> </div>
        <h4>Doc Care</h4>
        <div class="header-name">
      
        <div class="header_img ">


            <img src="images/profile.jpg" alt="">
        </div>
       <p>
           <?php 
           
           if(isset($_SESSION['fname'])){

            $fname= $_SESSION['fname']; 
            echo "<span class='error-msg'>$fname</span>";
             
      
               }
           
           
           ?>

       </p> 
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='fas fa-layer-group nav_logo-icon'></i> <span
                        class="nav_logo-name">Doc Care</span> </a>
                <div class="nav_list"> <a href="#" class="nav_link active"> <i class='fas fa-th-large nav_icon'></i>
                        <span class="nav_name">Dashboard</span> </a>
                    <a href="#" class="nav_link"> <i class='fas fa-user'></i> <span class="nav_name">Users</span> </a>
                    <a href="#" class="nav_link"> <i class='fas fa-envelope nav_icon'></i> <span
                            class="nav_name">Messages</span> </a>
                </div>
            </div> <a href="logout.php" class="nav_link"> <i class='fas fa-sign-out-alt nav_icon'></i> <span
                    class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <div class="height-75 bg-light">
        <h1>jb</h1>
        
    </div>




    <script>
        document.addEventListener("DOMContentLoaded", function (event) {

            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)

                // Validate that all variables exist
                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        // show navbar
                        nav.classList.toggle('show')
                        // change icon
                        toggle.classList.toggle('bx-menu')
                        // add padding to body
                        bodypd.classList.toggle('body-pd')
                        // add padding to header
                        headerpd.classList.toggle('body-pd')
                    })
                }
            }

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav_link')

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink))

            // Your code to run since DOM is loaded and ready
        });
    </script>
