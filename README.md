# Laravel Project Setup with Sail and Docker

## Getting Started
1. Step 1: Clone the Repository <br>
First, clone the repository to your local machine: <br />
```
git clone https://github.com/baglanz/nomad-test-task
```
```
cd nomad-tesk-task
```


2. Step 2: Configure Environment Variables <br>
Copy the example environment file to create your own `.env` file:
```
cp .env.example .env
```

Open the `.env` file and update the necessary database settings: <br>

_DB_CONNECTION=mysql_ <br>
_DB_HOST=mysql_ <br>
_DB_PORT=3306_ <br>
_DB_DATABASE=nomad_ <br>
_DB_USERNAME=sail_ <br>
_DB_PASSWORD=password_ <br>

3. Step 3: Install Dependencies <br>
Install the project dependencies using Composer:
```
composer install
```

4. Step 4: Set Up Docker Containers <br>
Run the following command to start the Docker containers using Laravel Sail:
```
./vendor/bin/sail up -d
```


5. Step 5: Generate Application Key <br>
Generate the application key, which is used for encryption:
```
./vendor/bin/sail artisan key:generate
```

6. Step 6: Run Database Migrations <br>
Run the database migrations to set up your database schema:
```
./vendor/bin/sail artisan migrate
```

7. Step 7: Populate the database with seeder (optional). <br>

If you need to populate the database with seeder, run the seeder command:

```
./vendor/bin/sail artisan db:seed
```

This way you will get a test user with the following data: <br> email - `test@example.com` <br> password - `password`


### Accessing the Application
Your Laravel application should now be up and running. You can access it in your web browser at http://localhost:8080 (or the port you configured in your `.env` file). <br>


### Stopping the Containers
To stop the Docker containers, use the following command:
```
./vendor/bin/sail down
```
