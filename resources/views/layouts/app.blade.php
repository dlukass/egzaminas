<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Asmeniniai finansai</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background:#f5f7fb; }
        .card { border-radius:18px; box-shadow:0 10px 18px rgba(0,0,0,.05); }
        .nav-link.active { font-weight:bold; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 <div class="container">
   <a class="navbar-brand" href="/">Finansai</a>
   <ul class="navbar-nav ms-auto">
     <li class="nav-item"><a class="nav-link" href="/transactions">Įrašai</a></li>
     <li class="nav-item"><a class="nav-link" href="/categories">Kategorijos</a></li>
     <li class="nav-item"><a class="nav-link" href="/reports">Ataskaitos</a></li>
     <li class="nav-item">
        <form method="POST" action="/logout">@csrf
          <button class="btn btn-sm btn-outline-light">Atsijungti</button>
        </form>
     </li>
   </ul>
 </div>
</nav>

<div class="container py-4">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
