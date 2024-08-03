<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class DesaController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->id;
        // $response = Http::get('http://127.0.0.1:8000/api/user/' . $user_id);
        // $data = $response->object();
        $desa = Desa::where('user_id',$user_id)->first();
        return view('desa.index',compact('desa'));

    }

    public function update_desa(Request $request,$id)
    {
        $user_id = $id;
        $desa = Desa::where('user_id',$user_id)->first();
        $validator = Validator::make($request->all(), [
            'desa' => ['required', 'string', 'max:255'],
            'telp' => ['required', 'numeric'],
            'alamat' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect('/desa?id=' . $user_id)->withErrors($validator)->withInput();
        }

        try {
            if($desa != null){
                $desa->update([
                    'desa' => $request->desa,
                    'telp' => $request->telp,
                    'alamat' => $request->alamat,
                ]);
            }else{
                Desa::create([
                    'user_id' => $user_id,
                    'desa' => $request->desa,
                    'telp' => $request->telp,
                    'alamat' => $request->alamat,
                ]);
            }

            return redirect('/desa?id=' . $user_id)->with('success', 'Berhasil simpan data desa!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
