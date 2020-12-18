
# Player And Teams
I have used Laravel as back-end Php Framework and ( Vue.Js And TailwindCss for front-end ) .
I also used Laravel Sanctum for Authentication. 

Create a client and server application. The client can be implemented in vue JS or React JS.
The server must be implemented using Laravel. The client must communicate with the server
using an API (no Blade templates). 

Create tables in a database which allow to associate a player with a team. Fill the tables with data.

For example:

Player A is part of Team 1
Player B is part of Team 1
Player C is part of Team 2
Player D is part of Team 2

The Vue JS or React JS app should display a table which should contain the following data:

Player Name - Team Name - Actions

Player A       -   Team 1      - Edit Delete      

Implement the actions in order to be able to edit a player or to delete a player.

When editing a player, it must be possible to change the name and the team of the player.

There should be the possibility to add a new player as well.

### things I've Used in this Project
for Backeend:

Routing, Controllers, FormRequests, JsonResources, Database Migration Files, Seeders, Factories, UnitTesting

for Front-end:

VueJs, TailwindCss, Vuex, Vue-Router

### Video Introduction ,I say Definitely have a look at it !
 [Watch Video - Click Here ](https://payam.pro/playerteams.mp4) 

## How to Setup project

- run command : `composer install`
- run command : `npm install`
- run command : `php artisan key:generate`
- change `.env.example` File to `.env`
- set SANCTUM_STATEFUL_DOMAINS below APP_URL in .env file to your domain name. ( like SANCTUM_STATEFUL_DOMAINS=playerteams.test )
- set SESSION_DOMAIN in .env file to your domain name as well. ( like SESSION_DOMAIN=playerteams.test )
- set SESSION_DRIVER in .env file to Cookie . ( like SESSION_DRIVER=cookie )
- run command : `php artisan migrate`

Do one of these 2 steps:

- run command : `php artisan db:seed`, if you want to generate default User for logging in and also some ( Recommended )

or

- run command : `php artisan db:seed --class=UserSeeder`, if you want to generate just a User and add data by your self.

then

- run command : `npm rum watch`
- run command : `php artisan serve`

to run tests you can use this command in terminal (command line):

 `php artisan test`
 
 or
 
 `./vendor/bin/phpunit`

#### UserName And Password For Logging In
Username:
ilove@germany.com

Password:
results.com

### Don't forget
to use Laravel Sanctum for authentication you neeed to set SANCTUM_STATEFUL_DOMAINS below APP_URL in .env file to your domain name.
also change the SESSION_DOMAIN and SESSION_DRIVER as I explained.

# Made By :
Payam GhaderKourehpaz [https://payam.pro](https://payam.pro)
