# mplanyii2

https://www.yiiframework.com/wiki/799/yii2-app-advanced-on-single-domain-apache-nginx - For using on single domain

https://github.com/wbraganca/yii2-dynamicform - Dynamic Form Client Side

https://www.yiiframework.com/doc/guide/2.0/en/input-form-javascript 

https://github.com/yiisoft/yii2-httpclient - Yii2 HTTP Client
https://www.yiiframework.com/doc/api/2.0/yii-behaviors-sluggablebehavior - 
https://www.yiiframework.com/extension/yii2-widget-fileinput - 
https://github.com/yiisoft/yii2-faker - 
https://www.yiiframework.com/wiki/2568/jwt-authentication-tutorial - JWT Token
https://github.com/yii2mod/yii2-swagger - API Documentation creation
https://github.com/hafriedlander/phockito - Phockito - Mockito for PHP
Splunk and Kabbana - Log checking tool - Required when we have done deployment on AWS or Load Balancing sceanrios
Log4J - Can use for log analysis in local server
 
DevOps - TeamCity or Puppet and Jenkins - For Automatic Code deployment -
Docker [Created Image need to be uploaded on server] and Kubernetes - 
Zipkin Server or Jaeger - Is an application that monitors and manages the logs of your Spring Boot application.  
isolt - 

https://www.yiiframework.com/doc/api/2.0/yii-filters-cors - Yii2 CORS
https://www.yiiframework.com/wiki/2568/jwt-authentication-tutorial - JWT Authentication Tutorial

https://learning.postman.com/docs/designing-and-developing-your-api/mocking-data/setting-up-mock/ - Setting your local machine localhost API - It will become accessible for outside server

https://github.com/femibiwoye/ - REST API Tutor [check gradely-api, digital-advert, etc repo]

https://www.freecodecamp.org/news/learn-flutter-full-course/

https://www.youtube.com/watch?v=j-LOab_PzzU - Flutter Hindi
https://www.youtube.com/watch?v=THCkkQ-V1-8 - The Best Flutter Bloc Complete Course - Visualise, Understand, Learn & Practice Bloc Concepts

https://medium.com/barisnurlu/flutter-how-to-create-hamburger-menu-6018b10741ff

RBL Bank API - For creating mutual fund portal - https://developer.rblbank.com/
https://developer.icicibank.com/#/index - ICICI Bank APIs.
https://business.paytm.com/docs - PayTM API
mantra mfs100 - https://www.mantratec.com/Drivers-SDK - Mantra Device for finger print scanning.
Aadhaar Enabled Payment System (AePS), Sec2Pay India E-services Private Limited (PAN verification API for eKYC), 

Search AWS Tutorial on Web

MariaDB error : “InnoDB: Setting file 'C:\xampp\mysql\data\ibtmp1' size to 12 MB."
Solution: 
Step 1. Open xampp -> htdocs -> MySQL -> data
Step 2. Delete all the files (Don’t touch any of the folders) except for
the following files: aria_log.00000001, aria_log_control,
ib_buffer_pool, ib_logfile0, ib_logfile1, ibdata1, ibtmp1,
multi-master.info, my.ini, mysql.pid, mysql_error.
Step 3. innodb_log_file_size=100M - Change this in my.ini file
Step 4. Restart server

OR

I went into my xampp/mysql/data folder and deleted the "multi-master.info" file, as well as all files which began with "master-" . I shut down all instances of XAMPP Control Panel, restarted it, and now MySQL loads properly.he also found a Stack Overflow thread on the error reported in the MariaDB code above, if it can help (it's for Xampp 3.2.1, but it likely still applies): https://stackoverflow.com/questions/50999358/xampp-mysql-not-starting-mysql-not-starting-on-xampp-3-2-1-version.
------------------------------------------------------------------------------------------------------------------------------------------------------------------
curl -i -H "Accept:application/xml" "http://localhost:94/v1/posts"

curl -i -H "Accept:application/json" "http://localhost:94/v1/posts"

curl -i -H "Accept:application/json" -X DELETE "http://localhost:94/v1/posts/1"

curl -i -H "Accept:application/xml" "http://localhost:94/v1/posts"

https://www.udemy.com/course/learning-path-yii-2-design-applications-with-php/ - Using Flash Messages, Multiple DB Connections, Rate Limiting,  Knowledge of blocks, Decorators, Partial View, Creating Widgets, Creating Modules, Fragmenting, Page Caching, and HTTP Caching. Unit Testing with Codeception, PHPUnit, Atoum, Behat. "Replication and Read-Write Splitting"

