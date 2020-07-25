
Installation instructions
×
1. Extract the archive and put it in the folder you want

2. Run cp .env.example .env file to copy example file to .env
Then edit your .env file with DB credentials and other settings.

3. Run composer install command

4. Run php artisan migrate --seed command.
Notice: seed is important, because it will create the first admin user for you.

5. Run php artisan key:generate command.

6. If you have file/photo fields, run php artisan storage:link command.

7. If you run a SaaS project, add your Stripe credentials and plans: read more here

And that's it, go to your domain and login:

Username:	admin@admin.com
Password:	password

For more information, potential errors and related links, you can read more detailed installation guide here

https://helpdocs.quickadminpanel.com/using-generated-code/download-code-and-install-your-web-server


