<?php
function getClient($id){
  global $pdo;
    $sql = "SELECT * FROM clients WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'id' => $id,
            ]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
function categoryName($id){
  global $pdo;
    $sql = "SELECT name FROM category WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'id' => $id,
            ]);
    return $stmt->fetch(PDO::FETCH_ASSOC)['name'];
  }
  function customerDetails($id){
    global $pdo;
      $sql = "SELECT * FROM clients WHERE id=:id";
              $stmt = $pdo->prepare($sql);
              $stmt->execute([
                  'id' => $id,
              ]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function getTotal($id){
      global $pdo;
        $sql = "SELECT a.quantity*b.price as total FROM cart a 
          JOIN product b on (a.productId=b.ID)
          WHERE orderId=:id
        ";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    'id' => $id,
                ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
      }
  function checkData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function getCategories(){

  global $pdo;
  $sql = "SELECT * FROM category";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

function getProductId($id){
  global $pdo;
  $sql = " SELECT * FROM product WHERE id=:id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
  "id" => $id,
  ]);
$row=$stmt->fetch(PDO::FETCH_ASSOC);
  return $row;
}
function sendFacture(){

  require ('../pdf/fpdf.php');
  include '../send.php';
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
/*output the result*/
/*set font to arial, bold, 14pt*/
$pdf->SetFont('Arial','B',20);
/*Cell(width , height , text , border , end line , [align] )*/
$pdf->Cell(71 ,10,'',0,0);
$pdf->Cell(59 ,5,'Facture',0,0);
$pdf->Cell(59 ,10,'',0,1);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(71 ,5,'CoolFood',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->Cell(59 ,5,'Details',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(130 ,5,'Cornich Bizerte',0,0);
$pdf->Cell(25 ,5,'Customer ID:',0,0);
$pdf->Cell(34 ,5,$_SESSION['id'],0,1);
$pdf->Cell(130 ,5,'Bizerte,7005',0,0);
$pdf->Cell(25 ,5,'Facture Date:',0,0);
$pdf->Cell(34 ,5,date("Y/m/d"),0,1);
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Facture No:',0,0);
$pdf->Cell(34 ,5,'NUMERO FACTURE',0,1);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(130 ,5,'Bill To',0,0);
$pdf->Cell(59 ,5,$_SESSION['user'],0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(50 ,10,'',0,1);
$pdf->SetFont('Arial','B',10);
/*Heading Of the table*/
$pdf->Cell(10 ,6,'Sl',1,0,'C');
$pdf->Cell(80 ,6,'Description',1,0,'C');
$pdf->Cell(23 ,6,'Qty',1,0,'C');
$pdf->Cell(30 ,6,'Unit Price',1,0,'C');
$pdf->Cell(20 ,6,'Sales Tax',1,0,'C');
$pdf->Cell(25 ,6,'Total',1,1,'C');/*end of line*/
/*Heading Of the table end*/
$pdf->SetFont('Arial','',10);
    $i=1;
    $total=0;
foreach ($_SESSION['mycart'] as $row=>$value) {
    $r=getProductId($row);
    $name=$r['name'];
    $price=$r['price'];
    $qte=$value;
    $tot=$qte*$price;
    $total+=$tot;
    $pdf->Cell(10 ,6,$i,1,0);
    $pdf->Cell(80 ,6,$name,1,0);
    $pdf->Cell(23 ,6,$qte,1,0,'R');
    $pdf->Cell(30 ,6,$price,1,0,'R');
    $pdf->Cell(20 ,6,'0.00',1,0,'R');
    $pdf->Cell(25 ,6,$tot,1,1,'R');
    $i++;
        
    }	

$pdf->Cell(118 ,6,'',0,0);
$pdf->Cell(25 ,6,'Subtotal',0,0);
$pdf->Cell(45 ,6,$total,1,1,'R');


$pdf->Output("/opt/lampp/htdocs/poofood/home/facture/".$_SESSION['user'].".pdf","F");
return sendmail("CoolFood",$_SESSION['mail'],"Facture","Si dessous vou trouvez la facture",$_SESSION['user'].".pdf");


}
?>