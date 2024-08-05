<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\PotensiPermasalahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PotensiPermasalahanController extends Controller
{
    public function getAllData()
    {
        $permasalahans = PotensiPermasalahan::with('desa')->where('status','belum dibantu')->orderBy('created_at','desc')->get();

        if (!$permasalahans) {
            return response()->json(['error' => 'Permasalahan not found'], 404);
        }

        return response()->json($permasalahans);
    }

    public function getData($id)
    {
        $permasalahan = PotensiPermasalahan::with('desa')->where('id',$id)->first();

        if (!$permasalahan) {
            return response()->json(['error' => 'Permasalahan not found'], 404);
        }

        return response()->json($permasalahan);
    }

    public function editStatusSudah($id)
    {
        $permasalahan = PotensiPermasalahan::find($id);

        if (!$permasalahan) {
            return response()->json(['error' => 'Permasalahan not found'], 404);
        }
        
        $permasalahan->update(['status' => 'sudah dibantu']);

        return response()->json(['message' => 'Permasalahan status updated successfully'], 200);
    }

    public function editStatusBelum($id)
    {
        $permasalahan = PotensiPermasalahan::find($id);

        if (!$permasalahan) {
            return response()->json(['error' => 'Permasalahan not found'], 404);
        }
        
        $permasalahan->update(['status' => 'belum dibantu']);

        return response()->json(['message' => 'Permasalahan status updated successfully'], 200);
    }

    public function index(Request $request)
    {
        $user_id = $request->id;
        $desa = Desa::where('user_id',$user_id)->first();
        if($desa != null){
            $id_desa = $desa->id;
        }else{
            $id_desa = 0;
        }
        $permasalahans = PotensiPermasalahan::where('id_desa', $id_desa)->get();
        return view('potensipermasalahan.index', compact('permasalahans','id_desa'));
    }

    public function add_data(Request $request)
    {
        $user_id = $request->id;
        $desa = Desa::where('user_id', $user_id)->first();
        $id_desa = $desa->id;
        return view('potensipermasalahan.add',compact('id_desa'));
    }

    public function add_process(Request $request, $id)
    {
        $user_id = $id;
        $validator = Validator::make($request->all(), [
            'id_desa' => ['required'],
            'potensi' => ['required'],
            'permasalahan' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect('/potensipermasalahan/add?id='.$user_id)->withErrors($validator)->withInput();
        }

        try {
            PotensiPermasalahan::create([
                'id_desa' => $request->id_desa,
                'potensi' => $request->potensi,
                'permasalahan' => $request->permasalahan,
                'status' => 'belum dibantu'
            ]);

            return redirect('/potensipermasalahan/?id=' . $user_id)->with('success', 'Berhasil simpan data potensi dan permasalahan!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit_data(Request $request)
    {
        $permasalahan_id = $request->permasalahan_id;
        $permasalahan = PotensiPermasalahan::find($permasalahan_id);
        return view('potensipermasalahan.edit', compact('permasalahan'));
    }

    public function edit_process(Request $request, $id)
    {
        $user_id = $id;
        $permasalahan = PotensiPermasalahan::find($request->permasalahan_id);
        $validator = Validator::make($request->all(), [
            'potensi' => ['required'],
            'permasalahan' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect('/potensipermasalahan/edit?id=' . $user_id . '&permasalahan_id=' . $request->permasalahan_id)->withErrors($validator)->withInput();
        }

        try {
            $permasalahan->update([
                'potensi' => $request->potensi,
                'permasalahan' => $request->permasalahan,
            ]);

            return redirect('/potensipermasalahan/?id=' . $user_id)->with('success', 'Berhasil edit data potensi dan permasalahan!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete_process(Request $request, $id)
    {
        $user_id = $id;
        $permasalahan = PotensiPermasalahan::find($request->permasalahan_id);
        $permasalahan->delete();
        return redirect('/potensipermasalahan/?id=' . $user_id)->with('success', 'Berhasil hapus data potensi dan permasalahan!');

    }
}
