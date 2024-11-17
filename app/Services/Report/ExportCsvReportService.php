<?php

namespace App\Services\Report;

class ExportCsvReportService implements ExportReportService
{
    private string $file_path;
    public function __construct()
    {
        $this->file_path = public_path('reports');
    }

    public function export(array $reportProducts)
    {
        // TODO: Implement export() method.
    }
}
