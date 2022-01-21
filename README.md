# simpleapi
A simple API with login frontend to allow users to create an API key, and then make POST and GET requests to API endpoint. Made with Laravel as a personal training project.

# How to use
- Serve app and register, login.
- Generate API key
- Get API key and save
- cURL or use any request generator:
  - GET /api/test (no parameters)
    - Returns "It works" to indicate everything works fine
  - GET /api/test/{id} (requires "apikey")
    - Returns a string "content" according to respective id. Populate/seed the "test" table to test this easily.
  - POST /api/test (requires "content" and "apikey")
    - Stores the "content" string into the database. It does not store the apikey and/or credentials.
    
- Revoke the key by logging in and press revoke.

# Documentation

Almost all DB operations are made through the `TestController` which uses the `Test` model. Data is stored in `test` table.<br /><br />
You can alter the actions of API calls by changing the routes and the classes in `TestController`<br /><br />
API Key checking is done through "EnsureTokenValid" middleware, which is callable by "apicheck".<br /><br />
Auth scaffolding is installed through bootstrap using `php artisan ui bootstrap --auth`<br /><br />
Other than mentioned is left at default. This is made to help myself understand laravel.
