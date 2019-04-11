# Symfony 4

Run:

```
composer install
```


**Configure the the .env File**

First, make sure you have an `.env` file (you should).
If you don't, copy `.env.dist` to create it.

Next, look at the configuration and make any adjustments you
need - specifically `DATABASE_URL`.

**Setup the Database**

Again, make sure `.env` is setup for your computer. Then, create
the database & tables!

```
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

If you get an error that the database exists, that should
be ok. But if you have problems, completely drop the
database (`doctrine:database:drop --force`) and try again.

**Start the built-in web server**

You can use Nginx or Apache, but the built-in web server works
great:

```
php bin/console server:run
```

Now check out the site at `http://localhost:8000`

Have fun!

## Somebody Has To

Somebody has to go polish the stars,
They're looking a little bit dull.
Somebody has to go polish the stars,
For the eagles and starlings and gulls
Have all been complaining they're tarnished and worn,
They say they want new ones we cannot afford.
So please get your rags
And your polishing jars,
Somebody has to go polish the stars.

Shel Silverstein

## A Space Riddle!

> I'm not white and fluffy, but pieces of me *do* orbit the sun. What am I?

**Answer**: The Oort Cloud!


```
 docker run --rm --interactive --tty -v ${PWD}:/app \
-u $(id -u):$(id -g) --link mysql01:db\
 -e COMPOSER_HOME=/app/composer \
 -w /app nmolleruq/phpcomposer:7.2
 
 docker run --rm -d --name web01 -v ${PWD}:/app \
 -u $(id -u):$(id -g) --link mysql01:db \
  -e COMPOSER_HOME=/app/composer -p 8000:8000  \
  -w /app nmolleruq/phpcomposer:7.2 \
  php bin/console server:run 0.0.0.0:8000
  
 docker stop web01
``` 

## Symfony forms


