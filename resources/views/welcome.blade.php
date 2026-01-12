<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gamaza.ID </title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Animate On Scroll (AOS) -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <style>
    body { background:#f4f6f8; font-family: 'Poppins', sans-serif; }

    /* Navbar Batik Lautan */
    .navbar-custom {
    background-color: #35e2f5ff; /* warna laut dalam */
    background-image: url("data:image/svg+xml,%3Csvg width='120' height='120' viewBox='0 0 120 120' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%231fa4a9' fill-opacity='0.25'%3E%3Cpath d='M60 10c15 15 15 35 0 50s-15 35 0 50c-20-10-30-30-30-50s10-40 30-50z'/%3E%3Cpath d='M10 60c15-15 35-15 50 0s35 15 50 0c-10 20-30 30-50 30s-40-10-50-30z'/%3E%3C/g%3E%3C/svg%3E");
    background-repeat: repeat;
    background-size: 120px 120px;
    }

    /* Hero */
    .hero {
      background:
        linear-gradient(
          rgba(0, 0, 0, 0.45),
          rgba(0, 0, 0, 0.45)
        ),
        url("/images/batik-laut-awan.png");
      
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;

      color: #ffffffff;
      padding: 60px 20px;
      border-radius: 16px;
    }

    /* Product Card */
    .product-card {
      background:#fff;
      border-radius:16px;
      padding:14px;
      box-shadow:0 10px 25px rgba(0,0,0,0.08);
      transition:all .3s ease;
      position:relative;
      height:100%;
    }

    .product-card:hover {
      transform: translateY(-8px);
      box-shadow:0 15px 35px rgba(0,0,0,0.15);
    }

    .product-card img {
      height:180px;
      object-fit:contain;
      margin-bottom:10px;
    }

    .discount {
      position:absolute;
      top:12px; right:12px;
      background:#ff3d00;
      color:#fff;
      font-size:12px;
      padding:5px 8px;
      border-radius:8px;
    }

    .price { color:#ff5722; font-weight:700; }

    .rating i { color:#ffc107; font-size:13px; }

    .btn-cart {
      background:rgba(38, 154, 18, 1);
      color:#fff;
      border-radius:30px;
    }

    .btn-cart:hover { background:#e64a19; color:#fff; }

    footer {
      background:#212529;
      color:#ccc;
      padding:30px 0;
      margin-top:60px;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container">
    <a class="navbar-brand" href="#"><i class="fa-solid fa-bag-shopping"></i> Gamaza.ID</a>

    <form class="d-flex mx-auto w-50">
      <input class="form-control rounded-pill" type="search" placeholder="Cari produk terbaik hari ini...">
    </form>

    <ul class="navbar-nav align-items-center">

      <!-- Dropdown Akun -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle fw-semibold" href="#"
          role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-regular fa-user"></i> Akun
        </a>

        <ul class="dropdown-menu dropdown-menu-end shadow border-0">
          <li>
            <a class="dropdown-item" href="/login">
              <i class="fa-solid fa-right-to-bracket me-2 text-primary"></i> Login
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="/register">
              <i class="fa-solid fa-user-plus me-2 text-success"></i> Daftar
            </a>
          </li>
        </ul>
      </li>

      <!-- Cart -->
      <li class="nav-item ms-3">
        <a class="nav-link position-relative" href="/cart">
          <i class="fa-solid fa-cart-shopping fs-5"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          </span>
        </a>
      </li>

    </ul>
  </div>
</nav>

<!-- Hero -->
<div class="container mt-4">
  <div class="hero text-center" data-aos="fade-up">
    <h2 class="fw-bold">Belanja Mudah, Harga Bersahabat</h2>
    <p class="mb-0">Temukan produk terbaik pilihan kami hari ini</p>
  </div>
</div>

<!-- Products -->
<div class="container mt-5">
  <h4 class="fw-bold text-center mb-4">🔥 Produk Kami</h4>

  <div class="row g-4">
    <!-- Product -->
    <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in">
      <div class="product-card">
        <span class="discount">-53%</span>
        <img src="https://via.placeholder.com/200" class="img-fluid">
        <p class="small">Kalender Dinding 2026 Jumbo</p>
        <div class="rating mb-1">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
        </div>
        <p class="price">Rp6.988</p>
        <button class="btn btn-cart btn-sm w-100"><i class="fa-solid fa-cart-plus"></i> Keranjang</button>
      </div>
    </div>

    <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in">
      <div class="product-card">
        <span class="discount">-53%</span>
        <img src="https://via.placeholder.com/200" class="img-fluid">
        <p class="small">Kalender Dinding 2026 Jumbo</p>
        <div class="rating mb-1">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
        </div>
        <p class="price">Rp10.988</p>
        <button class="btn btn-cart btn-sm w-100"><i class="fa-solid fa-cart-plus"></i> Keranjang</button>
      </div>
    </div>

    <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in">
      <div class="product-card">
        <span class="discount">-53%</span>
        <img src="https://via.placeholder.com/200" class="img-fluid">
        <p class="small">Kalender Dinding 2026 Jumbo</p>
        <div class="rating mb-1">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
        </div>
        <p class="price">Rp8.988</p>
        <button class="btn btn-cart btn-sm w-100"><i class="fa-solid fa-cart-plus"></i> Keranjang</button>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="text-center">
  <div class="container">
    <p class="mb-1">© 2026 ShopApp. All Rights Reserved</p>
    <small>E-Commerce Laravel Project</small>
  </div>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>

</body>
</html>