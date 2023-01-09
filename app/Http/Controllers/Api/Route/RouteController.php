<?php

namespace App\Http\Controllers\Api\Route;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $route = new Route;

            $route->name = $request->name;
            $route->from = $request->from;
            $route->to = $request->to;
            $route->range = $request->range;

            $route->save();
            DB::commit();

            return response()->json([
                'message' => 'The route was added successfuly',
                'route' => $route
            ]);

        }catch(\Exception $e){
            logger('Error in RouteController.store', [$e->getMessage()]);
            return response()->json([
                'message' => 'Something went wrong saving the route',
            ],400);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function show(Route $route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function edit(Route $route)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Route $route)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        try{

            $route->delete();
            return response()->json([
                'message'=> 'Route delete successfuly'
            ]);

        }catch(\Exception $e){
            logger('Error in RouteController.store', [$e->getMessage()]);
            return response()->json([
                'message'=> 'Something went wrong deleting thr saved route'
            ], 400);
        }
    }
}
