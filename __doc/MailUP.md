### Integrazione con MailUP

Dalla CLI Command sono disponibili i seguenti comandi:    

`mail:mailup:generate_token`    
genera un nuovo token di MailUP: la prima volta che viene associato un nuovo account bisogna utilizzare questo comando.   
Per generare un nuovo token servono le seguenti informazioni:
* owner (ID dell'Owner)   
* username (l'username di MailUP  del cliente)
* password (la password di MailUP  del cliente)
* clientid (il Client ID di MailUP  del cliente)  
* clientsecret (il Client Secret di MailUP del cliente)
* alertemail (la mail di alter nel caso in cui qualcosa non funzionasse durante la connessioen con le API di MAilUP)

`mail:mailup:get_token`   
Recupera il token corrente

`mail:mailup:refresh_token`   
Esegue il refresh del token (da utilizzare solo in caso di emergenza)

`mail:mailup:maintenance`
Esegue il maintenance interno:
* cancella i token vecchi
* cancella le liste scadute
* cancella i recipient scaduti
                         
`mail:mailup:refresh_resources`
Esegue il refresh delle risorse statiche di MailUP (da usare solo in caso di emergenza)                         
                         
