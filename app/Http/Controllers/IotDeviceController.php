<?php

namespace App\Http\Controllers;

use App\Http\Requests\IotDeviceStoreRequest;
use App\Models\IotDevice;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class IotDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = IotDevice::query();

            return DataTables::of($query)
                ->addColumn('user.id', function ($item) {
                    return $item->user ? $item->user->id : '-';
                })
                ->addColumn('user.name', function ($item) {
                    return $item->user ? $item->user->name : '-';
                })
                ->addColumn('is_active', function ($item) {
                    if ($item->is_active == 1) {
                        return '<span class="bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded">
                        Aktif
                    </span>';
                    } else {
                        return '<span class="bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">
                        Tidak Aktif
                    </span>';
                    }
                })
                ->addColumn('action', function ($item) {
                    return '
                    <a href="' . route('iot-devices.show', $item->id) . '" 
                        class="inline-block bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-1 px-2 rounded shadow-lg">
                        Detail
                    </a>
                    <a href="' . route('iot-devices.edit', $item->id) . '" 
                        class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded shadow-lg">
                        Edit
                    </a>
                    <form class="inline-block" action="' . route('iot-devices.destroy', $item->id) . '" method="POST" onsubmit="return confirm(\'Yakin hapus data ini?\')">
                        ' . csrf_field() . method_field('delete') . '
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 mx-3 rounded shadow-lg">
                            Hapus
                        </button>
                    </form>
                ';
                })
                ->rawColumns(['action', 'is_active'])
                ->make(true);
        }

        return view('admin.iot-device.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::role('user')->pluck('name', 'id');

        return view('admin.iot-device.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IotDeviceStoreRequest $request)
    {
        $data = $request->validated();

        IotDevice::create($data);

        return redirect()->route('iot-devices.index')->with('success', 'Perangkat IoT berhasil ditambahkan.');
    }
}