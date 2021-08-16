<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Negara;
use App\Models\State;
use App\Models\Institusi;

class AjaxController extends Controller
{
    public function index()
    {
        $data['negara'] = Negara::get(["Keterangan","Kod_Negara"]);
        return view('index', $data);
    }

    public function getState(Request $request)
    {
        $data['states'] = State::where("Kod_Negara", $request->country_id)->get(["NamaState","Kod_State"]);

        return response()->json($data);
    }

    public function getInstitusi(Request $request)
    {
        $data['institusi'] = Institusi::where("Kod_State", $request->state_id)->get(["NamaInstitusi","Kod_Institusi"]);

        return response()->json($data);
    }
}
