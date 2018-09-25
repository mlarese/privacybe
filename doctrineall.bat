@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/doctrinedataoneupd
php "%BIN_TARGET%" %*
