@echo off
TITLE Upload Project to Git Repository
COLOR 0A

echo ========================================================
echo       Starting Project Upload to Git Repository
echo ========================================================
echo.

:: 1. Stage all new and modified files
echo [1/3] Staging all files...
git add .
echo.

:: 2. Prompt the user for a custom commit message
set /p commit_msg="Enter commit message (Press ENTER for default 'Automated update'): "
if "%commit_msg%"=="" set commit_msg=Automated update

echo.
echo [2/3] Committing with message: "%commit_msg%"
git commit -m "%commit_msg%"
echo.

:: 3. Push to the remote repository
echo [3/3] Pushing to remote repository (origin main)...
:: Change 'main' to 'master' on the next line if your default branch is master
git push origin main
echo.

echo ========================================================
echo                     Upload Complete!
echo ========================================================
pause