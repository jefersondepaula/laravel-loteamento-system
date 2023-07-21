<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Empreendimentos;
use App\Models\Lotes;
use App\Models\Quadras;

class EmpreendimentoController extends Controller
{
    //
    public function getEmpreendimentos(){
        return Empreendimentos::all();
    }

    public function read(){
        $emprs = $this->getEmpreendimentos();

        return view('empreendimentos', ['empreendimentos' => $emprs]);
    }

    public function readAction(Request $r) {

        return view('empreendimentosAction');
    }
    public function createAction(Request $r) {

        $attr = [
            'name' => $r['name'],
            'quadras' => $r['number'],
        ];

        $empr = new Empreendimentos($attr);
        $empr->save();

        for($i=0; $i<(int)$r['number'];$i++){
            $quadras = new Quadras();
            $quadras->empreendimento_id = (int)$empr->id;
            $quadras->save();
        }

        return $this->read();
    }
    public function findOne(Request $r) {
        $empreeendimento = Empreendimentos::find($r->id);
        $quadras = Quadras::where('empreendimento_id', $r->id)->get();

        foreach ($quadras as $quadra) {
            $quadra->lotes = Lotes::where('quadra_id', $quadra->id)->get();
        }

        return view('empreendimento', ['name'=>$empreeendimento->name, 'empreendimento_id'=>$empreeendimento->id, 'quadras'=>$quadras]);
    }
    public function dashboard(){
        $empr = $this->getEmpreendimentos();

        return view('dashboard', ['empreendimentos'=>$empr]);
    }
}
