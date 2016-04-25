## Installation instruction
Below are example install instruction of the demo project on a newly install
WAMP 2.4 64 bit server.

1.  Go into the webroot directory  such as c:\wamp\www

2.  Run git clone to bring the project down:
    git clone https://github.com/ddangcsu/cpsc431-demo.git ./project

3.  Login to phpmyadmin http://localhost/phpmyadmin
        a.  Sign in if needed as root
        b.  Click on Import tab
        c.  Select choose File and pick db/demo.sql file inside the project

    This will create the database called demo
    It will also create a user demo/demo

4.  While in phpmyadmin, select the Users tab and remove the two default Any
    users as they will prevent the application from authenticate the demo
    user with password.

5.  From the wamp server menu, select Apache > Apache modules
    Enable the rewrite_module (which is unchecked by default)

    WAMP will restart the server.

6.  Run the project by typing in:  http://localhost/project
