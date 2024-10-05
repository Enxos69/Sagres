# Progetto Calcolo KXPO

Benvenuti nel progetto **Calcolo KXPO**, un'applicazione web sviluppata con Laravel per facilitare il calcolo del KXPO in base a parametri specifici relativi alla nave. L'app consente agli utenti di inserire dati pertinenti e di ricevere calcoli automatici.

## Indice

- [Caratteristiche](#caratteristiche)
- [Prerequisiti](#prerequisiti)
- [Installazione](#installazione)
- [Uso](#uso)
- [Licenza](#licenza)

## Caratteristiche

- **Interfaccia User-Friendly**: Un design responsivo e accattivante per una migliore esperienza utente.
- **Calcoli Automatici**: Calcolo automatico dell'altezza del centro di gravità (CG_h) e conversione dell'angolo di pitch da gradi a radianti.
- **Pulsante di Reset**: Pulsante per azzerare facilmente i campi inseriti senza ricaricare la pagina.
- **Visualizzazione Risultati**: Presentazione chiara dei risultati del calcolo in una tabella.

## Prerequisiti

Assicurati di avere installato sul tuo sistema:

- [PHP](https://www.php.net/downloads) (versione 7.3 o superiore)
- [Composer](https://getcomposer.org/download/) (per la gestione delle dipendenze PHP)
- [Laravel](https://laravel.com/docs/9.x/installation) (versione 9.x o superiore)
- [Node.js e NPM](https://nodejs.org/en/download/) (per gestire le dipendenze front-end)

## Installazione

Segui questi passaggi per configurare il progetto localmente:

1. **Clona il repository**:

   ```bash
   git clone https://github.com/tuo-username/progetto-calcolo-kxpo.git


2. Naviga nella cartella del progetto:
   cd progetto-calcolo-kxpo

3. Installa le dipendenze PHP:
   composer install

4. Installa le dipendenze JavaScript:
   npm install

5. Crea il file .env: Copia il file .env.example per creare il tuo file di configurazione.
   cp .env.example .env

6. Configura le variabili ambiente: Modifica il file .env con le impostazioni del tuo database.

7. Genera la chiave di applicazione Laravel:
   php artisan key:generate

8. Esegui le migrazioni del database:
   php artisan migrate

9.Avvia il server di sviluppo:
   php artisan serve

Uso
Accedi all'applicazione: Apri il browser e visita http://localhost:8000 per accedere all'app.
Inserisci i dati: Compila i campi richiesti con i dati della nave.
Calcola KXPO: Clicca sul pulsante "Calcola KXPO" per ottenere il risultato.
Resetta i Campi: Se necessario, utilizza il pulsante "Resetta Campi" per azzerare i dati senza dover ricaricare la pagina.

Licenza
Questo progetto è concesso in licenza sotto la Licenza MIT. Puoi trovare ulteriori dettagli nel file LICENSE.



