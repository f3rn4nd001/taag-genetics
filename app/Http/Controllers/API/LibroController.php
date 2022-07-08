<?php

namespace App\Http\Controllers\API;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Libro;
Use App\Models\Empreados;
Use Log;

class LibroController extends Controller
{
    public function getAll(){
      $sql=" SELECT lb.id,lb.Autor,lb.Titulo, lb.Edicion,lb.DatosDePublicación,lb.TipoDeContenido,lb.Restricciones,lb.Materia,cp.tNombre AS Proveedor,ce.tNombre,ce.tCalle,ce.tMunicipio FROM libro lb LEFT JOIN catprobedor cp ON cp.eCodProveedor= lb.Proveedor LEFT JOIN catempresas ce ON ce.eCodEmpresa=cp.eCodEmpresa";
      $data = DB::select(DB::raw($sql));
      //  $data = Libro::get();
        return response()->json($data, 200);
      }
      
      public function getempresa(){
        $sql=" SELECT ce.eCodEmpresa AS eCodEmpresa, ce.tNombre AS Empresas FROM catempresas ce ";
        $data = DB::select(DB::raw($sql));
     
        return response()->json($data, 200);
      }
      public function getproveedor(){
        $sql=" SELECT cp.tNombre AS Proveedor, cp.eCodProveedor AS id FROM catprobedor cp ";
        $data = DB::select(DB::raw($sql));
     
        return response()->json($data, 200);
      }
      /*nota intento de procedimiento almacenado 
      
      
       public function getAll(){
        $data = Libro::get();
        return response()->json($data, 200);
      }
      public function create(Request $request){ 
        $exito = 1;
        try {	
          DB::beginTransaction();
    
          $insert = " stpInsertarlibro " .
					" @autor    	= " . $request['Autor'] . 		"," .
					" @titulo   = " . $request['Titulo'] .	",".
					" @edicion  	 	= " . $request['Edicion'] .		",".
					" @datosDePublicacion    	= " . $request['DatosDePublicación']  . 	"," .
					" @tipoDeContenido    	= " . $request['TipoDeContenido']  . 	"," .
					" @restricciones    	= " . $request['Restricciones']  . 	"," .
					" @materia 	= " . $request['Materia']  . "," .
					" @proveedor      = " . $request['Proveedor'] . "," .
					" @tIP              = '" . $_SERVER['REMOTE_ADDR'] . "'";
					$response1 = DB::select("SET NOCOUNT ON;  EXEC " . $insert);
					$eCodLibro    = $response1[0]->Codigo;
          if (!$eCodLibro) {
              $exito = 0;
          }
          if ($exito == 0) {
            DB::rollback();
          } else {
            DB::commit();
          }
        } catch (Exception $e) {
          DB::rollback();
          $exito = $e->getMessage();
        }
       
        return response()->json([
          'codigo' =>  $exito, 
          'message' => "Successfully created",
          'success' => true
      ], 200);

      }
      */
      
      public function createEmpredos(Request $request){ 
        $data['tNombre'] = $request['tNombre'];
        $data['eCodEmpresa'] = $request['eCodEmpresa'];
        Empreados::create($data);
         return response()->json([
             'message' => "Successfully created",
             'success' => true
         ], 200);
     }
      public function create(Request $request){ 
         $data['Autor'] = $request['Autor'];
          $data['Titulo'] = $request['Titulo'];
          $data['Edicion'] = $request['Edicion'];
          $data['DatosDePublicación'] = $request['DatosDePublicación'];
          $data['TipoDeContenido'] = $request['TipoDeContenido'];   
          $data['Restricciones'] = $request['Restricciones'];
          $data['Materia'] = $request['Materia'];
          $data['Proveedor'] = $request['Proveedor'];
          Libro::create($data);
          return response()->json([
              'message' => "Successfully created",
              'success' => true
          ], 200);
      }
  
      public function delete($id){
        $res = Libro::find($id)->delete();
        return response()->json([
            'message' => "Successfully deleted",
            'success' => true
        ], 200);
      }
  
      public function get($id){
        $data = Libro::find($id);
        return response()->json($data, 200);
      }
  
      public function update(Request $request,$id){
        $data['Autor'] = $request['Autor'];
        $data['Titulo'] = $request['Titulo'];
        $data['Edicion'] = $request['Edicion'];
        $data['DatosDePublicación'] = $request['DatosDePublicación'];
        $data['TipoDeContenido'] = $request['TipoDeContenido'];   
        $data['Restricciones'] = $request['Restricciones'];
        $data['Materia'] = $request['Materia'];
        $data['Proveedor'] = $request['Proveedor'];
       Libro::find($id)->update($data);
        return response()->json([
            'message' => "Successfully updated",
            'success' => true
        ], 200);
      }
}
