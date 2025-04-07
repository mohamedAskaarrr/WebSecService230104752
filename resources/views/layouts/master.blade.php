<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title') | Askarr Store</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Lodash -->
  <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom Styling -->
  <style>
















  body {
    background-color: #f9f7f1;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #2f2f2f;
  }

  .navbar {
    background: linear-gradient(to right, #e6e2d3, #d4e9d4);
    border-bottom: 1px solid #ccc;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
  }

  .navbar-brand, .nav-link {
    color: #3e4e3e !important;
    font-weight: 500;
  }

  .container {
    margin-top: 40px;
    margin-bottom: 40px;
  }

  .card {
    background-color: #ffffff;
    border-radius: 16px;
    border: none;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
  }

  h2, h3, h4 {
    color: #4a5e4a;
    font-weight: 600;
  }

  .alert {
    border-radius: 12px;
    padding: 12px 20px;
  }

  .btn-gold {
    background-color: #e1c78f;
    color: #fff;
    font-weight: 600;
    border: none;
  }

  .btn-gold:hover {
    background-color: #d4b67f;
  }

  .btn-green {
    background-color: #7ca98f;
    color: white;
    font-weight: bold;
    border: none;
  }

  .btn-green:hover {
    background-color: #699277;
  }

  .table {
    background-color: #ffffff;
    border-radius: 10px;
    overflow: hidden;
  }

  footer {
    background: #f3ead2;
    color: #4b4b4b;
    text-align: center;
    padding: 15px;
    border-top: 1px solid #ddd;
    font-size: 0.9rem;
    margin-top: 60px;
  }
</style>

</head>
<body>

  @include('layouts.menu')

  <div class="container">
    @yield('content')
  </div>

  <footer>
    <small>🌿 Askarr Store &copy; {{ date('Y') }} — Built with me</small>
  </footer>

</body>
</html>
