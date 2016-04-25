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


#### Resources

We use the frameworks, modules, or plugins from the sources listed below.  The
copyright and ownership are each of their own respective owners.  We are not
the owner of any of the resource below and only using them to incorporate into
this project to demonstrate the CI framework for this course.

1.  CodeIgniter Framework: https://codeigniter.com/
2.  Prism code highlighter: http://prismjs.com/
3.  jQuery: https://jquery.com/
4.  CKEditor: http://ckeditor.com/
5.  Bootstrap: https://getbootstrap.com/
6.  .htaccess rewrite: https://www.codeigniter.com/userguide3/general/urls.html
7.  Bootstrap United theme: https://bootswatch.com/
