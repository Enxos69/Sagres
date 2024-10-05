<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Sagres SpA</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" id="reset-form">Calcola KXPO</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    <!--  inserisce la sezione SCRIPT -->
    @yield('scripts')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

    <script>
        // Gestore di eventi per azzerare i campi del form
        document.getElementById('reset-form').addEventListener('click', function(e) {
            e.preventDefault(); // Impedisce il comportamento di default del link
            
            // Azzera tutti i campi del form tranne il campo "pitchAngleRadians"
            const form = document.getElementById('ship-data-form');
            const CG_hInput = document.getElementById('CG_h');
            const lengthInput = document.getElementById('length');
            const T_scInput = document.getElementById('T_sc');
            const verticalShiftInput = document.getElementById('verticalShift');
            
            // Reset dei campi
            lengthInput.value = '';
            T_scInput.value = '';
            verticalShiftInput.value = '';
            CG_hInput.value = ''; // Azzera CG_h
            document.getElementById('kxpo-result').innerHTML = '<tr><td>-</td></tr>'; // Ripristina il risultato
        });
    </script>
</body>

</html>
