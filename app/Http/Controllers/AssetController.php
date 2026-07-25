<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::latest()->get();
        return view('operator.asset-index', compact('assets'));
    }

    public function create()
    {
        return view('operator.asset-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'asset_code' => 'required|unique:assets,asset_code|max:50',
            'name' => 'required|max:255',
            'status' => 'required|in:Available,In Use,Maintenance,Retired',
            'acquisition_value' => 'nullable|numeric|min:0',
            'purchase_date' => 'nullable|date',
        ]);

        Asset::create([
            'asset_code' => $request->asset_code,
            'name' => $request->name,
            'status' => $request->status,
            'acquisition_value' => $request->acquisition_value,
            'purchase_date' => $request->purchase_date,
            'last_modified_by' => $request->session()->get('user_id'), 
        ]);

        return redirect()->route('assets.index')->with('success', 'Asset berhasil ditambahkan.');
    }

    public function edit(Asset $asset)
    {
        return view('operator.asset-edit', compact('asset'));
    }
    
    public function update(Request $request, Asset $asset)
    {
        $request->validate([
            'asset_code' => 'required|max:50|unique:assets,asset_code,' . $asset->id, 
            'name' => 'required|max:255',
            'status' => 'required|in:Available,In Use,Maintenance,Retired',
            'acquisition_value' => 'nullable|numeric|min:0',
            'purchase_date' => 'nullable|date',
        ]);

        $asset->update([
            'asset_code' => $request->asset_code,
            'name' => $request->name,
            'status' => $request->status,
            'acquisition_value' => $request->acquisition_value,
            'purchase_date' => $request->purchase_date,
            'last_modified_by' => $request->session()->get('user_id'), 
        ]);

        return redirect()->route('assets.index')->with('success', 'Asset ' . $asset->asset_code . ' berhasil diperbarui!');
    }

    public function destroy(Asset $asset)
    {
        $assetCode = $asset->asset_code; 
        $asset->delete();

        return redirect()->route('assets.index')->with('success', 'Asset ' . $assetCode . ' berhasil dihapus dari inventaris.');
    }
}