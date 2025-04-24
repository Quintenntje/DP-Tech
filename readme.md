# DP-Tech

author: Quinten Claes , Alessio Depaepe
date: 30-05-2023

refactor: Quinten Claes

## Info
DP-tech is a school project I made for my last year in middle school.
And It was made very quickly what made the code very messy and not very readable.


### How to Use

1. Install the required libraries:
   ```bash
   composer install
   ```
   
2. Start the docker containers:
   ```bash
    docker-compose up
    ```
   
3. Run the migrations:
   ```bash
   ./vendor/bin/doctrine-migrations migrate

   ```
4. Go to the nginx server:
   ```bash
   http://localhost:43000
   ```