#!/bin/bash

echo Moviendo a servidor remoto
echo no estás en casa!
echo git remote add origin git@mundorenovable.sytes.net:socialwin.git

git remote rm origin
git remote add origin git@mundorenovable.sytes.net:socialwin.git

