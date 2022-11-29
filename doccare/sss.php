<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="vendors/jquery-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>


hr {
    color: #0000004f;
    margin-top: 5px;
    margin-bottom: 5px
}

.add td {
    color: #c5c4c4;
    text-transform: uppercase;
    font-size: 12px
}

.content {
    font-size: 14px
}
    </style>
</head>
<body>
<div class="container mt-5 mb-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="d-flex flex-row p-2"> <img src="https://i.imgur.com/vzlPPh3.png" width="48">
                    <div class="d-flex flex-column"> <span class="font-weight-bold">Tax Invoice</span> <small>INV-001</small> </div>
                </div>
                <hr>
                <div class="table-responsive p-2">
                    <!-- <table class="table table-borderless">
                        <tbody>
                            <tr class="add">
                                <td>To</td>
                                <td>From</td>
                            </tr>
                            <tr class="content">
                                <td class="font-weight-bold">Google <br>Attn: John Smith Pymont <br>Australia</td>
                                <td class="font-weight-bold">Facebook <br> Attn: John Right Polymont <br> USA</td>
                            </tr>
                        </tbody>
                    </table> -->
                </div>
                <hr>
                <div class="products p-2">
                    <table class="table table-borderless"  id="myTable">
                        <tbody>
                            <tr class="add">
                                <td>Medicine name</td>
                                <td>Dosage</td>
                                <td>Time</td>
                                <td>when to take</td>
                                <td>Duration</td>
                                
                            </tr>
                        
                            <?php 
if (isset($_POST['medicine_name_txt']))
{      
    include 'conne.php';
    foreach($_POST['medicine_name_txt'] as $row => $value){          
                $medicine=$_POST['medicine_name_txt'][$row];
                $dosage=$_POST['dosage'][$row];
                $time=$_POST['time'][$row];         
                $when=$_POST['when'][$row];
                $duration=$_POST['duration'][$row];

    $sql = "INSERT INTO `prescription`(  `medicine_name`, `duration`, `dosage`, `time_for_medicine`)
                VALUES ('$value','','','')";
// print_r($sql);
        if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

?>


                            <form action="" method="post">
                            <tr class="content">
                                    <td><input type="text" name="medicine_name_txt[]" /></td>
                                    <td><input type="text" name="dosage[]" /></td>
                                    <td><input type="date" name="time[]" /></td>
                                    <td><input type="text" name="when[]" /></td>
                                    <td><input type="text" name="duration[]" /></td>
                            </tr>
                            
                            
                            <tr>
                                <td>&nbsp;</td>
                                <td><input type="submit" name="submit" value="add" />
                                <input type="reset" name="submt" value="clear" /></td>
                            </tr>
                            
                            
                        </tbody>
                        <div class="set-form">
                        <input type="button" id="more_fields" onclick="add_fields();" value="Add More" class="btn btn-info" />
                          </div>
                          </form>
                          <script>


                function add_fields() {    
                document.getElementById("myTable").insertRow(1).innerHTML = '<tr class="content"><td><input type="text"  name="medicine_name_txt[]" /></td><td><input type="text" name="dosage[]" /></td><td><input type="date" name="time[]" /></td><td><input type="text" name="when[]" /></td><td><input type="text" name="duration[]" /></td></tr>';
                }
</script>
</table>

                  
                </div>
                <hr>
                <div class="products p-2">
                    <!-- <table class="table table-borderless">
                        <tbody>
                            <tr class="add">
                                <td></td>
                                <td>Subtotal</td>
                                <td>GST(10%)</td>
                                <td class="text-center">Total</td>
                            </tr>
                            <tr class="content">
                                <td></td>
                                <td>$40,000</td>
                                <td>2,500</td>
                                <td class="text-center">$42,500</td>
                            </tr>
                        </tbody>
                    </table> -->
                </div>
                <hr>
                <div class="address p-2">
                    <!-- <table class="table table-borderless">
                        <tbody>
                            <tr class="add">
                                <td>Bank Details</td>
                            </tr>
                            <tr class="content">
                                <td> Bank Name : ADS BANK <br> Swift Code : ADS1234Q <br> Account Holder : Jelly Pepper <br> Account Number : 5454542WQR <br> </td>
                            </tr>
                        </tbody>
                    </table>
                   -->




                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
