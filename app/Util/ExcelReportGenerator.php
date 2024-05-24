<?php

namespace App\Util;

use App\Interfaces\ReportGeneratorInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelReportGenerator implements ReportGeneratorInterface
{
    public function downloadReport($order): string
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', __('app.orders_view.date'));
        $sheet->setCellValue('B1', $order->getCreatedAt());
        $sheet->setCellValue('A2', __('app.orders_view.total'));
        $sheet->setCellValue('B2', $order->getTotal());

        $sheet->setCellValue('A4', __('app.orders_view.item'));
        $sheet->setCellValue('B4', __('app.orders_view.name'));
        $sheet->setCellValue('C4', __('app.orders_view.price'));
        $sheet->setCellValue('D4', __('app.orders_view.quantity'));

        $row = 5;
        foreach ($order->getItems() as $item) {
            $sheet->setCellValue('A' . $row, $item->getId());
            $sheet->setCellValue('B' . $row, $item->getMovie()->getTitle());
            $sheet->setCellValue('C' . $row, $item->getPrice());
            $sheet->setCellValue('D' . $row, $item->getQuantity());
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filePath = tempnam(sys_get_temp_dir(), 'xlsx');
        $writer->save($filePath);

        return $filePath;
    }
}
