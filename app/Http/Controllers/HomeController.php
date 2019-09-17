<?php

namespace App\Http\Controllers;

use App\Faults;
use App\Staff;
use App\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $staff = Staff::all();
        $inventory = Inventory::all();
        $fault = Faults::sum('fault_amount');

        $toplam_alan = 0;
        $toplam_urun = 0;
        $result = 0;
        foreach ($inventory as $item) {
            $toplam_alan += $item->storage_for_package;
            $toplam_urun += $item->package_count;
        }
        $result =(int)($toplam_urun/$toplam_alan*100);
        View::share('fault', $fault);
        View::share('result', $result);
        View::share('inventory', $inventory);
        View::share('staff', $staff);

       ;
        return view('home');
    }

}
