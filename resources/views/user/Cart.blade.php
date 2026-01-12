<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h3 class="fw-bold mb-4">🛒 Keranjang Belanja</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table align-middle">
                <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th width="120">Jumlah</th>
                    <th>Total</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Kalender Dinding 2026 Jumbo</td>
                    <td>Rp 8.988</td>
                    <td>
                        <input type="number" class="form-control" value="1" min="1">
                    </td>
                    <td class="fw-semibold">Rp 8.988</td>
                    <td>
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="text-end">
                <h5>Total: <span class="text-danger fw-bold">Rp 8.988</span></h5>
                <a href="/checkout" class="btn btn-success mt-2">
                    Lanjut ke Checkout
                </a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
