<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

use App\Jobs\GiftJob;

class UserController extends Controller
{

    protected $userCache = [
        1 => [
            'name' => 'John',
            'city' => 'Barcelona'
        ],
        2 => [
            'name' => 'Joe',
            'city' => 'Paris'
        ]
    ];


    public function index(Request $request)
    {
        return response()->json(['method' => 'index']);
    }

    public function get($id)
    {
//        return response()->json(['method' => 'get', 'id' => $id]);

        return response()->json(
            $this->userCache[$id]
        );
    }

    public function create(Request $request)
    {

        /* ... Code omitted (validate & save data) ... */
        $this->dispatch(new GiftJob());
        /* ... Code omitted ... */

        return response()->json(['method' => 'create']);
    }

    public function update(Request $request, $id)
    {
        return response()->json(['method' => 'update', 'id' => $id]);
    }

    public function delete($id)
    {
        return response()->json(['method' => 'delete', 'id' => $id]);
    }

    public function getCurrentLocation($id)
    {
        return response()->json(['method' => 'getCurrentLocation',
            'id' => $id]);
    }

    public function setCurrentLocation(Request $request, $id,
                                       $latitude, $longitude)
    {
        return response()->json(['method' => 'setCurrentLocation',
            'id' => $id, 'latitude' => $latitude,
            'longitude' => $longitude]);
    }


    public function getWallet($id)
    {
        /* ... Code ommited ... */
        $client = new Client(['verify' => false]);
        try {
            $remoteCall = $client->get(
                'http://microservice_secret_nginx/api/v1/secret/1'
//                'http://this_uri_is_not_going_to_work'
            );
        } catch (ConnectException $e) {
            /* ... Code ommited ... */
            throw $e;
        } catch (ServerException $e) {
            /* ... Code ommited ... */
        } catch (Exception $e) {
            /* ... Code ommited ... */
        }

    }

}