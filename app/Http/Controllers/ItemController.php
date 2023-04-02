<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    public function item()
    {
        $items = Item::latest()->paginate(5);
        $types = Item::TYPES;

        return view('item.item',compact('items','types'));
    }

    public function create()
    {
        $types = Item::TYPES;
        return view('item.create', compact('types'));
       
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'type' => 'required|integer',
            'price' => 'required|integer',
            'datail' => 'required|max:500',

        ]);

        $item = new Item;
        $item->user_id = Auth::id();
        //$item->user_id = 1;//後から上の行と変更する
        $item->name = $request->input(["name"]);
        $item->type = $request->input(["type"]);
        $item->price = $request->input(["price"]);
        $item->datail = $request->input(["datail"]);
   
        $item->save();

        return redirect('/item');
    }

    public function edit(Item $item)
    {
        $types = Item::TYPES;
        return view('item.edit',compact('item','types'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|max:20',
            'type' => 'required|integer',
            'price' => 'required|integer',
            'datail' => 'required|max:500',

        ]);
        $item->user_id = Auth::id();
        //$item->user_id = 1;//後から上の行と変更する
        $item->name = $request->input(["name"]);
        $item->type = $request->input(["type"]);
        $item->price = $request->input(["price"]);
        $item->datail = $request->input(["datail"]);
        $item->status = $request->input(["status"]);
        $item->save();

        return redirect('/item');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.item');
    }

}
