@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/doctrinedataoneupd.php
php "%BIN_TARGET%" %*
