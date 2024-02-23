DOPO LA USER STORY 8: fate un bel composer install e php artisan migrate poi dovete aggiornare le chiavi del file google_credential.json che trovate su discord postate da Emy (come direbbe antonio) e poi inserire la chiave per l'ia all'interno della vostra cartella php e decommentare dal php.ini la riga curl e aggiungere il seguente percorso:
curl.cainfo="C:\php\8.3\cacert.pem"
Nel caso seguire la documentazione sul DropBox.

Comandi necessari per far funzionare il sito:
php artisan serve
npm run dev
php artisan queue:work (necessario per l'inizializzazione del Job per ridimensionare l'immagine)

php artisan migrate:fresh (per refreshare il database)

presto:makeUserRevisor = Rendi un utente revisore


per tntsearch, da sparare sul terminale
php artisan scout:flush "App\Models\Announcement"
php artisan scout:import "App\Models\Announcement"
questi comandi servono a indicizzare gli annunci così si possono cercare anche quelli vecchi

extra:
guardare gsap

!!!!!!!!!!!!!!!!!!!
tradurre le categorie all'interno del dropdown della navbar

INSTALLATO BOOTSTRAP-ICONS (FARE npm i)
