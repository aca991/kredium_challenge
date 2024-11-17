<?php

namespace App\Services\Report;

use App\DataTransfer\Report\ReportProduct;

class ExportCsvReportService implements ExportReportService
{
    private string $file_name;
    private string $file_path;

    public function __construct()
    {
        $this->file_name = 'export-' . auth()->id() . '-' . time() . '.csv';
        $this->file_path = public_path('reports/' . $this->file_name);
    }

    /**
     * @param ReportProduct[] $reportProducts
     *
     * @return bool
     */
    public function export(array $reportProducts): bool
    {
        // TODO improve report generation by moving it to async job
        // Generate file in chunks (fetch data in chunks accordingly)
        // Send report to advisor's email
        // Remove report file after it is sent
        try {
            $fileHandle = fopen($this->file_path, 'w');
            fputcsv($fileHandle, $this->getHeader());
            foreach ($reportProducts as $reportProduct) {
                fputcsv($fileHandle, $reportProduct->toArray());
            }
            fclose($fileHandle);

            return true;
        } catch (\Exception $e) {
            // TODO log error
        }

        return false;
    }

    /**
     * @return string[]
     */
    public function getHeader(): array
    {
        return ['Product type', 'Product value', 'Creation date'];
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->file_path;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->file_name;
    }
}
