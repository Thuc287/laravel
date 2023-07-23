<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $game = $request->game;
        $period = $request->period;
        $page = $request->page;
        if ($game == 'all') {
            return redirect()->route('ticket.index');
        }
        if (isset($game) && !isset($period) || $period=='all') {
            $sql = "Select * From ticket WHERE game='$game'";
        } elseif (isset($period)) {
            $sql = "Select * FROM ticket where game='$game' AND period='$period'";
        } else {
            $sql = "SELECT * FROM ticket";
        }
        $periods=array();
        if(isset($request->game)){
        $periods = DB::select("SELECT period FROM $game");
        }
        $ticket = DB::select($sql);
        $total_records = count($ticket);
        $current_page = isset($page) ? ($page) : 1;
        $limit = 10;
        $total_page = ceil($total_records / $limit);
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } elseif ($current_page < 1) {
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;
        if (count($ticket) != null) {
            $tickets = DB::select($sql . " LIMIT " . $start . ",$limit");
            return view('Ticket/index', [
                'request'=>$request,
                'tickets' => $tickets,
                'period' => $periods,
                'total_records' => $total_records,
                'current_page' => $current_page,
                'total_page' => $total_page
            ]);
        } else {
            return view('Ticket/index', [
                'request'=>$request,
                'tickets' => $ticket,
                'period' => $periods,
                'total_records' => $total_records,
                'current_page' => $current_page,
                'total_page' => $total_page
            ]);

        }
    }

    public function destroy(string $id)
    {
        //
    }
}
