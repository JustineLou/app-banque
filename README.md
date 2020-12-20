# Symfony banking application

This banking application has been made as part of a student project for which I used the symfony framework. Here the application main features : 
- Allow an administrator to create and manage users 
- Allow an administrator to create, edit, show and delete a user's bank account
- Allow an user to check his bank account, add beneficiaries and to hand transactions

## Install

Put your database connection informations :  
Update the line 32 of the ```.env``` file to put your database connection informations

Start the symfony server :
```symfony server:start```

Create the database :  
```php bin/console doctrine:database:create```

Make the migrations :  
```php bin/console make:migration```
```php bin/console doctrine:migrations:migrate```

Load the fixtures :  
```php bin/console doctrine:fixtures:load```

## Usage

The fixture provided you three accounts.

One administator account :

```username : admin```  
```password : admin```

Two user accounts :

```username : user1```  
```password : user1```

```username : user2```  
```password : user2```

## Documentation
Symfony documentation : <a> https://symfony.com/doc/current/index.html </a>

