<?php

namespace app\Services;

require 'libs/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;

class ExcelService {

	public function exportSaleToExcel($sale, $products)
    {

        $spreedsheet = IOFactory::load($_SERVER["DOCUMENT_ROOT"] .'/excel/templates/ticket.xls');
        $spreedsheet->setActiveSheetIndex(0);

        $spreedsheet->getActiveSheet()->setCellValue('A3', $sale['numero_ticket']);
        $spreedsheet->getActiveSheet()->setCellValue('D2', $sale['fecha_emision']);
        $spreedsheet->getActiveSheet()->setCellValue('D3', $sale['hora_emision']);
        $spreedsheet->getActiveSheet()->setCellValue('D6', $sale['precio_total_base']);
        $spreedsheet->getActiveSheet()->setCellValue('D8', $sale['precio_total_iva']);
        $spreedsheet->getActiveSheet()->setCellValue('D9', $sale['precio_total']);

        for($i = 0; $i < count($products); $i++){
            $spreedsheet->getActiveSheet()->insertNewRowBefore(6 + $i, 1); 
            $spreedsheet->getActiveSheet()->setCellValue('A' . ($i + 6), $products[$i]['nombre']);
            $spreedsheet->getActiveSheet()->setCellValue('B' . ($i + 6), $products[$i]['cantidad']);
            $spreedsheet->getActiveSheet()->setCellValue('B' . ($i + 6), $products[$i]['cantidad']);
            $spreedsheet->getActiveSheet()->setCellValue('C' . ($i + 6), $products[$i]['precio_base']);
            $spreedsheet->getActiveSheet()->setCellValue('D' . ($i + 6), '=B'.($i + 6).'*C'.($i + 6));
        }

        $writer = new Xlsx($spreedsheet);        
        $excel_file = $writer->save($_SERVER["DOCUMENT_ROOT"] . '/excel/tickets/ticket-'.$sale['numero_ticket'].'.xls');

        return $excel_file;
	}

    public function exportExcelToPdf($excel_file, $filename)
    {
        $pdf = new Dompdf($excel_file);
        $pdf_file = $pdf->save($filename.".pdf");

        return $pdf_file;
    }
}

?>