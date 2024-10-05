<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log("Script caricato correttamente"); // Verifica che il codice venga eseguito

        const lengthInput = document.getElementById('length');
        const CG_hInput = document.getElementById('CG_h');
        const pitchAngleDegreesInput = document.getElementById('pitchAngleDegrees');
        const pitchAngleRadiansInput = document.getElementById('pitchAngleRadians');

        // Funzione per calcolare CG_h automaticamente in base alla lunghezza
        lengthInput.addEventListener('input', function() {
            const length = parseFloat(lengthInput.value);
            console.log("Input lunghezza:", length); // Log del valore di lunghezza
            if (length > 200) {
                CG_hInput.value = 15;
            } else if (length > 0) {
                CG_hInput.value = 10;
            } else {
                CG_hInput.value = ''; // Reset in caso di input non valido
            }
        });

        // Funzione per aggiornare la conversione gradi a radianti
        function updatePitchAngleRadians() {
            const degrees = parseFloat(pitchAngleDegreesInput.value);
            pitchAngleRadiansInput.value = (degrees * Math.PI / 180).toFixed(4);
        }

        // Valorizza immediatamente il campo radianti al caricamento della pagina
        updatePitchAngleRadians();

        // Conversione gradi a radianti
        pitchAngleDegreesInput.addEventListener('input', function() {
            updatePitchAngleRadians();
        });

        // Gestione invio form e aggiornamento tabella con AJAX
        document.getElementById('ship-data-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('{{ route('calcolaKXPO') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Formattazione del risultato con virgola come separatore decimale
                    const formattedKXPO = data.kxpo.toString().replace('.', ',');  
                    document.getElementById('kxpo-result').innerHTML =
                        `<tr><td>${formattedKXPO}</td></tr>`;
                })
                .catch(error => {
                    console.error('Errore:', error);
                });
        });

        // Gestore di eventi per azzerare i campi del form
        document.getElementById('reset-campi').addEventListener('click', function(e) {
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
            document.getElementById('kxpo-result').innerHTML =
            '<tr><td>-</td></tr>'; // Ripristina il risultato
        });
    });
</script>
