<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | Gamaza.ID</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background: #f4f6f8; 
        }
        .sidebar { 
            min-height: 100vh; 
            background: linear-gradient(180deg, #0d6efd, #6f42c1); 
            color: #fff; 
        }
        .sidebar .nav-link { 
            color: #fff; 
            font-weight: 500; 
            border-radius: 8px; 
        }
        .sidebar .nav-link.active { 
            background: rgba(255,255,255,0.15); 
        }
        .sidebar .nav-link:hover { 
            background: rgba(255,255,255,0.1); 
        }
        .content { 
            padding: 20px; 
        }
        .card { 
            border-radius: 12px; 
        }
        .table img { 
            height: 50px; 
            width: 50px; 
            object-fit: cover; 
            border-radius: 6px; 
        }
        
        /* Tombol Edit dan Delete */
        .btn-edit { 
            background: #ffc107; 
            color: #212529; 
            border-radius: 8px; 
            border: none;
        }
        .btn-edit:hover { 
            background: #e0a800; 
            color: #212529; 
        }
        .btn-delete { 
            background: #dc3545; 
            color: #fff; 
            border-radius: 8px; 
            border: none;
        }
        .btn-delete:hover { 
            background: #bb2d3b; 
        }
        
        .chart-container { 
            height: 300px; 
        }
        .card-stats { 
            border-radius: 12px; 
            background: #fff; 
            padding: 20px; 
            text-align: center; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.05); 
        }
        .card-stats h2 { 
            margin: 0; 
            font-size: 28px; 
        }
        .card-stats h5 { 
            margin: 0; 
            color: #6c757d; 
            font-weight: 500; 
        }
        
        /* Alert styling */
        .alert {
            border-radius: 8px;
            border: none;
            margin-bottom: 1rem;
        }
        
        /* Loading spinner */
        .fa-spinner {
            animation: fa-spin 1s infinite linear;
        }
        
        @keyframes fa-spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Image thumbnail */
        .img-thumbnail {
            border-radius: 8px;
            border: 1px solid #dee2e6;
            padding: 3px;
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- SIDEBAR -->
        <div class="col-md-2 sidebar d-flex flex-column p-3">
            <h4 class="text-center mb-4 fw-bold">Admin Panel</h4>
            <ul class="nav flex-column mb-auto">
                <li class="nav-item mb-2">
                    <a class="nav-link active" href="#dashboard" data-bs-toggle="tab">
                        <i class="fa-solid fa-gauge-high me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link" href="#produk" data-bs-toggle="tab">
                        <i class="fa-solid fa-boxes-stacked me-2"></i> Produk
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link" href="#user" data-bs-toggle="tab">
                        <i class="fa-solid fa-users me-2"></i> Jumlah User
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link" href="#transaksi" data-bs-toggle="tab">
                        <i class="fa-solid fa-receipt me-2"></i> Transaksi
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link" href="#draft" data-bs-toggle="tab">
                        <i class="fa-solid fa-file-lines me-2"></i> Draft
                    </a>
                </li>
            </ul>

            <!-- LOGOUT -->
            <div class="mt-auto">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100 mt-3">
                        <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="col-md-10 content">
            <div class="tab-content">

                <!-- DASHBOARD -->
                <div class="tab-pane fade show active" id="dashboard">
                    <h3 class="mb-4">Dashboard</h3>
                    <div class="row mb-4" id="statsDashboard">
                        <!-- Stats akan di-load via AJAX -->
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 mb-3">
                            <div class="card p-3">
                                <h6>Grafik Penjualan</h6>
                                <canvas id="chartSales" class="chart-container"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card p-3">
                                <h6>Grafik Produk Terjual</h6>
                                <canvas id="chartProducts" class="chart-container"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card p-3">
                                <h6>Grafik Pengguna Baru</h6>
                                <canvas id="chartUsers" class="chart-container"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="card p-3">
                        <h6>Transaksi Terbaru</h6>
                        <div class="table-responsive">
                            <table class="table table-striped align-middle" id="tableDashboardTransaksi">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data transaksi akan di-load via AJAX -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

              <!-- Bagian PRODUK -->
              <div class="tab-pane fade" id="produk">
                  <h3 class="mb-4 d-flex justify-content-between align-items-center">
                      Produk
                      <a href="{{ route('admin.produk.form') }}" class="btn btn-success btn-sm">
                          <i class="fa-solid fa-plus me-1"></i> Tambah Produk
                      </a>
                  </h3>
                  <div class="table-responsive">
                      <table class="table table-bordered align-middle" id="tableProduk">
                          <thead>
                              <tr>
                                  <th>Kode Produk</th>
                                  <th>Gambar</th>
                                  <th>Nama Produk</th>
                                  <th>Deskripsi</th>
                                  <th>Jumlah</th>
                                  <th>Harga</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <!-- Data produk via AJAX -->
                          </tbody>
                      </table>
                  </div>
              </div>

                <!-- USER -->
                <div class="tab-pane fade" id="user">
                    <h3 class="mb-4">Jumlah User</h3>
                    <div class="row g-3" id="userStats">
                        <!-- Stats user akan di-load via AJAX -->
                    </div>
                </div>

                <!-- TRANSAKSI -->
                <div class="tab-pane fade" id="transaksi">
                    <h3 class="mb-4">Transaksi</h3>
                    <div class="table-responsive">
                        <table class="table table-striped align-middle" id="tableTransaksi">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data transaksi via AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- DRAFT -->
                <div class="tab-pane fade" id="draft">
                    <h3 class="mb-4">Draft</h3>
                    <p>Halaman ini masih dalam pengembangan...</p>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Produk -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">
                    <i class="fas fa-edit me-2"></i> Edit Produk
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_kode" class="form-label">Kode Produk</label>
                            <input type="text" class="form-control" id="edit_kode" name="kode_produk" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_nama" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="edit_nama" name="nama" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="edit_deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3" required></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_jumlah" class="form-label">Jumlah Stok</label>
                            <input type="number" class="form-control" id="edit_jumlah" name="jumlah" min="0" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_harga" class="form-label">Harga (Rp)</label>
                            <input type="number" class="form-control" id="edit_harga" name="harga" min="0" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="edit_gambar" class="form-label">Gambar Produk</label>
                        <input type="file" class="form-control" id="edit_gambar" name="gambar" accept="image/*">
                        <div class="form-text">Biarkan kosong jika tidak ingin mengubah gambar</div>
                        
                        <!-- Preview Gambar -->
                        <div class="mt-3 text-center">
                            <img id="edit_preview" src="" alt="Preview" style="max-width: 200px; display: none;" class="img-thumbnail">
                            <p id="edit_filename" class="text-muted mt-2 small"></p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="saveEdit">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    // Fungsi untuk menampilkan alert
    function showAlert(type, message) {
        let alertHtml = `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>`;
        
        // Tambahkan alert di atas konten
        $('.content').prepend(alertHtml);
        
        // Otomatis hilangkan setelah 5 detik
        setTimeout(() => {
            $('.alert').alert('close');
        }, 5000);
    }

    // ==================== PRODUK ====================
    function loadProduk() {
        $.get('{{ route("admin.produk") }}', function(data) {
            let html = '';
            data.forEach((item, index) => {
                html += `<tr>
                    <td>${item.kode_produk}</td>
                    <td><img src="${item.gambar ? item.gambar : 'https://via.placeholder.com/50'}" alt="produk" class="img-thumbnail"></td>
                    <td>${item.nama}</td>
                    <td>${item.deskripsi}</td>
                    <td>${item.jumlah}</td>
                    <td>Rp${Number(item.harga).toLocaleString()}</td>
                    <td>
                        <button class="btn btn-edit btn-sm me-1" data-id="${item.id}">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="btn btn-delete btn-sm" data-id="${item.id}">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>`;
            });
            $('#tableProduk tbody').html(html);
        });
    }

    // Delete produk
    $(document).on('click', '.btn-delete', function() {
        let id = $(this).data('id');
        if(confirm('Yakin ingin menghapus produk ini?')) {
            $.ajax({
                url: `/admin/produk/${id}`,
                type: 'DELETE',
                data: {_token: '{{ csrf_token() }}'},
                success: function(res) {
                    if(res.success) {
                        loadProduk(); // reload tabel
                        showAlert('success', res.message);
                    }
                }
            });
        }
    });

    // ==================== EDIT PRODUK ====================

    // Saat tombol edit diklik
    $(document).on('click', '.btn-edit', function() {
        let id = $(this).data('id');
        
        // Ambil data dari baris tabel
        let row = $(this).closest('tr');
        let kode_produk = row.find('td:eq(0)').text();
        let nama = row.find('td:eq(2)').text();
        let deskripsi = row.find('td:eq(3)').text();
        let jumlah = row.find('td:eq(4)').text();
        
        // PERBAIKAN 1: Ambil harga dengan benar
        let hargaText = row.find('td:eq(5)').text();
        let harga = hargaText.replace('Rp', '').replace(/\./g, '').trim();
        
        let gambar = row.find('img').attr('src');
        
        console.log('Data produk:', { id, kode_produk, nama, harga, hargaText }); // Debug
        
        // Isi form modal dengan data
        $('#edit_id').val(id);
        $('#edit_kode').val(kode_produk);
        $('#edit_nama').val(nama);
        $('#edit_deskripsi').val(deskripsi);
        $('#edit_jumlah').val(jumlah);
        $('#edit_harga').val(harga);
        
        // Preview gambar
        if (gambar && gambar !== 'https://via.placeholder.com/50') {
            $('#edit_preview').attr('src', gambar).show();
            $('#edit_filename').text('Gambar saat ini');
        } else {
            $('#edit_preview').hide();
            $('#edit_filename').text('Tidak ada gambar');
        }
        
        // Tampilkan modal
        $('#editModal').modal('show');
    });

    // ==================== USER ====================
    function loadUsers() {
        $.get('{{ route("admin.users") }}', function(users) {
            let total = users.length;
            let aktif = users.filter(u => u.status === 'aktif').length;
            let baru = users.filter(u => u.status === 'baru').length;

            let html = `
                <div class="col-md-4">
                    <div class="card card-stats"><h5>Total User</h5><h2>${total}</h2></div>
                </div>
                <div class="col-md-4">
                    <div class="card card-stats"><h5>User Aktif</h5><h2>${aktif}</h2></div>
                </div>
                <div class="col-md-4">
                    <div class="card card-stats"><h5>User Baru</h5><h2>${baru}</h2></div>
                </div>`;
            $('#userStats').html(html);
        });
    }

    // ==================== TRANSAKSI ====================
    function loadTransaksi() {
        $.get('{{ route("admin.transaksi") }}', function(data) {
            let html = '';
            data.forEach((item, index) => {
                html += `<tr>
                    <td>${index+1}</td>
                    <td>${item.user.name}</td>
                    <td>${item.produk.nama}</td>
                    <td>${item.jumlah}</td>
                    <td>Rp${Number(item.total_harga).toLocaleString()}</td>
                    <td><span class="badge ${item.status === 'Lunas' ? 'bg-success' : 'bg-warning text-dark'}">${item.status}</span></td>
                </tr>`;
            });
            $('#tableTransaksi tbody').html(html);
            $('#tableDashboardTransaksi tbody').html(html); // juga untuk dashboard
        });
    }

    // ==================== LOAD SEMUA ====================
    loadProduk();
    loadUsers();
    loadTransaksi();

    // ==================== CHARTS ====================
    const ctxSales = document.getElementById('chartSales').getContext('2d');
    const chartSales = new Chart(ctxSales, {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','Mei','Jun'],
            datasets:[{
                label:'Penjualan',
                data:[12000000,15000000,8000000,18000000,22000000,14000000],
                borderColor:'#0d6efd',
                backgroundColor:'rgba(13,110,253,0.2)',
                fill:true
            }]
        }
    });

    const ctxProducts = document.getElementById('chartProducts').getContext('2d');
    const chartProducts = new Chart(ctxProducts, {
        type:'bar',
        data:{
            labels:['Produk A','Produk B','Produk C','Produk D'],
            datasets:[{
                label:'Produk Terjual',
                data:[30,15,25,10],
                backgroundColor:'#35e2f5'
            }]
        }
    });

    const ctxUsers = document.getElementById('chartUsers').getContext('2d');
    const chartUsers = new Chart(ctxUsers, {
        type:'pie',
        data:{
            labels:['Aktif','Non-Aktif','Baru'],
            datasets:[{
                label:'User',
                data:[95,50,25],
                backgroundColor:['#0d6efd','#6c757d','#35e2f5']
            }]
        }
    });

});
</script>
</body>
</html>