<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DBQueryController extends Controller
{
    
    public function home(Request $request) {
        $buenosAires = $request->input('BuenosAires');
        $caba = $request->input('Caba');
        $chaco = $request->input('Chaco');
        $cordoba = $request->input('Cordoba');
        $corrientes = $request->input('Corrientes');
        $entreRios = $request->input('EntreRios');
        $formosa = $request->input('Formosa');
        $misiones = $request->input('Misiones');
        $salta = $request->input('Salta');
        $santaFe = $request->input('SantaFe');
        $santiagoDelEstero = $request->input('SantiagoDelEstero');
        $tucuman = $request->input('Tucuman');
        $enfermedad = $request->input('enfermedad');
        
        $vacio;
        
        $variableFalsa = DB::table('events');
        /*if (true == true) {
            $variableFalsa = true;
        }*/

        function globalQueryWithoutUnion($province, $enfLocal) {
            return DB::table('events')
                ->where('province_name', $province)
                ->when($enfLocal != "Ambos", function ($query,$enfLocal) {
                    return $query->where('disease', $enfLocal);
                });
                
        }

        /*function globalQueryWithUnion($province, $enfLocal, $vacioLocal) {
            return DB::table('events')
                ->where('province_name', $province)
                ->where('disease', $enfLocal)
                ->union($vacioLocal);
        }*/

        function returnProvinceTable ($province, $enfermedad) {
            if ($province) {
                $newQuery = globalQueryWithoutUnion($province, $enfermedad);
                return $newQuery;
            }
        }

        $buenosAiresData = returnProvinceTable ($buenosAires, $enfermedad);
        $cabaData = returnProvinceTable($caba, $enfermedad);
        $chacoData = returnProvinceTable($chaco, $enfermedad);
        $cordobaData = returnProvinceTable ($cordoba, $enfermedad);
        $corrientesData = returnProvinceTable($corrientes, $enfermedad);
        $entreRiosData = returnProvinceTable ($entreRios, $enfermedad);
        $formosaData = returnProvinceTable($formosa, $enfermedad);
        $misionesData = returnProvinceTable ($misiones, $enfermedad);
        $saltaData = returnProvinceTable($salta, $enfermedad);
        $santiagoDelEsteroData = returnProvinceTable ($santiagoDelEstero, $enfermedad);
        $tucumanData = returnProvinceTable($tucuman, $enfermedad);

        $vacio = DB::table('events')
            ->where('disease', 'viruela') //Esto es para asegurarnos que el query original está vacío
            ->when($buenosAiresData, function ($query,$buenosAiresData) {
                return $query->union($buenosAiresData);
            })
            ->when($cabaData, function ($query,$cabaData) {
                return $query->union($cabaData);
            })
            ->when($chacoData, function ($query,$chacoData) {
                return $query->union($chacoData);
            })
            ->when($cordobaData, function ($query,$cordobaData) {
                return $query->union($cordobaData);
            })
            ->when($corrientesData, function ($query,$corrientesData) {
                return $query->union($corrientesData);
            })
            ->when($entreRiosData, function ($query,$entreRiosData) {
                return $query->union($entreRiosData);
            })
            ->when($formosaData, function ($query,$formosaData) {
                return $query->union($formosaData);
            })
            ->when($misionesData, function ($query,$misionesData) {
                return $query->union($misionesData);
            })
            ->when($saltaData, function ($query,$saltaData) {
                return $query->union($saltaData);
            })
            ->when($santiagoDelEsteroData, function ($query,$santiagoDelEsteroData) {
                return $query->union($santiagoDelEsteroData);
            })
            ->when($tucumanData, function ($query,$tucumanData) {
                return $query->union($tucumanData);
            });

        /*if ($buenosAires) {
            $newQuery = globalQueryWithoutUnion($buenosAires, $enfermedad);
            $vacio = $newQuery;
        }

        if ($caba) {
            if ($vacio) {
                $newQuery = globalQueryWithUnion($caba, $enfermedad, $vacio, $variableFalsa);
            } else {
                $newQuery = globalQueryWithoutUnion($caba, $enfermedad);
            }
            
            $vacio = $newQuery;
        }

        if ($chaco) {
            if ($vacio) {
                $newQuery = globalQueryWithUnion($chaco, $enfermedad, $vacio);
            } else {
                $newQuery = globalQueryWithoutUnion($chaco, $enfermedad);
            }
            
            $vacio = $newQuery;
        }*/
        
        /*if ($caba) {
            $newQuery = globalQueryWithPossibleUnion($caba, $enfermedad, $vacio);
            $vacio = $newQuery;
        }

        if ($caba) {
            $newQuery = globalQueryWithPossibleUnion($caba, $enfermedad, $vacio);
            $vacio = $newQuery;
        }

        if ($caba) {
            $newQuery = globalQueryWithPossibleUnion($caba, $enfermedad, $vacio);
            $vacio = $newQuery;
        }*/

        

        if ($enfermedad){
            if (!$buenosAires 
                && !$caba 
                && !$chaco 
                && !$cordoba 
                && !$corrientes 
                && !$entreRios 
                && !$formosa
                && !$misiones
                && !$salta
                && !$santaFe 
                && !$santiagoDelEstero 
                && !$tucuman) {
                $events = DB::table('events')
                    ->when($enfermedad != "Ambos", function ($query,$enfermedad) {
                        return $query->where('disease', $enfermedad);
                    })
                    ->get();  
            } else {
                $events = $vacio->get();
            }
        } else if (!$buenosAires 
                && !$caba 
                && !$chaco 
                && !$cordoba 
                && !$corrientes 
                && !$entreRios 
                && !$formosa
                && !$misiones
                && !$salta
                && !$santaFe 
                && !$santiagoDelEstero 
                && !$tucuman) {
                $events = DB::table('events')->get();
        }
        
        

            

        /*$events = DB::table('events')
            ->when($buenosAires, function ($query) {
                $final = DB::table('events')
                    ->where('province_name', 'Buenos Aires')
                    ->union($query);
                return $final;
            })
            ->when($caba, function ($query) {
                $final = DB::table('events')
                    ->where('province_name', 'CABA')
                    ->union($query);
                return $final;
            })
            ->when($chaco, function ($query) {
                $final = DB::table('events')
                    ->where('province_name', 'Chaco')
                    ->union($query);
                return $final;
            })
            ->when($cordoba, function ($query) {
                return DB::table('events')->where('province_name', 'Córdoba');
            })
            ->when($corrientes, function ($query) {
                return DB::table('events')->where('province_name', 'Corrientes');
            })
            ->when($entreRios, function ($query) {
                return DB::table('events')->where('province_name', 'Entre Ríos');
            })
            ->when($formosa, function ($query) {
                return DB::table('events')->where('province_name', 'Formosa');
            })
            ->when($misiones, function ($query) {
                return DB::table('events')->where('province_name', 'Misiones');
            })
            ->when($salta, function ($query) {
                return DB::table('events')->where('province_name', 'Salta');
            })
            ->when($santaFe, function ($query) {
                return DB::table('events')->where('province_name', 'Santa Fe');
            })
            ->when($santiagoDelEstero, function ($query) {
                return DB::table('events')->where('province_name', 'Santiago del Estero');
            })
            ->when($tucuman, function ($query) {
                return DB::table('events')->where('province_name', 'Tucumán');
            })
            ->when($enfermedad, function ($query, $enfermedad) {
                return $query->where('disease', $enfermedad);
                
                    ->when($variableFalsa, function ($query) {
                        return $query->get();
                    });
            })
            ->get();
        */

        return view('baseDeDatos', ['events' => $events, 'quantityEvents'=> count($events)]);//->with("events", $events);
    }

    public function test() {
        $events = DB::table('events')
            ->get();
    }

}
