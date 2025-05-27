<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index()
    {
        return view('track');
    }

    public function track(Request $request)
    {
        $trackingNumber = $request->input('resi');
        $shipment = Shipment::where('tracking_number', $trackingNumber)->first();

        if (!$shipment) {
            return view('track', ['error' => 'Nomor resi tidak ditemukan.']);
        }

        $logs = $shipment->logs()->orderByDesc('timestamp')->get();
        return view('result', compact('shipment', 'logs'));
    }
}

