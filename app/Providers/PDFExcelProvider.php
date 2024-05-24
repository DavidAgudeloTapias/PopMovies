<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ReportGeneratorInterface;
use App\Util\PdfReportGenerator;
use App\Util\ExcelReportGenerator;

class PDFExcelProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ReportGeneratorInterface::class, function ($app, $parameters) {
            if ($parameters['format'] === 'excel') {
                return new ExcelReportGenerator();
            }

            return new PdfReportGenerator();
        });
    }
}
