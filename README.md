MPWEB-Frameworks-Film-Api
================
Aplicación de Film-Api desarrollada en Symfony 3.2 
con Arquitectura Hexagonal 


Primero debemos crear nuestra BD

> create database filmapi
> execute before 

Generamos las dependencias 
> composer install

Mapiamos las entidades
> php bin/console doctrine:schema:update --force

Encendemos el servidor
> php bin/console server:run


#Hacer uso de los CRUD por consola:

Actor

- Create Actor Command:

> php bin/console app:create-actor-command "Nombre Actor"

- Update Actor Command:

> php bin/console app:update-actor-command "Id Actor" "Nombre Actor"

- List Actor Command:

> php bin/console app:list-actor-command

- Delete Actor Command:

> php bin/console app:delete-actor-command "Id Actor"

Film

- Create Film Command:

> php bin/console app:create-film-command "Nombre Actor"

- Update Film Command:

> php bin/console app:update-film-command "Id Actor" "Nombre Actor"

- List Film Command:

> php bin/console app:list-film-command

- Delete Film Command:

> php bin/console app:delete-film-command "Id Actor"


#Hacer Uso de las APIS

Actor 

recomendable probar con postman
- List Actor Api:

> http://127.0.0.1:8000/actor/

petición GET(puede probarse desde el navegador)

- Create Actor Api:

> http://127.0.0.1:8000/actor/

petición POST

- Update Actor Api:

> http://127.0.0.1:8000/actor/

petición PUT

- Delete Actor Api:

> http://127.0.0.1:8000/actor/

petición DELETE

Film

recomendable probar con postman
- List Film Api:

> http://127.0.0.1:8000/film/

petición GET(puede probarse desde el navegador)

- Create Film Api:

> http://127.0.0.1:8000/film/

petición POST

- Update Film Api:

> http://127.0.0.1:8000/film/

petición PUT

- Delete Film Api:

> http://127.0.0.1:8000/film/

petición DELETE