<?php
 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
 
class AutoCompleteController extends Controller
{
 
    public function index()
    {
        return view('mailview');
    }
 
    public function search(Request $request)
    {

            $term = $request->get('term');
            
      
            $results = array();
    
            $queries = DB::table('cidades')
                ->join('estados', 'cidades.estado_id', '=', 'estados.id')
                ->where('cidade', 'LIKE', $term.'%')
                ->take(5)->get(array('cidades.cidade', 'estados.uf', 'cidades.id'));

            foreach ($queries as $query)
            {
                $results[] = [ 'value' => $query->cidade."/".$query->uf, 'id' => $query->id  ];
            }
            return response()->json($results);
            
    } 


}