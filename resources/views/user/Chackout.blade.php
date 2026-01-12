<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h3 class="fw-bold mb-4">💳 Checkout</h3>

    <div class="row">
        <!-- Form Alamat -->
        <div class="col-md-7">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="fw-semibold mb-3">Alamat Pengiriman</h5>

                    <div class="mb-3">
                        <label class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. HP</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <!-- Ringkasan -->
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="fw-semibold mb-3">Ringkasan Pesanan</h5>

                    <p class="mb-1">Kalender Dinding 2026 Jumbo</p>
                    <p class="text-muted">1 x Rp 8.988</p>

                    <hr>

                    <h5>Total: <span class="text-danger fw-bold">Rp 8.988</span></h5>

                    <button class="btn btn-success w-100 mt-3">
                        Bayar Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
