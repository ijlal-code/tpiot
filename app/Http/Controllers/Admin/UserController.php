<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        // Mengecek apakah request datang dari DataTables (AJAX)
        if (request()->ajax()) {
            $query = User::query(); // ambil data  + user

            return DataTables::of($query)

                ->addColumn('action', function ($item) {
                    return '
                    <a href="' . route('users.edit', $item->id) . '" 
                        class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded shadow-lg">
                        Edit
                    </a>
                    <form class="inline-block" action="' . route('users.destroy', $item->id) . '" method="POST" onsubmit="return confirm(\'Yakin hapus data ini?\')">
                        ' . csrf_field() . method_field('delete') . '
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 mx-3 rounded shadow-lg">
                            Hapus
                        </button>
                    </form>
                ';
                })
                ->rawColumns(['action']) // Memberitahu DataTables bahwa kolom 'action' mengandung HTML
                ->make(true);
        }

        return view('admin.user.index');
    }
}