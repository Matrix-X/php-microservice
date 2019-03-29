<?php
/**
 * Created by PhpStorm.
 * User: michaelhu
 * Date: 2019/3/29
 * Time: 11:14 AM
 */

namespace App\Http\Controllers;


use App\Models\Secret;
use App\Transformers\SecretTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

use Illuminate\Http\Request;

class SecretController extends Controller
{

    public function index(
        Manager $fractal,
        SecretTransformer $secretTransformer,
        Request $request)
    {
        $records = Secret::all();
        $collection = new Collection(
            $records,
            $secretTransformer
        );
        $data = $fractal->createData($collection)
            ->toArray();
        return response()->json($data);
    }

    public function get($id)
    {
        $secret = Secret::find($id);

        return response()->json($secret);
    }

    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|unique:secrets,name',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'location_name' => 'required|string'
            ]
        );


        $secret = Secret::create($request->all());
        if ($secret->save() === false) {
            // Manage Error
        }

        return response()->json($secret);
    }
}