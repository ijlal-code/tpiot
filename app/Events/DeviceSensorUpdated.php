<?php

namespace App\Events;

use App\Models\IotDevice;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DeviceSensorUpdated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $device;

    public function __construct(IotDevice $device)
    {
        // Membawa data model perangkat yang sudah diupdate
        $this->device = $device;
    }

    public function broadcastOn(): array
    {
        // Channel unik berdasarkan ID perangkat (ULID)
        return [
            new Channel('device.' . $this->device->id),
        ];
    }

    // Tambahkan ini di dalam class DeviceSensorUpdated
    public function broadcastAs(): string
    {
        return 'sensor.updated';
    }
}