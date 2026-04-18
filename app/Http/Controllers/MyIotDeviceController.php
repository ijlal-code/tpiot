<?php

namespace App\Http\Controllers;

use App\Models\IotDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyIotDeviceController extends Controller
{
    /**
     * Menampilkan daftar perangkat milik user yang sedang login.
     */
    public function index()
    {
        // Mengambil hanya ID perangkat milik user aktif
        $myDevices = IotDevice::where('user_id', Auth::id())
            ->latest()
            ->pluck('id');

        return view('user.my-device.index', compact('myDevices'));
    }

    /**
     * Menampilkan detail perangkat tertentu.
     */
    public function show(IotDevice $my_iot_device)
    {
        // Proteksi: Pastikan perangkat ini memang milik user yang login
        if ($my_iot_device->user_id !== Auth::id()) {
            abort(403, 'Aksi tidak diizinkan.');
        }

        return view('user.my-device.show', compact('my_iot_device'));
    }
}