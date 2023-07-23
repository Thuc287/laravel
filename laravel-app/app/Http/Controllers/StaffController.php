<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = $request->id;
        if (isset($request->id)) {
            $sql = "SELECT * FROM staff Where id='$id'";
        } else {
            $sql = "SELECT * FROM staff";
        }
        $Staffs = DB::select("SELECT * FROM staff");
        $total_records = count($Staffs);
        $current_page = isset($page) ? ($page) : 1;
        $limit = 10;
        $total_page = ceil($total_records / $limit);
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } elseif ($current_page < 1) {
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;
        $staffs = DB::select($sql . " LIMIT " . $start . ",$limit");
        return view('Staff/Index', [
            'request' => $request,
            'staffs' => $staffs,
            'total_records' => $total_records,
            'current_page' => $current_page,
            'total_page' => $total_page
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Staff $staff)
    {
        $password = $request->password;
        $name = $request->name;
        $cccd = $request->cccd;
        $limit = $request->limit;
        DB::insert("insert into staff ( name, password, limitt, cccd,rose) values (?,?,?,?,?)", [$name, $password, $limit, $cccd, 0]);
        //    $staff=new Staff;
        //    $staff->name=$request->name;
        //    $staff->password=$request->password;
        //    $staff->name=$request->name;
        //    $staff->cccd=$request->cccd;
        //    $staff->limitt=$request->limit;
        //    $staff->rose=$request->rose;
        //    $staff->save();
        //    Staff::create([
        //     'name'=>$request->name,
        //     'password'=>$request->password,
        //     'cccd'=>$request->cccd,
        //     'limitt'=>$request->limit,
        //     'rose'=>$request->rose,
        //    ]);
        return redirect()->route('staff.index');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $staff = [];
        if ($id != null) {
            $staffs = DB::select("SELECT * FROM staff WHERE id=$id");
            $staff = head($staffs);
        }
        return view('Staff.Update', ['request' => $request, 'staff' => $staff]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $password = $request->password;
        $name = $request->name;
        $limit = $request->limit;
        DB::update("UPDATE staff SET name='$name', password='$password', limitt=$limit WHERE id = $id");
        return redirect()->route('staff.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::delete("Delete From staff WHERE Id =$id");
        Session::flash('alert-info', 'Delete thành công ^^~!!!');
        return redirect()->route('staff.index');
    }
    public function pay(Request $request)
    {
        $id = $request->id;
        $rose = ceil($request->rose);
        if ($rose >= 50) {
            DB::update("UPDATE staff SET limitt = limitt+$rose , rose=0  WHERE id = $id");
            Session::flash('alert-info', 'Pay thành công ^^~!!!');
        } else {
            Session::flash('alert-info', 'Rose min 50 $ ^^~!!!');
        }
        return redirect()->route('staff.index');
    }
}
