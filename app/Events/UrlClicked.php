<?php

namespace App\Events;

use App\Models\UrlMetric;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UrlClicked implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public int $urlId;

    public int $totalClicks;

    public array $metric;

    public function __construct(int $urlId, UrlMetric $metric, int $totalClicks)
    {
        $this->urlId = $urlId;
        $this->totalClicks = $totalClicks;
        $this->metric = [
            'ip_address' => $metric->ip_address,
            'user_agent' => $metric->user_agent,
            'created_at' => $metric->created_at->toIso8601String(),
            'created_at_formatted' => $metric->created_at->format('d/m/Y H:i'),
        ];
    }

    public function broadcastOn(): Channel
    {
        return new Channel('url-metrics.'.$this->urlId);
    }

    public function broadcastAs(): string
    {
        return 'UrlClicked';
    }

    public function broadcastWith(): array
    {
        return [
            'metric' => $this->metric,
            'total_clicks' => $this->totalClicks,
        ];
    }
}
