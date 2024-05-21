<?php

namespace App\Util;

use App\Interfaces\ReportGeneratorInterface;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfReportGenerator implements ReportGeneratorInterface
{
    public function generate(array $data): string
    {
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $dompdf = new Dompdf($options);

        $html = view('reports.pdf', compact('data'))->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $filePath = tempnam(sys_get_temp_dir(), 'pdf');
        file_put_contents($filePath, $dompdf->output());

        return $filePath;
    }
}
