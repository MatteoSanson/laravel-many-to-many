# Laravel Boolfolio - Project Typology

Partendo dalla repository laravel-auth aggiungere una nuova entità Type.<br>
Questa entità rappresenta la tipologia di progetto ed è in relazione one to many con i progetti.<br>
Task da implementare:
- creare la migration per la tabella types
- creare il model Type
- creare la migration di modifica per la tabella projects per aggiungere la chiave esterna
- aggiungere ai model Type e Project i metodi per definire la relazione one to many
- visualizzare nella pagina di dettaglio di un progetto la tipologia associata, se presente
- permettere all’utente di associare una tipologia nella pagina di creazione e modifica di un progetto
- gestire il salvataggio dell’associazione progetto-tipologia con opportune regole di validazione
<br><br>

## Bonus 1

Creare il seeder per il model Type.
<br><br>

## Bonus 2

Aggiungere le operazioni CRUD per il model Type, in modo da gestire le tipologie di progetto direttamente dal pannello di amministrazione.
