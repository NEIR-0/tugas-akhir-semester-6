<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Lacak Pengiriman Barang</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="container">
    <div class="form-box">
      <h1 class="title">Lacak Pengiriman</h1>

      <form action="/track" method="GET">
        <input type="text" name="resi" placeholder="Masukkan nomor resi..." required>
        <button type="submit">Lacak</button>
      </form>

      @if(isset($error))
        <div class="error-message">{{ $error }}</div>
      @endif
    </div>
  </div>
</body>
</html>
