<?php
    
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;
use App\Models\Title;
use App\Transformers\TitleTransformer;

class TitleController extends Controller{

    public function index(){
        $title = Title::filter($request)->paginate($request->get('per_page', 20));

        $fractal = fractal($title, new UserTransformer())->toArray();

        return response()->json($fractal, Response::HTTP_CREATED);
    }

    public function index_id($id){
        $data = Title::findOrFail($id);
        
        $fractal = fractal($title, new TitleTransformer())->toArray();
    
        return response()->json($fractak, Response::HTTP_OK);
    }

    public function store(Request $request){
        $attrs= $request->all();
        $title = new Title($attrs);

        if (!$title->isValidFor('CREATE')) {
            throw new ValidationException($title->validator());
        }

        $user->save();

        $fractal = fractal($title, new TitleTransformer())->toArray();
   
        return response()->json($fractal, Response::HTTP_OK);
    }

    public function update(Request $request, $id){
        $attrs    = []
        $title = Title::findOrFail($id);
        $title->fill($attrs);

        if (!$title->isValidFor('UPDATE')) {
            throw new ValidationException($title->validator());
        }

        $changes = title->getDirty();
        title->save();

        $fractal = fractal($title, new TitleTransformer())->toArray();
    
        return response()->json($fractal, Response::HTTP_OK);
    }

    public function destroy($id){
        $title = Title::findOrFail($id);

        $fractal = (bool) $title->delete();

        return response()->json($fractal, Response::HTTP_OK);
    }
    
    /**
     * Create by LeeNuksID :D
     * Thanks For Using Laragen
     */
}