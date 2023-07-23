<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
  public function ShowLogin_admin(){
    return view('Log_in')->with('role','Admin');
  }
  public function ShowLogin_staff(){
    return view('Log_in')->with('role','Staff');
  }
  public function login_staff(Request $request)
    {
        $staff = DB::table('staff')
        ->where('id', '=', $request->id)
        ->where('password', '=', $request->password)
        ->get();
        if (count($staff) != null ) {
          Session::put('idStaff',$request->id);
            return redirect()->route('sell.construct');
        } else {
          return redirect()->back();
        }
    }
    public function login_admin(Request $request)
    {
        if ($request->id=='999999' && $request->password=='999999') {
            return redirect()->route('result.index');
        } else {
          return redirect()->back();
        }

    }
}
