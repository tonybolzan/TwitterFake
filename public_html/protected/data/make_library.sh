#!/bin/bash
mv sys.db sys.db.old
sqlite3 sys.db < sys.sql
