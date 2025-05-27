<!DOCTYPE html>
<html>
<head>
    <title>Shipment List with Live Search</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table { border-collapse: collapse; width: 100%; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <h1>All Shipments</h1>

    <a href="/shipment/create">+ Create New Shipment</a>

    <br><br>

    <input 
        type="text" 
        id="searchInput" 
        placeholder="Search by Tracking Number, Status, Sender, or Receiver" 
        style="width: 300px; padding: 5px;"
        autocomplete="off"
    >

    <div id="tableContainer" style="margin-top: 20px;">
        {{-- Tabel akan di-load via JS --}}
    </div>

<script>
    const input = document.getElementById('searchInput');
    const tableContainer = document.getElementById('tableContainer');
    let timeout = null;

    input.addEventListener('input', function() {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            fetchShipments(this.value);
        }, 500); // debounce 500ms
    });

    function fetchShipments(search) {
        fetch(`/api/shipments?search=${encodeURIComponent(search)}`)
            .then(res => res.json())
            .then(data => {
                renderTable(data.shipments);
            })
            .catch(err => {
                tableContainer.innerHTML = '<p>Error loading data</p>';
                console.error(err);
            });
    }

    function renderTable(shipments) {
        if(shipments.length === 0) {
            tableContainer.innerHTML = '<p>No shipments found.</p>';
            return;
        }

        let html = `<table>
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
            <tbody>`;

        shipments.forEach(s => {
            html += `
            <tr>
                <td>${s.id}</td>
                <td>${s.tracking_number}</td>
                <td>${s.sender}</td>
                <td>${s.receiver}</td>
                <td>${s.status}</td>
                <td>
                    <a href="/shipment/${s.id}">View</a> |
                    <a href="/shipment/${s.id}/edit">Update</a>
                </td>
            </tr>`;
        });

        html += '</tbody></table>';
        tableContainer.innerHTML = html;
    }

    // Load all shipments initially
    fetchShipments('');
</script>

</body>
</html>
