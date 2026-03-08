@echo off
setlocal

set "PROJECT_ROOT=%~dp0.."
set "TMP_DIR=%PROJECT_ROOT%\.tmp"
set "PHP_BIN=C:\OSPanel\modules\PHP-8.4\php.exe"
set "COMPOSER_BIN=%PROJECT_ROOT%\.tools\composer.phar"

if not exist "%TMP_DIR%" mkdir "%TMP_DIR%"

"%PHP_BIN%" -d sys_temp_dir="%TMP_DIR%" "%COMPOSER_BIN%" %*
exit /b %ERRORLEVEL%
