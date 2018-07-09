<?
include("../master.php");
$translationFilename = "it_IT/LC_MESSAGES/messages.po";
$handle = @fopen($translationFilename, "r");
print "<pre>";
$riga1 = false;
$riga2 = true;
if ($handle) {
    while (!feof($handle))
    {
        $buffer = fgets($handle, 4096);
        
//        printDebug($buffer,"->");
        if (!$riga1 and $riga2)
        {
            
            preg_match('/^msgid ".*"$/',$buffer,$result);
            if (count($result) > 0)
            {
                print "<pre>";
                $string = $result[0];
                $string = str_replace("msgid ","",$string);
                $string = str_replace("\"","",$string);
                print("KEY : ".$string."\n");
                $riga1 = true;
                $riga2 = false;
            }
        }
        if ($riga1)
        {
            preg_match('/^msgstr ".*"$/',$buffer,$result);
            if (count($result) > 0)
            {
                $string = $result[0];
                $string = str_replace("msgstr ","",$string);
                $string = str_replace("\"","",$string);
                print ("IT : ".$string);
                $riga2 = true;
                $riga1 = false;
                print "</pre>";
            }
        }
           
        
    }
    fclose($handle);
}
