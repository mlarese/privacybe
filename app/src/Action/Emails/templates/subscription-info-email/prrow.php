<?php
    $date = date_create($data['created']['date']);
    $dtcreate = date_format($date,"d/m/Y");
    $tmcreate = date_format($date,"H:i");

    $flparagraphs = $data['privacy']['paragraphs'];
    $flags = '';
    foreach ($flparagraphs as $pg) {
        foreach ($pg['treatments'] as $t) {
            $checked = $t['selected']?'checked="true"':'';

            $flags.='<div>'.
                        '<input disabled="disabled" type="checkbox" ' . $checked . '>'.
                        $t['code'].
                    '</div>';
        }
    }
?>

<tr>
    <td style="<?=$st_ba?>"><?=$dtcreate?></td>
    <td style="<?=$st_ba?>"><?=$tmcreate?></td>
    <td style="<?=$st_ba?>"><?=$flags?></td>
    <td style="<?=$st_ba?>"><?=$data['page']?></td>
    <td style="<?=$st_ba?>"><?=$data['ip']?></td>
</tr>
