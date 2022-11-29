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
	<title>Document</title>
</head>
<body>
<div class="m-5">
<div class="row">
  <div class="col-sm-12">
	  	<div class="panel panel-default invoice" id="invoice">
		  <div class="panel-body">
 <div class="row">
    <div class="col">
	<div class="col-sm-6 top-left">
					<img src="images/logo.jpg" alt="not available" class="img-fluid img-thumbnail w-50">
				</div>

				<div class="col-sm-6 top-right">
						<h3 class="marginright">INVOICE-1234578</h3>
						<span class="marginright">14 April 2014</span>
			    </div>
    </div>
    <div class="col">
	<div class="col-xs-4 from">
					<p class="lead marginbottom">From : DocCare pvt. ltd</p>
					<p>ward,10 abc Road</p>
					<p>Sibsagar,Assam</p>
					
					<p>Phone: 91-767-3600</p>
					<p>Email: doccare11@gmail.com</p>
				</div>

				
    </div>
	<div class="col">
	<div class="col-xs-4 to">
					<p class="lead marginbottom">To : John Doe</p>
					<p>425 Market Street</p>
					<p>Suite 2200, San Francisco</p>
					<p>California, 94105</p>
					<p>Phone: 415-676-3600</p>
					<p>Email: john@doe.com</p>

			    </div>

    </div>
    <div class="col">
   
			    <div class="col-xs-4 text-right payment-details">
					<p class="lead marginbottom payment-info">Payment details</p>
					<p>Date: 14 April 2014</p>
					<p>VAT: DK888-777 </p>
					<p>Total Amount: $1019</p>
					<p>Account Name: Flatter</p>
			    </div>
    </div>
  </div>
			<!-- <div class="invoice-ribbon"><div class="ribbon-inner">PAID</div></div> -->
		    <div class="row">

			

			</div>
			<hr>
			<div class="row">

				

			</div>

			<div class="row table-row">
				<table class="table table-striped">
			      <thead>
			        <tr>
			          <th class="text-center" style="width:5%">#</th>
			          <th style="width:50%">Item</th>
			          <th class="text-right" style="width:15%">Quantity</th>
			          <th class="text-right" style="width:15%">Unit Price</th>
			          <th class="text-right" style="width:15%">Total Price</th>
			        </tr>
			      </thead>
			      <tbody>
			        <tr>
			          <td class="text-center">1</td>
			          <td>Flatter Theme</td>
			          <td class="text-right">10</td>
			          <td class="text-right">$18</td>
			          <td class="text-right">$180</td>
			        </tr>
			        <tr>
			          <td class="text-center">2</td>
			          <td>Flat Icons</td>
			          <td class="text-right">6</td>
			          <td class="text-right">$59</td>
			          <td class="text-right">$254</td>
			        </tr>
			        <!-- <tr>
			          <td class="text-center">3</td>
			          <td>Wordpress version</td>
			          <td class="text-right">4</td>
			          <td class="text-right">$95</td>
			          <td class="text-right">$285</td>
			        </tr>
			         <tr class="last-row">
			          <td class="text-center">4</td>
			          <td>Server Deployment</td>
			          <td class="text-right">1</td>
			          <td class="text-right">$300</td>
			          <td class="text-right">$300</td>
			        </tr> -->
			       </tbody>
			    </table>

			</div>

			<div class="row ">
				<div class="col-lg-10 ">
					<p class="lead marginbottom">THANK YOU!</p>

					<button class="btn btn-success" ><i class="fa fa-print"></i> Print Invoice</button>
					<button class="btn btn-danger"><i class="fa fa-envelope-o"></i> Mail Invoice</button>
				</div>
				<div class="col-lg-2 ">
					  <p>Subtotal : $1019</p>
			          <p>Discount (10%) : $101 </p>
			          <p>VAT (8%) : $73 </p>
			          <p>Total : $991 </p>
				</div>
			</div>

		  </div>
		</div>
	</div>
</div>
</div>


</body>
</html>


<!-- 
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> -->

<!-- 


body{margin-top:20px;
background:#eee;
}

/*Invoice*/
.invoice .top-left {
    font-size:65px;
	color:#3ba0ff;
}

.invoice .top-right {
	text-align:right;
	padding-right:20px;
}

.invoice .table-row {
	margin-left:-15px;
	margin-right:-15px;
	margin-top:25px;
}

.invoice .payment-info {
	font-weight:500;
}

.invoice .table-row .table>thead {
	border-top:1px solid #ddd;
}

.invoice .table-row .table>thead>tr>th {
	border-bottom:none;
}

.invoice .table>tbody>tr>td {
	padding:8px 20px;
}

.invoice .invoice-total {
	margin-right:-10px;
	font-size:16px;
}

.invoice .last-row {
	border-bottom:1px solid #ddd;
}

.invoice-ribbon {
	width:85px;
	height:88px;
	overflow:hidden;
	position:absolute;
	top:-1px;
	right:14px;
}

.ribbon-inner {
	text-align:center;
	-webkit-transform:rotate(45deg);
	-moz-transform:rotate(45deg);
	-ms-transform:rotate(45deg);
	-o-transform:rotate(45deg);
	position:relative;
	padding:7px 0;
	left:-5px;
	top:11px;
	width:120px;
	background-color:#66c591;
	font-size:15px;
	color:#fff;
}

.ribbon-inner:before,.ribbon-inner:after {
	content:"";
	position:absolute;
}

.ribbon-inner:before {
	left:0;
}

.ribbon-inner:after {
	right:0;
}

@media(max-width:575px) {
	.invoice .top-left,.invoice .top-right,.invoice .payment-details {
		text-align:center;
	}

	.invoice .from,.invoice .to,.invoice .payment-details {
		float:none;
		width:100%;
		text-align:center;
		margin-bottom:25px;
	}

	.invoice p.lead,.invoice .from p.lead,.invoice .to p.lead,.invoice .payment-details p.lead {
		font-size:22px;
	}

	.invoice .btn {
		margin-top:10px;
	}
}

@media print {
	.invoice {
		width:900px;
		height:800px;
	}
} -->