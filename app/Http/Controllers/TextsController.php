<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Users;
use App\Texts;

class TextsController extends Controller
{
    public function index()
    {
        try {
            $arr = Texts::all();
            return response()->json($arr, 200);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getTextsFromUser($userid) {
        try {
            $arr = Texts::where('userid', $userid)->get();
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
            $arr = Texts::updateOrCreate(['id' => $request->id], $request->all());
            return response()->json($request->id, 201);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function storeMultiple(Request $request)
    {
        $num = 0;
        $items = $request->all();
        try {
            foreach ($items as $item) {

                $item['text'] = str_replace('\'', '\\'.'\'', $item['text']);
                /*$item['text'] = str_replace('\"', '\\'.'\"', $item['text']);*/
                //$item['text'] = str_replace('\\', '\\'.'\\', $item['text']);

                $result = DB::insert("INSERT INTO pocr_texts
                    (id, userid, text, date)
                    VALUES ('" . 
                    $item['id'] . "', '" . 
                    $item['userid'] . "', '" . 
                    $item['text'] . "', '" . 
                    $item['date'] . "')
                    ON DUPLICATE KEY UPDATE 
                    userid='" . $item['userid'] . "', 
                    text='" . $item['text'] . "',
                    date='" . $item['date'] . "'");
                if($result) {
                    $num++;
                }
            }
            return response()->json($num, 201);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $arr = Texts::find($id);
        return response()->json($arr, 200);
    }
    
    public function edit($id)
    {
        //
    }
    
    public function update(Request $request, $id)
    {
        $arr = Texts::find($id);
        try {
            $result = $arr->update($request->all());
        } catch (Exception $e) {
            return response()->json(['data' => 'Data not updated'], 400);
        }
    }
    
    public function destroy($id)
    {
        try {
            $result = Texts::destroy($id);
            return response()->json($result, 200);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
