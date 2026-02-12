<?php

namespace App\Exports;

use App\Models\UrlMetric;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MetricsExport implements FromCollection, WithHeadings
{
    public function __construct(
        protected int $urlId,
        protected string $from,
        protected string $to
    ) {}

    public function collection(): Collection
    {
        $from = Carbon::parse($this->from)->startOfDay();
        $to = Carbon::parse($this->to)->endOfDay();

        return UrlMetric::where('url_id', $this->urlId)
            ->whereBetween('created_at', [$from, $to])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($metric) {
                return [
                    $metric->ip_address,
                    $metric->user_agent,
                    $metric->created_at->format('d-m-Y H:i'),
                ];
            });
    }

    public function headings(): array
    {
        return [
            'IP Address',
            'User Agent',
            'Fecha de Acceso',
        ];
    }
}
