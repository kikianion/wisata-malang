<?
require('fpdf/fpdf.php');
require_once ("../tool.php");

class PDF extends FPDF
{
var $nama;
var $alamat;
var $tiket;
var $keterangan;
var $foto;
var $telpon;

function getDataObjekWisata(){
//include_once 'config.php';
include_once 'koneksi.php';
$id=$_GET[id];
$sql="select * from wisata where id=$id";
$query=mysql_query($sql);
if($query!=null){
$row=mysql_fetch_array($query);
$this->nama=$row[nama];
$this->alamat=$row[alamat];
$this->tiket=$row[tiket];
$this->keterangan=$row[keterangan];
}
}
function getDataPenginapan(){
//include_once 'config.php';
include_once 'koneksi.php';
$id=$_GET[id];
$sql="select * from penginapan where id=$id";
$query=mysql_query($sql);
if($query!=null){
$row=mysql_fetch_array($query);
$this->nama=$row[nama];
$this->alamat=$row[alamat];
$this->telpon=$row[telpon];
$this->keterangan=$row[keterangan];
}
}
function Header()
{
    //Logo
    //$this->Image('picture/logo.jpg',5,5,7);
    //Arial bold 15
    $this->SetFont('Arial','B',10);
	$this->SetX(7);
	$this->SetY(7);

    $this->Ln(7);
}

//Page footer
function Footer()
{
    //Position at 1.5 cm from bottom
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Instanciation of inherited class
$pdf=new PDF();
$pdf->open();
$pdf->AddPage();
$mod=$_GET['module'];
if($mod=="detail_wisata"){
$pdf->getDataObjekWisata();
$pdf->SetLeftMargin(15);
$pdf->SetRightMargin(15);
$pdf->setFont('Arial','B',11);
$pdf->Cell(0,5,$pdf->nama,0,1);
$pdf->setFont('Arial','',7);
$pdf->Cell(0,5,"Alamat: ".$pdf->alamat,0,1);
$pdf->Cell(0,5,"Tiket: ".$pdf->tiket,0,1);
$pdf->Ln();
$pdf->setFont('Arial','',7);
$pdf->MultiCell(0,5,$pdf->keterangan,0,1);
$pdf->Ln();
//----
$path="../../data/foto wisata/".$pdf->nama;
if ($handle = opendir("$path")) {
    /* This is the correct way to loop over the directory. */
	$x=10;$y=130;$index=0;
	$pdf->setFont('Arial','B',11);
	$pdf->Cell(0,5,"Wahana Dalam Foto",0,1);
	$pdf->setFont('Arial','',7);
    while (false !== ($file = readdir($handle))) {
		$m=mysql_fetch_array(mysql_query("select * from keteranganfoto where file='$file'"));
		
	if($file==".." || $file=="." || $file=="Thumbs.db")continue;
        $pdf->Image("$path/$file",$x,$y,50);
		
		$pdf->Cell(0,5,"Wahana: ".$m['wahana'],$x,$y);
		$pdf->MultiCell(0,5,$m['keterangan'],0,1);
		if($index!=3)
		$x+=70;
		else
		$y+=60;
		if($index==3){$index=-1;$x=10;}
		$index++;
    }
	
    closedir($handle);
}
//----
}else if($mod=="detail_penginapan"){
$pdf->getDataPenginapan();
$pdf->SetLeftMargin(15);
$pdf->SetRightMargin(15);
$pdf->setFont('Arial','B',11);
$pdf->Cell(0,5,$pdf->nama,0,1);
$pdf->setFont('Arial','',7);
$pdf->Cell(0,5,"Alamat: ".$pdf->alamat,0,1);
$pdf->Cell(0,5,"Telepon: ".$pdf->telpon,0,1);
$pdf->Ln();
$pdf->setFont('Arial','',11);
$pdf->MultiCell(0,5,$pdf->keterangan,0,1);
}
$pdf->AliasNbPages();
$pdf->Output();
?>