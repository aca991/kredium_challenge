<?php

namespace App\Services\Report;

/**
 * @property string $file_name
 * @property string $file_path
 */
interface ExportReportService
{
    /**
     * @param array $reportProducts
     *
     * @return bool
     */
    public function export(array $reportProducts): bool;

    /**
     * @return array
     */
    public function getHeader(): array;

    /**
     * @return string
     */
    public function getFilePath(): string;

    /**
     * @return string
     */
    public function getFileName(): string;
}
