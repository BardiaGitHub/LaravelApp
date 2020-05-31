<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class UsersController extends Controller
{
    public function index()
    {
        try {
            $arr = Users::all();
            return response()->json($arr, 200);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function create()
    {
        
    }
    
    public function store(Request $request)
    {
        try {
            $arr = Users::create($request->all());
            return response()->json($arr, 201);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function show($id)
    {
        $arr = Users::find($id);
        return response()->json($arr, 200);
    }

    public function showByEmail($email)
    {
        try {
            $arr = Users::where('email', $email)->get();
            return response()->json($arr, 200);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function edit($id)
    {
        //
    }
    
    public function update(Request $request, $id)
    {
        $arr = Users::find($id);
        try {
            $result = $arr->update($request->all());
        } catch (Exception $e) {
            return response()->json(['data' => 'Data not updated'], 400);
        }
    }
    
    public function destroy($id)
    {
        $result = Users::destroy($id);
        if($result === 1) {
            return response()->json($result, 200);
        }
        return response()->json(['data not deleted'], 400);
    }
}

