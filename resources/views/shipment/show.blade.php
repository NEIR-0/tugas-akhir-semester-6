<!DOCTYPE html>
<html>
<head>
    <title>Shipment Detail</title>
</head>
<body>
    <h1>Shipment Detail</h1>

    <p><strong>ID:</strong> {{ $shipment->id }}</p>
    <p><strong>Tracking Number:</strong> {{ $shipment->tracking_number }}</p>
    <p><strong>Sender:</strong> {{ $shipment->sender }}</p>
    <p><strong>Receiver:</strong> {{ $shipment->receiver }}</p>
    <p><strong>Status:</strong> {{ $shipment->status }}</p>
    <p><strong>Created At:</strong> {{ $shipment->created_at }}</p>
    <p><strong>Updated At:</strong> {{ $shipment->updated_at }}</p>

    <h2>Shipment Logs</h2>

    @if($shipment->logs->isEmpty())
        <p>No logs found for this shipment.</p>
    @else
        <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 10px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shipment->logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->location }}</td>
                    <td>{{ $log->status }}</td>
                    <td>{{ $log->created_at }}</td>
                    <td>{{ $log->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <p><a href="/">Back to Shipment List</a></p>
</body>
</html>
