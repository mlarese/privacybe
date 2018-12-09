<?php

return <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>
    <body>

    <table>
        <tr>
            <th colspan="100">
                $__dear $name  $surname
            </th>
        </tr>
        <tr>
            <th colspan="100">
                <?=t('privacy detail request')?>
            </th>
        </tr>
    </table>

    </body>
    </html>
HTML;
/*** template ***/
?>
