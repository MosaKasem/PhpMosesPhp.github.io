# PhpMosesPhp.github.io

### Task 1. Explore requirements, example application, and test-cases.
The requirements of the application consists of four use-cases.

Use Cases

For each of the use-cases there are a number of test-cases. The test cases are given in the following format.

    Input, steps to do. In some cases another test-case, if so do the input steps of that test-case.
    Output, things you should observe or not observe if the test-case is successful.
    Image, an image of the result after Input steps are done.

Testing of the application requires two different browsers, and a tool to manipulate cookies, like "firebug".

Test Cases, These are the test cases for the corresponding use-cases

Test Application. This is an example solution for assignment 2. It fulfills all the test-cases above, if your solution works as this you are ok.

Automated tests Application. This is an automated acceptance test system to speed up the testing process. 

### Task 2. Copy the code and get your servers set up.
Now its time to implement the requirements using use-cases and test-cases.
Get the startup code

The assignment will be tested using a Automated unit test application. To allow this we will first copy the interface application for that project on GitHub.

    Download https://github.com/dntoll/1dv610/blob/master/assignments/A2_resources/startup.zip
    On your GitHub account, create a new repository
    Clone that repository
    Add the content of the zip file to your repository, commit and push to origin master
        Unzip the files into your repository
        git add -A .
        git commit -m "first commit"
        git push origin master
    Browse your files on github You should see the files from startup.zip

Get the startup code running locally

You are going to develop locally and make "releases" to a public server. This means you need to setup both a local server and a public server.

    Startup a local PHP server and configure it
    browse to local server(For example http://localhost:8080/ ) and check that you see the correct output with a header of "Assignment 2".
    Test Application With startup code. This is an deployment of the startup code, it does not fulfill more than 5% of the requirements. When you deploy the startup code it should look like this.

Make a release to a public web server

In order to hand in this project you must have a public web-server that is online 24-7. There are many possible solutions

    you could host yourself if you have a public IP-adress and wants to keep a server up and running
    you could buy hosting from a web-hotel
    you could use a free hosting such as http://www.000webhost.com/ (PHP 5.2)

Test your release

    Transfer your files to the server, for example by FTP, SFTP, or git.
    Browse to the server and make sure you see the output of the PHP-scripts
    Go to http://csquiz.lnu.se:25083/index.php and enter your server adress with your user-id
        press Check
        you should get a "Estimated score on assignment: X%." and a LOT of errors

Task 3. Implement the requirements.

    while (you have requirements to implement)
        Implement a requirement
        Test locally using the manual test-cases
        Commit and push to repository
    Release code to server
        Go to http://csquiz.lnu.se:25083/index.php and enter your server adress with your user-id
        Fix problems locally, then release to server and retest
