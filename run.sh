#!/bin/sh

./api/bin/console server:run &
cd admin && yarn run start &
cd graphs && yarn run dev 

