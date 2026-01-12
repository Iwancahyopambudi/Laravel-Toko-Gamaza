<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk | Gamaza.ID</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --secondary: #6c757d;
            --success: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --border-radius: 12px;
            --box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            color: var(--dark);
            min-height: 100vh;
            padding-top: 20px;
        }
        
        .container {
            max-width: 1200px;
        }
        
        /* Header */
        .header {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--box-shadow);
            border-left: 5px solid var(--primary);
        }
        
        .header h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }
        
        .header p {
            color: var(--secondary);
            font-size: 0.95rem;
            margin-bottom: 0;
        }
        
        /* Main Card */
        .main-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            border: none;
            overflow: hidden;
            margin-bottom: 2rem;
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 1.5rem 2rem;
            border-bottom: none;
        }
        
        .card-header h3 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .card-header h3 i {
            font-size: 1.4rem;
        }
        
        .card-body {
            padding: 2.5rem;
        }
        
        /* Form Styles */
        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }
        
        .form-control, .form-select {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            transition: var(--transition);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
        }
        
        .form-control::placeholder {
            color: #adb5bd;
        }
        
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        
        /* File Upload Styling */
        .file-upload-container {
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            background: #fafbfc;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .file-upload-container:hover {
            border-color: var(--primary);
            background: #f8f9ff;
        }
        
        .file-upload-container.dragover {
            border-color: var(--primary);
            background: rgba(67, 97, 238, 0.05);
        }
        
        .file-upload-icon {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }
        
        .file-upload-text h5 {
            color: var(--dark);
            margin-bottom: 0.5rem;
        }
        
        .file-upload-text p {
            color: var(--secondary);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        
        .file-preview {
            margin-top: 1.5rem;
        }
        
        .preview-image {
            max-width: 200px;
            max-height: 200px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            display: none;
        }
        
        /* Button Styles */
        .btn-submit {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.9rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
        }
        
        .btn-submit:hover {
            background: linear-gradient(135deg, var(--primary-dark), #2f46c9);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn-back {
            background: white;
            color: var(--dark);
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 0.9rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
        }
        
        .btn-back:hover {
            background: #f8f9fa;
            border-color: var(--primary);
            color: var(--primary);
        }
        
        /* Alert Styling */
        .alert {
            border-radius: 8px;
            border: none;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
        }
        
        .alert-danger {
            background: #fee;
            color: #dc3545;
            border-left: 4px solid #dc3545;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .card-body {
                padding: 1.5rem;
            }
            
            .header {
                padding: 1.25rem;
            }
            
            .header h1 {
                font-size: 1.75rem;
            }
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }
        
        /* Required field indicator */
        .required::after {
            content: " *";
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container fade-in">
        <!-- Header -->
        <div class="header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1><i class="fas fa-box me-2"></i> Tambah Produk Baru</h1>
                    <p>Lengkapi formulir di bawah untuk menambahkan produk baru ke katalog</p>
                </div>
                <div class="d-none d-md-block">
                    <span class="badge bg-primary fs-6 p-2 px-3">
                        <i class="fas fa-cube me-2"></i>Gamaza.ID
                    </span>
                </div>
            </div>
        </div>
        
        <!-- Main Form Card -->
        <div class="main-card">
            <div class="card-header">
                <h3><i class="fas fa-plus-circle"></i> Informasi Produk</h3>
            </div>
            <div class="card-body">
                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <h5 class="mb-2"><i class="fas fa-exclamation-triangle me-2"></i> Perhatian</h5>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <!-- Form -->
                <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data" id="productForm">
                    @csrf
                    
                    <div class="row">
                        <!-- Kode Produk -->
                        <div class="col-md-6 mb-4">
                            <label for="kode_produk" class="form-label required">Kode Produk</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-barcode text-primary"></i>
                                </span>
                                <input type="text" 
                                       class="form-control" 
                                       id="kode_produk" 
                                       name="kode_produk" 
                                       placeholder="PRD-001"
                                       value="{{ old('kode_produk') }}"
                                       required>
                            </div>
                            <div class="form-text">Kode unik untuk identifikasi produk</div>
                        </div>
                        
                        <!-- Nama Produk -->
                        <div class="col-md-6 mb-4">
                            <label for="nama" class="form-label required">Nama Produk</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-cube text-primary"></i>
                                </span>
                                <input type="text" 
                                       class="form-control" 
                                       id="nama" 
                                       name="nama" 
                                       placeholder="Nama produk"
                                       value="{{ old('nama') }}"
                                       required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label for="deskripsi" class="form-label required">Deskripsi Produk</label>
                        <textarea class="form-control" 
                                  id="deskripsi" 
                                  name="deskripsi" 
                                  rows="4"
                                  placeholder="Deskripsikan produk secara detail..."
                                  required>{{ old('deskripsi') }}</textarea>
                        <div class="form-text">Jelaskan fitur, spesifikasi, dan keunggulan produk</div>
                    </div>
                    
                    <div class="row">
                        <!-- Jumlah Stok -->
                        <div class="col-md-4 mb-4">
                            <label for="jumlah" class="form-label required">Stok Tersedia</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-boxes text-primary"></i>
                                </span>
                                <input type="number" 
                                       class="form-control" 
                                       id="jumlah" 
                                       name="jumlah" 
                                       placeholder="0"
                                       min="0"
                                       value="{{ old('jumlah') }}"
                                       required>
                            </div>
                        </div>
                        
                        <!-- Harga -->
                        <div class="col-md-8 mb-4">
                            <label for="harga" class="form-label required">Harga Produk</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-tag text-primary"></i>
                                </span>
                                <input type="number" 
                                       class="form-control" 
                                       id="harga" 
                                       name="harga" 
                                       placeholder="0"
                                       min="0"
                                       step="100"
                                       value="{{ old('harga') }}"
                                       required>
                                <span class="input-group-text">Rp</span>
                            </div>
                            <div class="form-text">Harga dalam Rupiah (IDR)</div>
                        </div>
                    </div>
                    
                    <!-- Gambar Produk -->
                    <div class="mb-5">
                        <label class="form-label">Gambar Produk</label>
                        <div class="file-upload-container" id="fileUploadContainer">
                            <div class="file-upload-icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <div class="file-upload-text">
                                <h5>Upload Gambar Produk</h5>
                                <p>Drag & drop file gambar di sini atau klik untuk memilih</p>
                                <button type="button" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-folder-open me-1"></i> Pilih File
                                </button>
                                <input type="file" 
                                       name="gambar" 
                                       id="gambar" 
                                       class="d-none" 
                                       accept="image/jpeg,image/png,image/jpg,image/gif">
                                <p class="mt-2 mb-0"><small>Format: JPG, PNG, GIF (Maks. 2MB)</small></p>
                            </div>
                            <div class="file-preview text-center">
                                <img id="imagePreview" class="preview-image" src="" alt="Preview">
                                <p id="fileName" class="mt-2 text-success fw-medium"></p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-back">
                                <i class="fas fa-arrow-left me-2"></i> Kembali ke Dashboard
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" class="btn btn-submit" id="submitBtn">
                                <i class="fas fa-save me-2"></i> Simpan Produk
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Footer Note -->
        <div class="text-center text-muted mt-4 mb-5">
            <p class="small">
                <i class="fas fa-info-circle me-1"></i> 
                Pastikan semua informasi yang dimasukkan sudah benar sebelum menyimpan.
            </p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // File upload handling
            const fileInput = document.getElementById('gambar');
            const fileUploadContainer = document.getElementById('fileUploadContainer');
            const imagePreview = document.getElementById('imagePreview');
            const fileName = document.getElementById('fileName');
            const uploadButton = fileUploadContainer.querySelector('button');
            
            // Trigger file input on container click
            fileUploadContainer.addEventListener('click', function(e) {
                if (e.target.tagName !== 'INPUT') {
                    fileInput.click();
                }
            });
            
            // Trigger file input on button click
            uploadButton.addEventListener('click', function(e) {
                e.stopPropagation();
                fileInput.click();
            });
            
            // Handle file selection
            fileInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const file = this.files[0];
                    const reader = new FileReader();
                    
                    // Validate file size (max 2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        alert('Ukuran file terlalu besar. Maksimal 2MB.');
                        this.value = '';
                        return;
                    }
                    
                    // Show file name
                    fileName.textContent = file.name;
                    
                    // Preview image
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    }
                    
                    reader.readAsDataURL(file);
                    
                    // Add visual feedback
                    fileUploadContainer.classList.add('dragover');
                    setTimeout(() => {
                        fileUploadContainer.classList.remove('dragover');
                    }, 500);
                }
            });
            
            // Drag and drop functionality
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                fileUploadContainer.addEventListener(eventName, preventDefaults, false);
            });
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            ['dragenter', 'dragover'].forEach(eventName => {
                fileUploadContainer.addEventListener(eventName, highlight, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                fileUploadContainer.addEventListener(eventName, unhighlight, false);
            });
            
            function highlight() {
                fileUploadContainer.classList.add('dragover');
            }
            
            function unhighlight() {
                fileUploadContainer.classList.remove('dragover');
            }
            
            // Handle drop
            fileUploadContainer.addEventListener('drop', function(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                
                if (files.length > 0) {
                    fileInput.files = files;
                    fileInput.dispatchEvent(new Event('change'));
                }
            });
            
            // Form submission handling
            const form = document.getElementById('productForm');
            const submitBtn = document.getElementById('submitBtn');
            
            form.addEventListener('submit', function() {
                // Change button text and disable during submission
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Menyimpan...';
                submitBtn.disabled = true;
            });
            
            // Price formatting on blur
            const hargaInput = document.getElementById('harga');
            hargaInput.addEventListener('input', function() {
                // Hapus karakter non-angka kecuali titik desimal
                this.value = this.value.replace(/[^\d]/g, '');
            });
            
            // Auto-generate product code based on name
            const namaInput = document.getElementById('nama');
            const kodeInput = document.getElementById('kode_produk');
            
            namaInput.addEventListener('blur', function() {
                if (this.value && !kodeInput.value) {
                    // Generate simple code from product name
                    const code = 'PRD-' + this.value.substring(0, 3).toUpperCase() + '-' + 
                                 Math.floor(100 + Math.random() * 900);
                    kodeInput.value = code;
                }
            });
        });
    </script>
</body>
</html>