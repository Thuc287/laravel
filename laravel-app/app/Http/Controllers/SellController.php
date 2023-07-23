<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
class SellController extends Controller
{
    public function construct()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        Session::put('buy', 0);
        Session::put('reward', 0);
        Session::put('slreward', 0);
        Session::put('report_Buy', 0);
        Session::put('report_Reward', 0);
        Session::put('reward_slreward', 0);
        $f99 = DB::select('SELECT * FROM F99');
        $resultF99 = last($f99)->result;
        $periodF99 = last($f99)->period;
        $f999 = DB::select('SELECT * FROM f999');
        $resultF999 = last($f999)->result;
        $periodF999 = last($f999)->period;
        Session::put('resultF99', $resultF99);
        Session::put('periodF99', $periodF99);
        Session::put('resultF999', $resultF999);
        Session::put('periodF999', $periodF999);
        return redirect()->route('sell.main');
    }
    public function main(Request $request)
    {
        $action = $request->action;
        $idStaff = Session::get('idStaff');
        $limits = DB::select("SELECT limitt FROM staff WHERE id='$idStaff'");
        $limit = head($limits)->limitt;
        Session::put('limit', $limit);
        $date = date('d/m/Y - H:i:s');
        return view('Sell/Main', ['date' => $date, 'action' => $action]);
    }
    public function create(Request $request, string $game)
    {
        return view('Sell/Buy', ['request' => $request, 'game' => $game]);
    }
    public function store(Request $request, string $game)
    {
        $number = $request->number;
        if ($game == 'f99') {
            $period = Session::get('periodF99') + 1;
        } else {
            $period = Session::get('periodF999') + 1;
        }
        DB::insert("insert into ticket ( game, number, period)
        values (?,?,?)", [$game, $number, $period]);
        $buy = Session::get('buy');
        Session::put('buy', $buy + 1);
       
        return redirect()->route('sell.ticket');
    }
    public function ticket()
    {
        $tickets = DB::select("SELECT * FROM ticket WHERE id=(SELECT MAX(id) FROM ticket)");
        $ticket = last($tickets);
        return view('Sell/Ticket', ['ticket' => $ticket]);
    }
    public function reward()
    {
        return view('Sell.Reward');
    }
    public function check(Request $request)
    {
        $idStaff = Session::get('idStaff');
        $id = $request->id;
        $tickets = DB::select("SELECT * From ticket WHERE id=" . $id);
        $ticket = head($tickets);
        if ($ticket != null) { //lấy kết quả của kì quay;
            if ($ticket->game == 'F99') {
                $period = Session::get('periodF99');
            } else {
                $period = Session::get('periodF999');
            }
            if ($ticket->period > $period) {
                return view('Sell.Alert', ['id' => $id, 'conten' => 'Its not time to shoot yet !']);
            }
            $checks = DB::select("SELECT * From $ticket->game WHERE period=$ticket->period");
            $check = head($checks);
            if ($ticket->number == $check->result) {
                DB::delete("Delete From ticket WHERE Id =" . $id);
                DB::update("UPDATE staff SET limitt = limitt + $check->prize  WHERE id =" . $idStaff);
                Session::put('slreward', (Session::get('slreward')) + 1);
                Session::put('reward', (Session::get('reward')) + $check->prize);
                return view('Sell.Alert', ['id' => $id, 'conten' => 'Vé trúng : ' . $check->prize . ' $']);
            } else {
                return view('Sell.Alert', ['id' => $id, 'conten' => 'No prize !']);
            }
        } else {
            return view('Sell.Alert', ['id' => $id, 'conten' => 'No exit !']);
        }
    }
    public function bill()
    {
        $bill = (Session::get('buy') * 2) - (Session::get('reward'));
        Session::put('report_Buy', (Session::get('report_Buy')) + (Session::get('buy')));
        Session::put('report_slreward', (Session::get('report_slreward')) + (Session::get('slreward')));
        Session::put('report_Reward', (Session::get('report_Reward')) + (Session::get('reward')));
        return view('Sell.Bill', ['bill' => $bill]);
    }
    public function deleteBill()
    {
        Session::put('buy', 0);
        Session::put('reward', 0);
        Session::put('slreward', 0);
        return redirect()->route('sell.main');
    }
    public function showResult(String $game)
    {
        if($game=='f99'){
        $result = DB::select('SELECT * FROM f99');
        }else{
        $result = DB::select('SELECT * FROM f999');
        }
        return view('sell/result', ['result' => $result, 'game' => $game]);
    }
    public function report()
    {
        $rose = Session::get('report_Buy') * 2 * 0.14;
        return view('Sell/Report',['rose'=>$rose]);
    }

    public function showLogout()
    {
        $rose = Session::get('report_Buy') * 2 * 0.14;
        return view('Sell/Logout',['rose'=>$rose]);
    }
    public function logout()
    {
        Session::flush();
        return redirect()->route('index');
    }

}
