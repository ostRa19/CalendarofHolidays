<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Currency;

class CurrencyController extends Controller
{

    public function index()
    {
        $data = Currency::all();
        return response()->json($data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $data = Currency::create($request->all());
        return response()->json([
            'message' => 'Currency Successfully Stored!',
            'data' => $data
        ]);
    }
    public function show(Request $request)
    {
        $data = Currency::where('id', '=', $request->id)->first();
        return response()->json([
            'message' => 'Fetching Currency!',
            'data' => $data
        ]);
    }
    public function update(Request $request, Currency $data)
    {
        $request->validate([
            'title'       => 'nullable',
            'description' => 'nullable'
        ]);
        $data->update($request->all());
        return response()->json([
            'message' => 'Great success! Task updated',
        ]);
    }
    public function destroy(Currency $data)
    {
        $data->delete();
        return response()->json([
            'message' => 'Currency Successfully deleted!'
        ]);
    }
}
