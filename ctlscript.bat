@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop

if exist D:\XAMPP\hypersonic\scripts\ctl.bat (start /MIN /B D:\XAMPP\server\hsql-sample-database\scripts\ctl.bat START)
if exist D:\XAMPP\ingres\scripts\ctl.bat (start /MIN /B D:\XAMPP\ingres\scripts\ctl.bat START)
if exist D:\XAMPP\mysql\scripts\ctl.bat (start /MIN /B D:\XAMPP\mysql\scripts\ctl.bat START)
if exist D:\XAMPP\postgresql\scripts\ctl.bat (start /MIN /B D:\XAMPP\postgresql\scripts\ctl.bat START)
if exist D:\XAMPP\apache\scripts\ctl.bat (start /MIN /B D:\XAMPP\apache\scripts\ctl.bat START)
if exist D:\XAMPP\openoffice\scripts\ctl.bat (start /MIN /B D:\XAMPP\openoffice\scripts\ctl.bat START)
if exist D:\XAMPP\apache-tomcat\scripts\ctl.bat (start /MIN /B D:\XAMPP\apache-tomcat\scripts\ctl.bat START)
if exist D:\XAMPP\resin\scripts\ctl.bat (start /MIN /B D:\XAMPP\resin\scripts\ctl.bat START)
if exist D:\XAMPP\jetty\scripts\ctl.bat (start /MIN /B D:\XAMPP\jetty\scripts\ctl.bat START)
if exist D:\XAMPP\subversion\scripts\ctl.bat (start /MIN /B D:\XAMPP\subversion\scripts\ctl.bat START)
rem RUBY_APPLICATION_START
if exist D:\XAMPP\lucene\scripts\ctl.bat (start /MIN /B D:\XAMPP\lucene\scripts\ctl.bat START)
if exist D:\XAMPP\third_application\scripts\ctl.bat (start /MIN /B D:\XAMPP\third_application\scripts\ctl.bat START)
goto end

:stop
echo "Stopping services ..."
if exist D:\XAMPP\third_application\scripts\ctl.bat (start /MIN /B D:\XAMPP\third_application\scripts\ctl.bat STOP)
if exist D:\XAMPP\lucene\scripts\ctl.bat (start /MIN /B D:\XAMPP\lucene\scripts\ctl.bat STOP)
rem RUBY_APPLICATION_STOP
if exist D:\XAMPP\subversion\scripts\ctl.bat (start /MIN /B D:\XAMPP\subversion\scripts\ctl.bat STOP)
if exist D:\XAMPP\jetty\scripts\ctl.bat (start /MIN /B D:\XAMPP\jetty\scripts\ctl.bat STOP)
if exist D:\XAMPP\hypersonic\scripts\ctl.bat (start /MIN /B D:\XAMPP\server\hsql-sample-database\scripts\ctl.bat STOP)
if exist D:\XAMPP\resin\scripts\ctl.bat (start /MIN /B D:\XAMPP\resin\scripts\ctl.bat STOP)
if exist D:\XAMPP\apache-tomcat\scripts\ctl.bat (start /MIN /B /WAIT D:\XAMPP\apache-tomcat\scripts\ctl.bat STOP)
if exist D:\XAMPP\openoffice\scripts\ctl.bat (start /MIN /B D:\XAMPP\openoffice\scripts\ctl.bat STOP)
if exist D:\XAMPP\apache\scripts\ctl.bat (start /MIN /B D:\XAMPP\apache\scripts\ctl.bat STOP)
if exist D:\XAMPP\ingres\scripts\ctl.bat (start /MIN /B D:\XAMPP\ingres\scripts\ctl.bat STOP)
if exist D:\XAMPP\mysql\scripts\ctl.bat (start /MIN /B D:\XAMPP\mysql\scripts\ctl.bat STOP)
if exist D:\XAMPP\postgresql\scripts\ctl.bat (start /MIN /B D:\XAMPP\postgresql\scripts\ctl.bat STOP)

:end

