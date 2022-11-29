<?php
include 'conne.php'; 
if(isset($_POST['save']))
{
$title = $_POST['title'];
$sub = $_POST['sub'];
$body = $_POST['body'];
$photo = $_POST['formFile'];
$doc_id=$_COOKIE['doc_id'];
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $query ="INSERT INTO `article` ( `doc_id`,`title`, `subhead`,`image`, `body`) VALUES ( '$doc_id','$title', '$sub' , '$photo','$body')";
    $query = mysqli_query($conn,$query);
    echo '<script>alert("Submission Done")</script>';

}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
     <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"
        type="text/css">
    <title>Write Blog</title>
</head>

<body>
    <?php 
    include'include/header.php'


  ?>
    <div style="
    margin-left: 80px;
">
<div class="mx-auto"  style="width: 900px;">
        <form name="form1" method="post">
            <div class="form-border border rounded-3 p-3 border-muted col-lg-12 w-50  shadow">
                <div class="reg-head col-lg-12 text-primary text-center">
                    Write a blog
                </div>
                <hr class="my-4">
                <div class="form-group col-lg-12">
                    <label>Enter title</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="form-group col-lg-12">
                    <label>Enter sub-heading</label>
                    <input type="text" class="form-control" name="sub" id="sub">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1" >Enter Body </label>
                    <textarea  id="summernote" name="body" ></textarea>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload photo</label>
                    <input class="form-control" type="file" name="formFile">
                </div>
                <div class="d-grid">
                    <button type="submit" name="save" class="btn m-1 btn-primary col-lg-12">Submit</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
      $('#summernote').summernote({
        // placeholder: 'Start you Note',
        tabsize: 2,
        height: 400,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>

</body>


</html>