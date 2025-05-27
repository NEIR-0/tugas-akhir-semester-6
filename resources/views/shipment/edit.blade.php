<!DOCTYPE html>
<html>
<head>
    <title>Update Shipment</title>
</head>
<body>
    <h1>Update Shipment</h1>

    <form action="/shipment/{{ $shipment->id }}/update" method="POST">
        @csrf

        <p><strong>Tracking Number:</strong> {{ $shipment->tracking_number }}</p>
        <p><strong>Current Status:</strong> {{ $shipment->status }}</p>
        <p><strong>Created At:</strong> {{ $shipment->created_at }}</p>
        <p><strong>Updated At:</strong> {{ $shipment->updated_at }}</p>

        <label for="status">New Status:</label><br>
        <input type="text" name="status" id="status" required><br><br>

        <label for="location">Location (for log):</label><br>
        <input type="text" name="location" id="location" required><br><br>

        <button type="submit">Update & Add Log</button>
    </form>

    <br>

    <h2>Existing Logs</h2>

    @if($shipment->logs->isEmpty())
        <p>No logs found.</p>
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

    <br>
    <a href="/">← Back to list</a>
</body>
</html>
