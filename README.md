1. Install <a href="docker">docker</a>. 
2. Pull Project 
3. From your project directory, start up your application by running <pre>docker-compose up</pre> 
4. Open terminal and run open terminal and run <pre>docker exec -it php_container_id /bin/sh</pre> 5. Then run the migration <pre>php artisan migrate</pre>
