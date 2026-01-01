<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityHelper;
use App\Helpers\ErrorHelper;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $query = Item::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('sku', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        $items = $query->latest()->paginate(10);

        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:100|unique:items,sku',
            'description' => 'nullable|string|max:500',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'active' => 'nullable|boolean',
        ]);

        DB::beginTransaction();

        try {
            $item = Item::create([
                'name' => $request->name,
                'sku' => $request->sku,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'active' => $request->active ?? 1,
            ]);

            DB::commit();

            ActivityHelper::log('CREATE', 'ITEM', $item->id, 'Item created successfully');

            return redirect()->route('items.index')
                ->with('success', 'Item created successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            ErrorHelper::log('ITEM_CREATE', $e);

            return back()->withInput()
                ->withErrors(['error' => 'An error occurred while saving the item.']);
        }
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:100|unique:items,sku,' . $item->id,
            'description' => 'nullable|string|max:500',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'active' => 'nullable|boolean',
        ]);

        DB::beginTransaction();

        try {
            $item->update([
                'name' => $request->name,
                'sku' => $request->sku,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'active' => $request->active ?? 1,
            ]);

            DB::commit();

            ActivityHelper::log('UPDATE', 'ITEM', $item->id, 'Item updated successfully');

            return redirect()->route('items.index')
                ->with('success', 'Item updated successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            ErrorHelper::log('ITEM_UPDATE', $e);

            return back()->withInput()
                ->withErrors(['error' => 'An error occurred while updating the item.']);
        }
    }

    public function destroy(Item $item)
    {
        try {
            $item->delete();
            ActivityHelper::log('DELETE', 'ITEM', $item->id, 'Item deleted successfully');
            return redirect()->route('items.index')->with('success', 'Item deleted successfully');
        } catch (\Exception $e) {
            ErrorHelper::log('ITEM_DELETE', $e);
            return back()->withErrors(['error' => 'An error occurred while deleting the item.']);
        }
    }
}
