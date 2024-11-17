<?php

namespace App\Services\Report;

/**
 * @property string $file_path
 */
interface ExportReportService
{
    public function export(array $reportProducts);
}
