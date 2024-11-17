<?php

namespace App\Services\Report;

use App\DataTransfer\Report\ReportProduct;
use App\Models\CashLoan;
use App\Models\HomeLoan;
use Illuminate\Support\Carbon;

class ReportDataService
{
    const DATE_FORMAT = 'Y-m-d H:i:s';

    /**
     * @return array
     */
    public function generateReportData(): array
    {
        // TODO implement pagination
        $loans = CashLoan::where('user_id', auth()->id())->get();
        $loans = $loans->merge(HomeLoan::where('user_id', auth()->id())->get())->sortByDesc('created_at');

        if ($loans->isEmpty()) {
            return [];
        }

        $reportProducts = [];
        foreach ($loans as $loan) {
            /** @var ReportProduct $reportProduct */
            $reportProduct = app(ReportProduct::class);
            $isCashLoan = isset($loan->amount);
            $reportProduct->setType(($isCashLoan ? 'Cash' : 'Home') . ' loan');
            $productValue = $isCashLoan ? $loan->amount : ($loan->value . ' - ' . $loan->down_payment_amount);
            $reportProduct->setProductValue($productValue);
            $reportProduct->setCreatedAt(Carbon::parse($loan->created_at)->format(self::DATE_FORMAT));
            $reportProducts[] = $reportProduct;
        }

        return $reportProducts;
    }

}
