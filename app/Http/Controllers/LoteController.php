<?php

namespace App\Http\Controllers;

use App\Models\Lotes;
use App\Models\Quadras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoteController extends Controller
{
    //
    public function index(Request $r){
        $quadra = Quadras::find($r->id);

        return view('loteAction', ['quadra'=>$quadra->id, 'empreendimento_id'=>$quadra->empreendimento_id]);
    }

    public function createAction(Request $r){

        $data = [
            'status' => $r->status,
            'comprador' => $r->comprador,
            'vendedor' => Auth::check() ? Auth::user()->email : 'Guest',
            'quadra_id' => $r->quadra,
            'empreendimento_id' => $r->empreendimento,
            'status_date' => today(),
        ];

        $lote = new Lotes($data);

        $lote->save();
        // dd($lote);

        return redirect('/dashboard/empreendimento/'.$r->empreendimento);

    }
    public function updateAction(Request $r) {
        if($r->ajax() || $r->wantsJson()) {
            $data = [
                'status'=>$r['status'],
                'comprador'=>$r['name'],
                'vendedor'=>$r['vendedor'],
                'quadra_id'=>$r['quadra_id'],
                'empreendimento_id'=>$r['empreendimento_id'],
                'status_date' => today()
            ];

            // Find the Lotes model. You might want to use firstOrFail instead of first.
            $lote = Lotes::where('id','=',$r['lote_id'])->first();

            // Check if the model was found before trying to update it
            if ($lote) {
                $lote->update($data);
                return response()->json([
                    'success'=>true,
                    'message'=>'Lotes model was updated',
                    'lote'=>$lote->id,
                    'status'=>$lote->status
                ]);
            } else {
                return response()->json([
                    'success'=>false,
                    'message'=>'Lotes model was not found',
                ], 404);
            }
        }
    }
}
