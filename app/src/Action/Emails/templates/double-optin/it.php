<?php include 'styles.php'; ?>
<?php $clang='it'; ?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>

        </style>
    </head>
    <body>
        <div style="<?=$containerStyle?>" >
            <table style="<?=$tableStyle?>">
                <tr>
                    <td colspan="100">
                        Buongiorno  <?=$d['name']?>  <?=$d['surname']?>,
                    </td>
                </tr><?=$spacer?>

                <tr>
                    <td colspan="100">
                        abbiamo ricevuto l'accettazione del trattamento dei dati raccolta attraverso il servizio DataOne. Per assicurarti la massima protezione
                        dei tuoi dati ti chiediamo di confermare la tua accettazione cliccando
                        <a href="<?=$d['enclink']?>">qui</a>
                    </td>
                </tr><?=$spacer?>

            </table>
        </div>
    </body>
</html>
