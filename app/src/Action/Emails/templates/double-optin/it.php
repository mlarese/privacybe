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
                       Double optin
                    </td>
                </tr><?=$spacer?>

                <tr>
                    <td colspan="100">
                        Desidera confermare i consensi inseriti?
                        <a href="<?=$d['enclink']?>">Conferma</a>
                    </td>
                </tr><?=$spacer?>

            </table>
        </div>
    </body>
</html>
