<!DOCTYPE html >
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>

</head>
<style>
  .radio-group {
    position: relative;
  }

  /* div :first-child {
    margin-top: 0px;
  } */

  .radio {
    /* display: inline-block; */
    /* width: 100px;
    height: 50px; */
    /* border-radius: 100%; */
    /* background-color: lightblue;
    border: 2px solid lightblue; */
    cursor: pointer;
    /* margin: 2px 0; */
  }

  .radio.selected {
    background-color: #fff;
    color: #2574a9;
    border-color: #2574a9;
  }
</style>
<body>
    <form method="post">
        <input type="date" name="gdate" id="gdate" onchange="<?php echo $_SERVER['PHP_SELF'] ?>"/>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        function makeAjaxRequest(dateval) {
            $.ajax({
                type: "GET",
                data: {dateva: dateval,
                    'id': id,
                    },
                url: "fetchbills.php",
                success: function (data) {
                    $('#showresult').html(data);
                    $('#det').on("click", function () {
                        var no = $(this).val();
                        // makeAjaxRequest2(no);
                    });
                }
            });
        }
        // function makeAjaxRequest2(billno) {
        //     $.ajax({
        //         type: "GET",
        //         data: {bno: billno},
        //         url: "fetchbilldetail.php",
        //         success: function (data) {
        //             $('#showresult').html(data);
        //         }
        //     });
        // }
        $("#gdate").on("change", function () {
            var id = $(this).val();
            makeAjaxRequest(id);

        });
    </script>
    
    <div id="showresult">

    </div>
</body>
</html>