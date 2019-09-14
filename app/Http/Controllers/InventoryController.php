<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class InventoryController extends Controller
{
    public function show()
    {
        $inventories = Inventory::all();
        View::share('inventories', $inventories);
        return view('menu.inventory');
    }

    public function create(Request $request)
    {
        $inventories = new Inventory();
        $inventories->package_name = $request->package_name;
        $inventories->package_count = $request->package_count;
        $inventories->storage_for_package = $request->storage_for_package;

        $inventories->save();
        return redirect()->route('show_inventory');
    }
    public function edit(Request $request, $id)
    {
        $inventories =Inventory::find($id);
        $inventories->package_name = $request->package_name;
        $inventories->package_count = $request->package_count;
        $inventories->storage_for_package = $request->storage_for_package;

        $inventories->save();
        return redirect()->route('show_inventory');
    }
}
