#!/bin/sh

if [ "$1" = "travis" ]
then
    psql -U postgres -c "CREATE DATABASE final_test;"
    psql -U postgres -c "CREATE USER final PASSWORD 'final' SUPERUSER;"
else
    [ "$1" != "test" ] && sudo -u postgres dropdb --if-exists final
    [ "$1" != "test" ] && sudo -u postgres dropdb --if-exists final_test
    [ "$1" != "test" ] && sudo -u postgres dropuser --if-exists final
    sudo -u postgres psql -c "CREATE USER final PASSWORD 'final' SUPERUSER;"
    [ "$1" != "test" ] && sudo -u postgres createdb -O final final
    sudo -u postgres createdb -O final final_test
    LINE="localhost:5432:*:final:final"
    FILE=~/.pgpass
    if [ ! -f $FILE ]
    then
        touch $FILE
        chmod 600 $FILE
    fi
    if ! grep -qsF "$LINE" $FILE
    then
        echo "$LINE" >> $FILE
    fi
fi
