#!/bin/bash
git add .
git commit -am "auto commited"
git push heroku master
git push -u origin master
heroku open