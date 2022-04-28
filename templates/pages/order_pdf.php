<?php
include "../../php/connect.php";
require('../../php/fpdf.php');

$ref = $_GET['ref'];

$sql = "SELECT * FROM ecom_order, ecom_products WHERE ecom_order.pid=ecom_products.id and refid='$ref'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$refArr = explode('_', $ref);

$date = date("F d, Y", $refArr[0]);


class PDF extends FPDF
{

  function WriteHTML($html)
  {
    // HTML parser
    $html = str_replace("\n", ' ', $html);
    $a = preg_split('/<(.*)>/U', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
    foreach ($a as $i => $e) {
      if ($i % 2 == 0) {
        // Text
        if ($this->HREF)
          $this->PutLink($this->HREF, $e);
        else
          $this->Write(5, $e);
      } else {
        // Tag
        if ($e[0] == '/')
          $this->CloseTag(strtoupper(substr($e, 1)));
        else {
          // Extract attributes
          $a2 = explode(' ', $e);
          $tag = strtoupper(array_shift($a2));
          $attr = array();
          foreach ($a2 as $v) {
            if (preg_match('/([^=]*)=["\']?([^"\']*)/', $v, $a3))
              $attr[strtoupper($a3[1])] = $a3[2];
          }
          $this->OpenTag($tag, $attr);
        }
      }
    }
  }

  function OpenTag($tag, $attr)
  {
    if ($tag == 'B' || $tag == 'I' || $tag == 'U')
      $this->SetStyle($tag, true);
    if ($tag == 'A')
      $this->HREF = $attr['HREF'];
    if ($tag == 'BR')
      $this->Ln(5);
  }

  function CloseTag($tag)
  {
    if ($tag == 'B' || $tag == 'I' || $tag == 'U')
      $this->SetStyle($tag, false);
    if ($tag == 'A')
      $this->HREF = '';
  }

  function SetStyle($tag, $enable)
  {
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach (array('B', 'I', 'U') as $s) {
      if ($this->$s > 0)
        $style .= $s;
    }
    $this->SetFont('', $style);
  }


  function PutLink($URL, $txt)
  {

    $this->SetTextColor(0, 0, 255);
    $this->SetStyle('U', true);
    $this->Write(5, $txt, $URL);
    $this->SetStyle('U', false);
    $this->SetTextColor(0);
  }
}

$pdf = new PDF();
$pdf->AddPage();


$pdf->SetFont('Arial', 'B', 26);
$pdf->MultiCell(0, 60, 'Order Confirmation', 0, 'C');



$pdf->SetFont('Arial', '', 12);
$orderNbr = '<b>Order number: </b>' . $ref;
$pdf->WriteHTML($orderNbr);
$orderDate = '<br><b>Order date: </b>' . $date;
$pdf->WriteHTML($orderDate);
$orderAdr = '<br><b>Customer: </b>' . $row['uname'] . ', ' . $row['address'] . ', ' . $row['zipcode'] . ' ' . $row['city'] . '<br><br><br><br><br>';
$pdf->WriteHTML($orderAdr);


$pdf->SetDrawColor(230, 230, 230);
$pdf->SetFont('Arial', 'B', 13);
$pdf->setFillColor(230, 230, 230);
$startx = 8;
$prW = 80;
$qW = 30;
$pW = 32;
$tpW = 36;
$pdf->Cell($startx, 8, '#', 1, 0, 'C', TRUE);
$pdf->SetX($startx + 11);
$pdf->Cell($prW, 8, 'product', 1, 0, 'C', TRUE);
$pdf->SetX($prW + $startx + 12);
$pdf->Cell($qW, 8, 'quantity', 1, 0, 'C', TRUE);
$pdf->SetX($qW + $prW + $startx + 13);
$pdf->Cell($pW, 8, 'price', 1, 0, 'C', TRUE);
$pdf->SetX($pW + $qW + $prW + $startx + 14);
$pdf->Cell($tpW, 8, 'total price', 1, 1, 'C', TRUE);

$pdf->SetDrawColor(255, 255, 255);
$counter = 1;
if (mysqli_num_rows($result) > 0) {
  do {
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell($startx, 8, $counter++, 1, 0);
    $pdf->SetX($startx + 11);
    $pdf->Cell($prW, 8, $row['name'], 1, 0, 'L');
    $pdf->SetX($prW + $startx + 12);
    $pdf->Cell($qW, 8, $row['qty'], 1, 0, 'C');
    $pdf->SetX($qW + $prW + $startx + 13);
    $pdf->Cell($pW, 8, '$ ' . $row['price'], 1, 0, 'C');
    $pdf->SetX($pW + $qW + $prW + $startx + 14);
    $pdf->Cell($tpW, 8, '$ ' . ($row['price'] * $row['qty']), 1, 1, 'C');
    $totalPrice = $totalPrice + $row['price'] * $row['qty'];
  } while ($row = mysqli_fetch_assoc($result));
}

$pdf->SetFont('Arial', 'B', 13);
$pdf->SetX($pW + $qW + $prW + $startx + 14);
$pdf->setFillColor(230, 230, 230);
$pdf->Cell($tpW, 8, '$ ' . $totalPrice, 1, 1, 'C', TRUE);

$pdf->Output('I', 'order_' . $ref . '.pdf');