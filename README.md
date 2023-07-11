# Installation guide

### Prepare the project

- Clone the repo :<br>
`git clone git@github.com:O-clock-Griffon/projet-13-emotions-pictures-back.git emotions-pictures-back`

- Install dependencies :
`composer install`

- Create `.env` file by copying `.env.example`<br><br>

### Set up environments variables

#### *Optionnal :*
_You can add the following alias to your `~/.zshrc` or `~/.bashrc` file :<br>
`alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'`<br><br>
If you, don't, just replace `sail` with `vendor/bin/sail` in the next commands._<br><br>

- If needed, modify the default port values.

- Launch build and run containers :<br>
`sail up -d --build`

- Generate JWT key :<br>
`sail artisan jwt:secret`<br>
(Fill the `JWT_SECRET` key in `.env` file with the command result if not done automaticaly)

- Generate the encryption key for the Database :<br>
`sail artisan ciphersweet:generate-key`<br>
Fill the `CIPHERSWEET_KEY` key in `.env` file with the command result.

- Fill the `OPENAI_API_KEY` key in `.env` file.

- Fill the `TMDB_API_TOKEN` key in `.env` file.<br><br>

### Run the app

- Launch Database migrations :<br>
with seeders : `sail artisan migrate --seed`<br>
without seeders : `sail artisan migrate`

- Restart the containers : `sail up -d`

You can now visit `http://localhost:{APP_PORT}/graphiql` to use the GraphQL dev server.<br>

Or, you can use `http://localhost:{APP_PORT}/graphql` to make any request.<br>

If you've seed your Database, you already have 4 users registered : `vincent@test.com`, `philemon@test.com`, `ludovic@test.com` and`julien@test.com`. Their default password is `MyPassword1!`.<br><br>

### Utils

- Start a Bash session within the application's container :<br>
`sail shell`

- Reset the Database :<br>
from your host : `sail artisan migrate:fresh --seed`<br>
from your PHP container : `php artisan migrate:fresh --seed`

- Remove your containers : `sail down`<br>
(Add `--volumes` to delete volumes too)

- Share your server : `sail share`

- Run tests : `sail artisan test`
