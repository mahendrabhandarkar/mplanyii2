# mplanyii2

https://www.yiiframework.com/wiki/799/yii2-app-advanced-on-single-domain-apache-nginx - For using on single domain

https://github.com/wbraganca/yii2-dynamicform - Dynamic Form Client Side

https://www.yiiframework.com/doc/guide/2.0/en/input-form-javascript 

https://github.com/yiisoft/yii2-httpclient - Yii2 HTTP Client
https://www.yiiframework.com/doc/api/2.0/yii-filters-cors - Yii2 CORS
https://www.yiiframework.com/wiki/2568/jwt-authentication-tutorial - JWT Authentication Tutorial

https://learning.postman.com/docs/designing-and-developing-your-api/mocking-data/setting-up-mock/ - Setting your local machine localhost API - It will become accessible for outside server

https://github.com/femibiwoye/ - REST API Tutor [check gradely-api, digital-advert, etc repo]

https://www.freecodecamp.org/news/learn-flutter-full-course/

https://www.youtube.com/watch?v=j-LOab_PzzU - Flutter Hindi

https://medium.com/barisnurlu/flutter-how-to-create-hamburger-menu-6018b10741ff

RBL Bank API - For creating mutual fund portal - https://developer.rblbank.com/
https://developer.icicibank.com/#/index - ICICI Bank APIs.
https://business.paytm.com/docs - PayTM API
mantra mfs100 - https://www.mantratec.com/Drivers-SDK - Mantra Device for finger print scanning.

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
