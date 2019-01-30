**DataONE Docker Containers**

## Configurazione
Creare il file `docker-compose.yml` copiando il file `docker-compose-example.yml`:
* sostituire `/add/here/your/project/path/DataONE` con la cartella del tuo progetto locale di DataONE
* sostituire `add_here_your_remote_docker_ip_address` con l'ip locale del network di Docker della macchina di sviluppo (Esempio: 172.18.0.1)
* sostituire `add_here_your_dataone_nginx_remote_docker_ip_address` con l'ip locale del network di Docker del container dataone_nginx (Esempio: 172.18.0.6)   
Questa configurazione è sufficiente per create il Docker Container in modo corretto.

## Docker container
Un'immagine di Docker è un pacchetto eseguibile isolato dal contesto e contiene tutte le librerie, files di configurazione, scripts, variabili d'ambiente e gli eseguibili neccessari per far funzionare un determinato servizio.  
Un docker container è un'istanza in runtime di un'immagine di Docker.  
E' completamente isolato dalla macchina di host (eccezzione fatta per le porte tcp/ip dichiarate come EXPOSE) ed è possibile interagire con esso tramite i comandi di Docker.  
Un container è meno avido di risorse di una VM in quanto occupa le sole risorse neccessrie per far funzionare un determinato servizio e nulla di più.

## Docker composer
Il composer è un wrapper per Docker che permette di raggruppare in un'unico file di configurazione tutti i container che compongono un servizio più complesso. 
Terminata la configurazione, portarsi nella directory della configurazione del container ed  eseguire il build del container tramite il comando:  
  
`docker-compose build`

#### Modalità interattiva/servizio in foreground
E' possibile utilizzare il container in modalità interattiva.  
Portarsi nella directory della configurazione del container ed  eseguire il run container tramite il comando:
  
`docker-compose up` 
  
In questo modo potranno essere visualizzati alcuni messaggi di sistema delle vari container di Docker che compongono il composer.  
Per stoppare il container è sufficiente l'uso della combinazione dei tasti:
   
`CTRL+C`

#### Modalità demone/servizio in background
Solitamente i container vengono utilizzati in modalità background.   
Portarsi nella directory della configurazione del container ed  eseguire il run container tramite il comando:  

`docker-compose up -d`  
  
Per vedere quali container di docker sono attivi lanciare il comando:  

`docker-compose ps`
        
Per loggarsi su di un specifico container di Docker usare il comando:
  
`docker exec -i -t docker_container_name /bin/bash` 
    
Se non viene specificato il tipo di utente, verrà utilizzato l'utente di default del container.   
Altrimenti è necessario utilizzare l'opzione `-u`: 

`docker exec -i -t docker_container_name -u username /bin/bash`
   
Per fermare il composer (e tutti i container) utilizzare il comando
  
`docker-compose kill`   

## Comunicazione tra Docker container
Nelle ultime release di Docker container è possibile far comunicare i container tra di loro in modo nativo.  
Se nella configurazione di Docker composer abbiamo definito il nome del container come `myproject_mariadb`, 
sarà allora sufficiente riferirsi a `myproject_mariadb` come dominio di primo livello.  
Ad esempio, la configurazione di connessione MySQL di Magento 2 da questa:
```
        array (
            'host' => '192.168.1.1',
            'dbname' => 'magento',
            'username' => 'magento',
            'password' => 'magento',
            'model' => 'mysql4',
            'engine' => 'innodb',
            'initStatements' => 'SET NAMES utf8;',
            'active' => '1',
        ),
```
diventa questa:
```
        array (
            'host' => 'myproject_mariadb',
            'dbname' => 'magento',
            'username' => 'magento',
            'password' => 'magento',
            'model' => 'mysql4',
            'engine' => 'innodb',
            'initStatements' => 'SET NAMES utf8;',
            'active' => '1',
        ),
```

## Configurazione di PHP Storm

#### Configurazione di XDebug
Sulle Docker, XDebug deve essere sempre abilitato sulla porta tcp/ip: 9999 (in questo modo evitiamo collisioni con altri XDebug o con servizi PHP-FPM).  

Come configurare XDebug sul progetto corrente:  
  
![alt text](http://gitlab.mm-one.com/mm-one/docker/raw/master/http_images/PHPStorm%20-%20PHP%20HTTP%20Server%20-%20XDebug.png "XDebug configuration")


Come mappare le chiamate di callback XDebug della Docker con il porgetto corrente:  
  
![alt text](http://gitlab.mm-one.com/mm-one/docker/raw/master/http_images/PHPStorm%20-%20PHP%20HTTP%20Server%20-%20Docker%20-%20XDebug.png "XDebug Docker mapping configuration")
   
Come mappare XDebug per le chiamate CLI remote:    
![alt text](http://gitlab.mm-one.com/mm-one/docker/raw/master/http_images/PHPStorm%20-%20PHP%20HTTP%20Server%20-%20XDebug%20CLI.png "XDebug CLI configuration")        

#### Configurazione di Docker

E' possibile configurare il Docker compose direttamente sull'IDE PHP Storm, in modo da controllarlo senza l'utilizzo della BASH:  

![alt text](http://gitlab.mm-one.com/mm-one/docker/raw/master/http_images/PHPStorm%20-%20Docker.png "Docker configuration")
