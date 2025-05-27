<!DOCTYPE html>
<html>
<head>
    <title>Shipment List</title>
</head>
<body>
    <h1>All Shipments</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="/shipment/create">+ Create New Shipment</a>

    <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tracking Number</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($shipments as $shipment)
                <tr>
                    <td>{{ $shipment->id }}</td>
                    <td>{{ $shipment->tracking_number }}</td>
                    <td>{{ $shipment->sender }}</td>
                    <td>{{ $shipment->receiver }}</td>
                    <td>{{ $shipment->status }}</td>
                    <td>
                        <a href="/shipment/{{ $shipment->id }}">View</a> |
                        <a href="/shipment/{{ $shipment->id }}/edit">Update</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No shipments found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
