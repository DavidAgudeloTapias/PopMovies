<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use app\Interfaces\ReportGeneratorInterface;
use App\Util\PdfReportGenerator;
use App\Util\ExcelReportGenerator;

class PDFExcelProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ReportGeneratorInterface::class, function () {
            return new PdfReportGenerator();
        });

        $this->app->bind(ReportGeneratorInterface::class, function () {
            return new ExcelReportGenerator();
        });
    }
}
