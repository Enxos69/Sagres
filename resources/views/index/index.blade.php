@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-4 text-center">Inserimento Dati per il Calcolo di KXPO</h2>
        <div class="bg-light p-4 rounded shadow-sm mb-4">
            <form id="ship-data-form" method="POST" action="{{ route('calcolaKXPO') }}">
                @csrf
                <div class="row">
                    <!-- Lunghezza della Nave -->
                    <div class="form-group col-md-4">
                        <label for="length">Lunghezza della Nave (m)</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="length" name="length" placeholder="Inserisci la lunghezza" required>
                    </div>

                    <!-- Pescaggio a Pieno Carico (T_sc) -->
                    <div class="form-group col-md-4">
                        <label for="T_sc">Pescaggio a Pieno Carico (T_sc)</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="T_sc" name="T_sc" placeholder="Inserisci il valore di T_sc" required>
                    </div>

                    <!-- Vertical Shift -->
                    <div class="form-group col-md-4">
                        <label for="verticalShift">Posizione Verticale (Vertical Shift)</label>
                        <input type="number" step="0.0001" min="0" class="form-control" id="verticalShift" name="verticalShift" placeholder="Inserisci la posizione verticale" required>
                    </div>

                    <!-- Calcolato Automaticamente: Altezza del Centro di Gravità (CG_h) -->
                    <div class="form-group col-md-4">
                        <label for="CG_h">Altezza del Centro di Gravità (CG_h)</label>
                        <input type="number" step="0.01" class="form-control bg-light border-secondary" id="CG_h" name="CG_h" readonly>
                    </div>

                    <!-- Preimpostato: Pitch Angle -->
                    <div class="form-group col-md-4">
                        <label for="pitchAngle">Angolo di Pitch (Gradi)</label>
                        <input type="number" step="0.0001" class="form-control bg-light border-secondary" id="pitchAngleDegrees" name="pitchAngleDegrees" value="7.5" readonly>
                    </div>

                    <!-- Calcolato Automaticamente: Conversione da gradi a radianti -->
                    <div class="form-group col-md-4">
                        <label for="pitchAngleRadians">Angolo di Pitch (Radianti)</label>
                        <input type="number" step="0.0001" class="form-control bg-light border-secondary" id="pitchAngleRadians" name="pitchAngleRadians" readonly>
                    </div>

                    <!-- Preimpostato: Angular Acceleration Pitch -->
                    <div class="form-group col-md-4">
                        <label for="angularAccelerationPitch">Accelerazione Angolare Pitch (rad/s²)</label>
                        <input type="number" step="0.0001" class="form-control bg-light border-secondary" id="angularAccelerationPitch" name="angularAccelerationPitch" value="0.105" readonly>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <!-- Pulsante di invio -->
                    <button type="submit" class="btn btn-primary">Calcola KXPO</button>
                    <!-- Pulsante di reset -->
                    <button type="button" id="reset-campi" class="btn btn-secondary">Resetta Campi</button>
                </div>
            </form>
        </div>

        <!-- Tabella Risultati KXPO -->
        <div class="mt-5">
            <h3 class="text-center">Risultato Calcolo KXPO</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>KXPO</th>
                    </tr>
                </thead>
                <tbody id="kxpo-result">
                    <tr>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    @include('index.assets.js')
@endsection
