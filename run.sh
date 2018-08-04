#!/bin/sh

./api/bin/console server:run &
cd admin && yarn start

