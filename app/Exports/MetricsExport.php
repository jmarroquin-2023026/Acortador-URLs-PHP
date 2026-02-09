<?php

namespace App\Exports;

use App\Models\UrlMetric;
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
        return UrlMetric::where('url_id', $this->urlId)
            ->whereBetween('created_at', [$this->from, $this->to])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($metric) {
                return [
                    $metric->ip_address,
                    $metric->user_agent,
                    $metric->created_at->format('d-m-y H:i'),
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
