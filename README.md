To run the PHP server, simply execute `index.php`. When you access the home page, it will automatically fetch all the necessary data. From there, you can choose the options to display the desired information. For efficiency, subsequent requests will present the data without querying the external database again.

If you need to re-fetch data from the external database, just reload the home page.

**Note:** This program connects to a local database, so ensure that you enter your local database credentials in `classes/database.php` to establish the connection and save the external data into your local database.
