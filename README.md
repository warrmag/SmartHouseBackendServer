#### About
Build on top of symfony framework with Doctrine ODM+ORM
This is proof-of-concept how to create CQRS+EventSourcing app

#### Requirements
- Docker https://docs.docker.com/
- Composer https://getcomposer.org/

#### Installation:
1. Check ```.env.dist``` for example configuration
2. ```$ composer install```
2. You can change basic port mapping in ```docker-composer.yml```
3. ```$ docker-composer up --build```
4. That's all Happy coding!


#### Enable mongo
1. To enable mongoDB you have to uncomment in docker-compose container configuration, and in WEB container you have to uncomment dependency,
2. Uncomment entrypoint.sh for php 
3. Add some odm to live easier ;)
