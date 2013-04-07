#!/bin/bash

echo Moviendo a servidor local
echo estás en casa! 
git remote rm origin
git remote add origin git@192.168.1.33:socialwin.git

