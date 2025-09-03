<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Helpdesk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/2.0.0/modern-normalize.min.css"/>
    <style>
        body{font-family:system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,Cantarell,Noto Sans,sans-serif;}
        .layout{display:grid;grid-template-columns:220px 1fr;min-height:100vh}
        header{grid-column:1 / -1;background:#111827;color:#fff;padding:12px 20px}
        header a{color:#fff;text-decoration:none;margin-right:12px}
        .sidebar{background:#F3F4F6;padding:16px;border-right:1px solid #E5E7EB}
        .sidebar a{display:block;color:#111827;text-decoration:none;padding:8px 10px;border-radius:6px;margin-bottom:6px}
        .sidebar a.active,.sidebar a:hover{background:#E5E7EB}
        main{padding:20px}
        .container{max-width:1100px;margin:0 auto}
        .btn{display:inline-block;padding:8px 12px;border-radius:6px;border:1px solid #D1D5DB;background:#111827;color:#fff;text-decoration:none}
        .btn.secondary{background:#fff;color:#111827}
        .btn.danger{background:#B91C1C}
        table{width:100%;border-collapse:collapse}
        th,td{padding:8px 10px;border-bottom:1px solid #E5E7EB;text-align:left}
        .field{margin-bottom:12px}
        label{display:block;font-weight:600;margin-bottom:6px}
        input,select,textarea{width:100%;padding:8px 10px;border:1px solid #D1D5DB;border-radius:6px}
        .flash{padding:10px 12px;border-radius:6px;margin-bottom:12px}
        .flash.success{background:#ECFDF5;color:#065F46;border:1px solid #A7F3D0}
        .flash.error{background:#FEF2F2;color:#991B1B;border:1px solid #FECACA}
        .actions{display:flex;gap:8px;flex-wrap:wrap}
    </style>
</head>
<body>
<header>
    <div class="container">
        <a href="/">Helpdesk</a>
        <a href="/companies">Empresas</a>
        <a href="/users">Usuarios</a>
        <a href="/agents">Agentes</a>
        <a href="/tickets">Tickets</a>
    </div>
</header>
<div class="layout">
    <aside class="sidebar">
        <nav>
            <a href="/companies" class="{{ request()->is('companies*') ? 'active' : '' }}">Empresas</a>
            <a href="/users" class="{{ request()->is('users*') ? 'active' : '' }}">Usuarios</a>
            <a href="/agents" class="{{ request()->is('agents*') ? 'active' : '' }}">Agentes</a>
            <a href="/tickets" class="{{ request()->is('tickets*') ? 'active' : '' }}">Tickets</a>
        </nav>
    </aside>
    <main>
        <div class="container">
            @if (session('success'))
                <div class="flash success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="flash error">
                    <strong>Errores de validación:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
