<!DOCTYPE html>
<html>
<head>
    <title>Create Shipment</title>
</head>
<body>
    <h1>Create Shipment</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/shipment" method="POST">
        @csrf
        <label>Tracking Number:</label><br>
        <input type="text" name="tracking_number" value="{{ old('tracking_number') }}"><br><br>

        <label>Sender:</label><br>
        <input type="text" name="sender" value="{{ old('sender') }}"><br><br>

        <label>Receiver:</label><br>
        <input type="text" name="receiver" value="{{ old('receiver') }}"><br><br>

        <label>Status:</label><br>
        <input type="text" name="status" value="{{ old('status') }}"><br><br>

        <button type="submit">Save Shipment</button>
    </form>

    <br>
    <a href="/">← Back to list</a>
</body>
</html>
