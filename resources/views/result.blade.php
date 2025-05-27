<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Hasil Pelacakan</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="container">
    <div class="result-box">
      <h2 class="title">Detail Pengiriman</h2>

      <p><strong>Nomor Resi:</strong> {{ $shipment->tracking_number }}</p>
      <p><strong>Pengirim:</strong> {{ $shipment->sender }}</p>
      <p><strong>Penerima:</strong> {{ $shipment->receiver }}</p>
      <p><strong>Status Terkini:</strong> {{ $shipment->status }}</p>

      <hr>

      <h3 class="subtitle">Riwayat Pengiriman</h3>
      @if(count($logs) > 0)
        <ul class="log-list">
          @foreach($logs as $log)
            <li>
              <strong>{{ $log->timestamp }}</strong><br>
              Lokasi: {{ $log->location }}<br>
              Status: {{ $log->status }}
            </li>
          @endforeach
        </ul>
      @else
        <p>Belum ada riwayat pengiriman.</p>
      @endif

      <a href="/" class="back-link">🔙 Lacak Resi Lain</a>
    </div>
  </div>
</body>
</html>
