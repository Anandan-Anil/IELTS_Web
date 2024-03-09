<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Invoice with ribbon - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdeys">
<div class="row">
  <div class="col-sm-12">
	  	<div class="panel panel-default invoice" id="invoice">
		  <div class="panel-body">
			<div class="invoice-ribbon"><div class="ribbon-inner">PAID</div></div>
		    <div class="row">

				<div class="col-sm-6 top-left">
					<i class="fa-solid fa-plane-departure"></i>
				</div>

				<div class="col-sm-6 top-right">
						<h3 class="marginright">INVOICE-1234578</h3>
						<span class="marginright">14 April 2014</span>
			    </div>

			</div>
			<hr>
			<div class="row">

			<b><h2 align="center">Thanku for being a part of edufair</h2></b><br><br>
            <h4>Your ticket has been confirmed .Details are gven below <h4>

			</div>

			<div class="row table-row">
                <?php
                include('php/config.php');   
                //$add="SELECT * FROM `tbl_ticket`";
				$add="SELECT * FROM `tbl_ticket` ORDER BY id DESC LIMIT 1";
                $add_run=mysqli_query($conn,$add);
                ?>
				<table class="table table-striped">
			      <thead>
			        <tr>
			          <th class="text-center" style="width:5%">NO</th>
			          <th class="text-right" style="width:15%">From</th>
			          <th class="text-right" style="width:15%">TO</th>
			          <th class="text-right" style="width:15%">DEPARTING</th>
			          <th class="text-right" style="width:15%">RETURNING</th>
                      <th class="text-right" style="width:15%">ADULTS</th>
			          <th class="text-right" style="width:15%">CHILDREN</th>
                      <th class="text-right" style="width:15%">CLASS</th>
			          <th class="text-right" style="width:15%">AMOUNT</th>
			        </tr>
			      </thead>
			      <tbody>
				  <?php
                            if(mysqli_num_rows($add_run)>0)
                            {
                                while($row=mysqli_fetch_assoc($add_run))
                                {
									?>
			        <tr>
			          <td class="text-center"><?php echo $row['id']?></td>
			          <td class="text-right"><?php echo $row['flyfrom']?></td>
			          <td class="text-right"><?php echo $row['flyto']?></td>
			          <td class="text-right"><?php echo $row['departing']?></td>
			          <td class="text-right"><?php echo $row['returning']?></td>
                      <td class="text-center"><?php echo $row['adults']?></td>
			          <td><?php echo $row['children']?></td>
			          <td class="text-right"><?php echo $row['class']?></td>
			          <td class="text-right">$$$</td>
			          
			        </tr>
					<?php
                                           }
                                        }
                                        else{
                                            echo'no record';
                                        }
                                        ?>
			       
			        
			       </tbody>
			    </table>

			</div>

			<div class="row">
			<div class="col-xs-6 margintop">
				<p class="lead marginbottom">THANK YOU!</p>

				<button class="btn btn-success" id="invoice-print" onclick="window.print();"><i class="fa fa-print"></i> Print Invoice</button>
				<button class="btn btn-danger"><i class="fa fa-envelope-o"></i> Mail Invoice</button>
			</div>
			<div class="col-xs-6 text-right pull-right invoice-total">
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

<style type="text/css">
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
}
</style>

<script type="text/javascript">

</script>
</body>
</html>