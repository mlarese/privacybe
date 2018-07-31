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
                        Guten Tag  <?=$d['name']?>  <?=$d['surname']?>,
                    </td>
                </tr><?=$spacer?>

                <tr>
                    <td colspan="100">
                        Über unseren DataOne-Service haben wir Ihre Präferenzen für die Behandlung Ihrer persönlichen Daten erhalten.
                        Um diese nun zu schützen, wollen Sie bitte auf diesen <a href="<?=$d['enclink']?>Link</a> klicken, um Ihre Zustimmung zu bestätigen.
                        <br>
                        Danke
                        Ihr DataOne-Team

                    </td>
                </tr><?=$spacer?>

            </table>
        </div>
    </body>
</html>
