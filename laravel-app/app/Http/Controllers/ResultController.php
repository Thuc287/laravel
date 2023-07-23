<?php
namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $f99 = DB::select('SELECT * FROM f99');
        $f999 = DB::select('SELECT * FROM f999');
        return view('Result/index', ['f99' => $f99, 'f999' => $f999]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $game = $request->game;
        $result = $request->result;
        $prize = $request->prize;
        DB::insert("INSERT INTO $game (result,prize) VALUES ($result ,$prize)");
        return redirect()->route('result.destroy');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $action = $request->action;
        $game = $request->game;
        $period = $request->period;
        $Result = [];
        if ($action == 'update') {
            $result = DB::select("SELECT * FROM $game where period='$period'");
            $Result = head($result);
        }
        return view('Result.Update', ['Result' => $Result, 'request' => $request]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $game = $request->game;
        $result = $request->result;
        $prize = $request->prize;
        $period = $request->period;
        DB::update("UPDATE $game SET  result = $result, prize= $prize WHERE period = '$period'");
        Session::flash('alert-info', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('result.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $f99 = DB::select('SELECT * FROM f99');
        $f999 = DB::select('SELECT * FROM f999');
        if (count($f99) == 8) {
            DB::delete("DELETE FROM f99 WHERE period = (SELECT MIN(period) FROM f99)");
            DB::delete("DELETE FROM ticket WHERE period = (SELECT MIN(period) FROM f99)");
        }
        if (count($f999) == 8) {
            DB::delete("DELETE FROM f999 WHERE period = (SELECT MIN(period) FROM f999)");
            DB::delete("DELETE FROM ticket WHERE period = (SELECT MIN(period) FROM f999)");
        }
        return redirect()->route('result.index');
    }
}
