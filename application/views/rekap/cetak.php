<?php

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator('Aplikasi Absensi');
$pdf->SetTitle('Rekap Absensi');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}
$pdf->SetFont('times', '', 10);
$pdf->AddPage();
$pdf->setCellPaddings(1, 1, 1, 1);
$pdf->setCellMargins(1, 1, 1, 1);
$pdf->SetFillColor(255, 255, 127);

$title="
<h2>Rekap Absensi Karyawan Tanggal ".$dari." s/d ".$sampai."</h2>
";

$pdf->WriteHTMLCell(0,0,'','',$title,0,1,0,true,'C',true);

$table = '<table  border="1px" style="padding:2px;">';
$table .= '<tr>
				<th style="background-color:#cccccc; width:55%;">Nama Karyawan </th>
				<th style="background-color:#cccccc; width:15%;">Hadir (H) </th>
				<th style="background-color:#cccccc; width:15%;">Ijin (I) </th>
				<th style="background-color:#cccccc; width:15%;">Alfa (A)</th>
            </tr>';
			foreach($rekap->result() as $r){
                $table .='<tr>
                    <td>'.$r->nama.'</td>
                    <td>'.$r->H.'</td>
                    <td>'.$r->I.'</td>
                    <td>'.$r->A.'</td>
                </tr>';
			}
$table .= '</table>';
$pdf->WriteHTMLCell(0,0,'','',$table,0,1,0,true,'C',true);
$pdf->lastPage();
ob_clean();
$pdf->Output("rekap-".date('d-m-Y', time()).".pdf", 'I');

