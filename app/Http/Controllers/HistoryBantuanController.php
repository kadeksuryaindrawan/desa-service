<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HistoryBantuanController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->id;
        $desa = Desa::where('user_id', $user_id)->first();
        if ($desa != null) {
            $id_desa = $desa->id;
        } else {
            $id_desa = 0;
        }
        $response = Http::get('http://127.0.0.1:8001/api/getDataHistory/'.$id_desa);
        $histories = $response->object();
        return view('historybantuan.index', compact('histories'));
    }

    public function detail_data(Request $request)
    {
        $response = Http::get('http://127.0.0.1:8001/api/getDataHistoryDetail/' . $request->history_id);
        $history = $response->object();

        return view('historybantuan.detail', compact('history'));
    }
}
