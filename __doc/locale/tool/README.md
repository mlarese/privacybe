**Tool per la gestione dell'internazionalizzazione delle lingue**

**Labels non tradotte**  
Utilizzare il comando `getUntranslatedPhrases.cmd.php` per esportare tutte le labels non tradotte.   
Le labels saranno disponibili in formato CSV per Excel dentro la cartella:   
`ABS-CORE/common/locale/tool/tmp/output` 

**Labels mancanti tradotte**   
Convertire il file di Excel in file CSV e porlo dentro la cartella:    
`ABS-CORE/common/locale/tool/tmp/input`    
Il file deve avere come nome il nome della lingua, ad esempio:   
`ABS-CORE/common/locale/tool/tmp/input/it_IT.csv`    
Utilizzare il comando `setUntranslatedPhrases.cmd.php` per esportare tutte le labels non tradotte.


**Conversione da file .po a file .mo**    
Utilizzare il comando `convertFromPoToMo.cmd.php` per convertire i files *.po in files *.mo