<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\ShipmentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShipmentController extends Controller
{
    public function index(Request $request)
    {
        return view('shipment.index');
    }

    public function apiIndex(Request $request)
    {
        $search = $request->input('search');

        $shipments = Shipment::when($search, function($query, $search) {
            $query->where('tracking_number', 'like', "%{$search}%")
                ->orWhere('sender', 'like', "%{$search}%")
                ->orWhere('receiver', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%");
        })->get();

        // Return JSON response
        return response()->json([
            'shipments' => $shipments,
        ]);
    }

    public function create()
    {
        return view('shipment.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tracking_number' => 'required|unique:shipments,tracking_number',
            'sender' => 'required|string|max:255',
            'receiver' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        Shipment::create($validated);

        return redirect('/')->with('success', 'Shipment created successfully!');
    }

    public function edit($id)
    {
        $shipment = Shipment::with('logs')->findOrFail($id);
        return view('shipment.edit', compact('shipment'));
    }

    public function update(Request $request, $id)
    {
        $shipment = Shipment::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|string|max:50',
            'location' => 'required|string|max:255',
        ]);

        // Update shipment status
        $shipment->update([
            'status' => $validated['status'],
        ]);

        Log::info('Shipment status updated', [
            'shipment_id' => $shipment->id,
            'new_status' => $validated['status'],
            'location' => $validated['location'],
        ]);

        // Create shipment log, timestamps otomatis di-handle Laravel
        ShipmentLog::create([
            'shipment_id' => $shipment->id,
            'location' => $validated['location'],
            'status' => $validated['status'],
            // jangan isi 'timestamp', Laravel otomatis isi created_at dan updated_at
        ]);

        return redirect('/')->with('success', 'Shipment updated and log added!');
    }

    public function show($id)
    {
        $shipment = Shipment::with('logs')->findOrFail($id);
        return view('shipment.show', compact('shipment'));
    }
}
