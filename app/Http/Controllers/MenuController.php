<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Create Index
    public function index() {
        $data['menu_data'] = Menu::orderBy('id', 'asc')->paginate(10);
        return view('page.index', $data);
    }

    // Create resource
    public function create() {
        return view('page.create');
    }

    // Save resource
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $menu_data = new Menu;
        $menu_data->name = $request->name;
        $menu_data->price = $request->price;
        $menu_data->save();
        return redirect()->route('menu.index')->with('success', 'Company has been created successfully.');
    }

    //Edit resource
    public function edit($id) {
        $data['menu_data'] = Menu::find($id);
        return view('page.edit', $data);
    }

    //Edit resource
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        $menu_data = Menu::find($id);
        $menu_data->name = $request->name;
        $menu_data->price = $request->price;
        $menu_data->save();
        return redirect()->route('menu.index')->with('success', 'Company has been updated successfully.');
    }

    //Delete resource
    public function destroy(Menu $menu_data,$id) {
        $menu_data = Menu::find($id);
        $menu_data->delete();
        return redirect()->route('menu.index')->with('success', 'Company has been deleted successfully.');
    }

}
