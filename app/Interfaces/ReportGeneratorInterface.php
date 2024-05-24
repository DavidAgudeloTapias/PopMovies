<?php

namespace App\Interfaces;

interface ReportGeneratorInterface
{
    public function downloadReport(array $data): string;
}
