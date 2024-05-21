<?php

namespace App\Util;

use App\Interfaces\ReportGeneratorInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelReportGenerator implements ReportGeneratorInterface
{
    public function generate(array $data): string
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Agregar encabezados de la orden
        $sheet->setCellValue('A1', __('app.orders_view.date'));
        $sheet->setCellValue('B1', $data['created_at']);
        $sheet->setCellValue('A2', __('app.orders_view.total'));
        $sheet->setCellValue('B2', $data['total']);

        // Agregar encabezados de los items
        $sheet->setCellValue('A4', __('app.orders_view.item'));
        $sheet->setCellValue('B4', __('app.orders_view.name'));
        $sheet->setCellValue('C4', __('app.orders_view.price'));
        $sheet->setCellValue('D4', __('app.orders_view.quantity'));

        // Agregar datos de los items
        $row = 5;
        foreach ($data['items'] as $item) {
            $sheet->setCellValue('A' . $row, $item['id']);
            $sheet->setCellValue('B' . $row, $item['movie']['title']);
            $sheet->setCellValue('C' . $row, $item['price']);
            $sheet->setCellValue('D' . $row, $item['quantity']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filePath = tempnam(sys_get_temp_dir(), 'xlsx');
        $writer->save($filePath);

        return $filePath;
    }
}
