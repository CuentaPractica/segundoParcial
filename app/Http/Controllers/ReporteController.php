<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalle_compra;
use App\Models\Compra;
use DB;
Use Carbon\Carbon;
use Auth;

class ReporteController extends Controller
{
    public function productos()
    {
        $this->addCountVisit();
        $repuestos=Detalle_compra::groupBy('idRepuesto')->select('idRepuesto',DB::raw('sum(cantidad) as cantidad'))
                                                        ->orderBy('cantidad','desc')->take(5)->get();

        $nombres=[];
        $cantidades=[];

        foreach($repuestos as $repuesto)
        {
            array_push($nombres,$repuesto->repuestos->nombre);
            array_push($cantidades,$repuesto->cantidad);
        }
        return view('reporte.repuestosVendidosGrafico')->with('data1',json_encode($cantidades))->with('labels1',json_encode($nombres));
    }

    public function ventasActuales()
    {
        $this->addCountVisit();
        $fecha = Carbon :: now ();
        $ventasE=Compra::whereDate('created_at',$fecha)
                         ->join('pagos','compras.idPago','=', 'pagos.id')->where('pagos.tipoPago','Efectivo')->paginate(5);
        $SumaE=Compra::whereDate('created_at',$fecha)
                     ->join('pagos','compras.idPago','=', 'pagos.id')->where('pagos.tipoPago','Efectivo')->sum('montoTotal');
        $ventasT=Compra::whereDate('created_at',$fecha)
                    ->join('pagos','compras.idPago','=', 'pagos.id')->where('pagos.tipoPago','Transferencia')->paginate(5);
        $SumaT=Compra::whereDate('created_at',$fecha)
                    ->join('pagos','compras.idPago','=', 'pagos.id')->where('pagos.tipoPago','Transferencia')->sum('montoTotal');
        
        return view('reporte.ventasActuales',['ventasE'=>$ventasE,'SumaE'=>$SumaE],['ventasT'=>$ventasT,'SumaT'=>$SumaT]);
    }

    public function ventasG(){
        $this->addCountVisit();
        $montlyCounts=Compra::select(
            DB::raw('EXTRACT(MONTH FROM created_at) AS month'), 
            DB::raw('COUNT(1) as cantidad'))
         ->groupBy('month')->get()->toArray();
      
        $counts=array_fill(0,12,0); // inicio, fin y valores que quiero setear al array
    
        foreach($montlyCounts as $montlyCount){
            $index=$montlyCount['month']-1;
            $counts[$index]= (int)$montlyCount['cantidad']; 
        }
     
        $counts = json_encode($counts);
        return view('reporte.ventasG',compact('counts'));

    }
    private function addCountVisit(){
        Auth::user()->countPage(8);
    }
}
