<?php

require_once ('dompdf/autoload.inc.php'); 
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$html = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
th {
	width:60%;
}
#prevname {
    font-size: 70px;
    line-height: 100%;
    font-weight: normal;
    margin: 0;
    text-align: center;
    width: 100%;
    padding: 20px 0;
    letter-spacing: 1px;
}

#prevtext2 {
    font-size: 74%;
}

</style>
		<h1>Lazer Moments - Your Customize Product</h1>

		<table class="table table-bordered">
			<tr>
				<th colspan="2">INFORMATION DETAILS</th>
			</tr>
			<tr>
				<th>Name</th>
				<td>'.$_POST['textname'].'</td>
			</tr>
			<tr>
				<th>Title / Position</th>
				<td>'.$_POST['texttitle'].'</td>
			</tr>
		</table>

		<table class="table table-bordered">
			<tr>
				<th colspan="2">MATERIALS DETAILS</th>
			</tr>
			<tr>
				<th>Material Type</th>
				<td>'.$_POST['materialtypecode'].'</td>
			</tr>
			<tr>
				<th>Shape</th>
				<td>'.$_POST['shape'].'</td>
			</tr>
			<tr>
				<th>Size / Dimension</th>
				<td>'.$_POST['dimension'].'</td>
			</tr>
			<tr>
				<th>Text Color</th>
				<td><p style="width:12px; height:12px; background:'.$_POST['textcolor'].'; display:inline-block;"></p> &nbsp;&nbsp;'.$_POST['textcolor'].'</td>
			</tr>
			<tr>
				<th>Fonts</th>
				<td>'.$_POST['fonts'].'</td>
			</tr>
			<tr>
				<th>Font Size</th>
				<td>'.$_POST['fontsize'].'</td>
			</tr>
			<tr>
				<th>Border Yes/No</th>
				<td>'.$_POST['borderopt'].'</td>
			</tr>
			<tr>
				<th>Adhesive Backing</th>
				<td>'.$_POST['adhesives'].'</td>
			</tr>
			<tr>
				<th>JRS Metal Holders</th>
				<td>'.$_POST['metalholder'].'</td>
			</tr>
			<tr>
				<th>JRS Metal Holder Finish</th>
				<td>'.$_POST['metalholderfinish'].'</td>
			</tr>
		</table>

		<table class="table table-bordered">
			<tr>
				<th colspan="2">ADDITIONAL DETAILS</th>
			</tr>
			<tr>
				<th>Do you allow our experts to check and modify the setup?</th>
				<td>'.$_POST['experts'].'</td>
			</tr>
			<tr>
				<th>Upload and Inquire</th>
				<td>'.$_POST['uploadopt'].'</td>
			</tr>
			<tr>
				<th>Quantity</th>
				<td>'.$_POST['quantity'].'</td>
			</tr>
			<tr>
				<th>Price</th>
				<td>'.$_POST['price'].'</td>
			</tr>
		</table>

		<div style="page-break-before: always;"></div>'		

		.$_POST['previmage'].'';

$dompdf->loadHtml($html);

/* Render the HTML as PDF */
$dompdf->render();

/* Output the generated PDF to Browser */
$dompdf->stream();

$output = $dompdf->output();

/* Output the generated PDF file to pdf folder */
file_put_contents("pdf/pdf_".date('m-d-Y_hisa').".pdf", $output);

?>