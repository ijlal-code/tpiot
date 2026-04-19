<?php

namespace App\Http\Controllers\Api;

use App\Events\DeviceSensorUpdated;
use App\Http\Controllers\Controller;
use App\Models\IotDevice;
use Illuminate\Http\Request;

class DeviceApiController extends Controller
{
    public function update(Request $request)
    {
        // Cari perangkat berdasarkan id (ULID)
        $device = IotDevice::findOrFail($request->id);

        // Update data di MySQL (Menimpa data lama)
        $device->update([
            'temperature' => $request->temp,
            'humidity'  => $request->hum,
            'updated_at' => now(),
        ]);

        // Kirim sinyal Realtime
        broadcast(new DeviceSensorUpdated($device));

        return response()->json(['status' => 'Data Updated!']);
    }
}