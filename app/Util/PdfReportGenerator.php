<?php

namespace App\Util;

use App\Interfaces\ReportGeneratorInterface;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfReportGenerator implements ReportGeneratorInterface
{
    public function downloadReport($order): string
    {
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $dompdf = new Dompdf($options);

        $html = view('reports.pdf', ['orderData' => $order])->render(); // Pasa el objeto $order a la vista

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $filePath = tempnam(sys_get_temp_dir(), 'pdf');
        file_put_contents($filePath, $dompdf->output());

        return $filePath;
    }
}
