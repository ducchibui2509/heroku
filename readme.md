# SHARE SQUARE Project

## I. Tasks Status

| Task Name                                                                             |    POC     | Due Date |   Status  |
| --------------------------------------------------------------------------------------|:----------:| :-------:|:---------:|
| Setup Laravel Framework | Kien       |Week 8    |Done      |
| Setup Admin Landing page and layout| Kien       |Week 8    |Done      |
| Admin: CRUD for Category| Kien       |Week 8    |Done      |
| Admin: CRUD for Post| Kien       |Week 8    |Done      |
| Admin: CRUD User| Kien       |Week 8    |Done      |
| Admin: CRUD Role| Kien       |Week 8    |Done      |
| Admin: Website configuration| Kien       |Week 8    |Done      |
| Admin: Website configuration| Kien       |Week 8    |Done      |
| User registration - basic| Kien       |Week 8    |Done      |
| User Authentication - basic| Kien       |Week 8    |Done      |
| User Authorization - basic| Kien       |Week 8    |Done      |
| Homepage layout| Chi       |Week 8    |Done      |
| Merge Home page layout to laravel template| Kien       |Week 8    |Done      |
| Update Readme.md file to guideline on how to setup project on local environment| Kien       |Week 8    |Done      |
| Define commit process and update the process to Readme.md| Kien       |Week 8    |Done     |
| Add UI mockup for advanced search page |Tuong| week 8 | Done|
| Individual Feature Pages(Car,RealEstate,Jobs) |Chi| Week 9 | In Progress|
| Create Add post form |Chi| week9 | In Progress|
| Integrate and structure main layout using **blade** template  |Kien| week 09 | Done|
| Create User Main Layout (Including Dynamic Menu Side Bar and Navigation Bar) |Kien| Week09 | Done|
| Create User Dashboard Layout (Statistic and Charts) |Kien| Week09 | Done|
| Create User Profile Layout |Kien| Week09 | Done|
| Create User Public Posts Layout |Kien| Week09 | Done|
| Create User Pending Post Layout |Kien| Week09 | Done|
| Create User Closed Post Layout |Kien| Week09 | Done|
| Create User Favorite Post Layout|Kien| Week09 | Done|
| Create User Recent View Post Layout |Kien| Week09 | Done|
| Create Post Detail layout (include rating, comments) |Pradeep| Week 9 | In Progress|
| Create Create Post layout |Pradeep| Week 9 | In Progress|
| Create API Endpoint for post |Kien Tran| Week 11 | Done|
| Create database mirgration and dummy data for comments, ratings, favorite, post images-list |Kien Tran| week11 | Done|
| Create database seeder to comments, ratings, views, user tables |Kien Tran| week11 | Done|
| Complete User Dashboard page include charts and statistic|Kien Tran| week11 | Done|
| Create common search function for search post |Kien Tran| week11 | Done|
| Create MyPostController which handle all public, pending, draft, close, favorite post |Kien Tran| week11 | Done|
| Create Seeder for favorite post |Kien Tran| week11 | Done|
| Merging home page and details page using Laravel |Chi Bui| week11 | Done|
| Add Post via home page |Chi Bui| week11 | Done|
| Update Post in details page |Chi Bui| week11 | InProgess|
| Create Search Post helper function for post searching, filtering purpose include paging |Kien Tran| week12 | Done|
| Create Post List layout for public, pending, draft, close, favorite |Kien Tran| week12 | In Progresss|
| Do pagination for all the page and search on home page and add validation|Chi Bui| week13 | Done|
| Message functionality - CRUD and UI|Tuong| week13 | Done|
| Advanced Search functionality|Tuong| week13 | Done|
| Deploy php application on Heroku at https://still-hamlet-01040.herokuapp.com/ |Chi| week14 | Failed|
|Failed to import the local data to clearDB due to error: ERROR 1071 (42000) at line 25: Specified key was too long; max key length is 767 bytes. All of our Data type VAR CHAR CHARACTER SET utf8mb4 is imcompatible|
## II. How to setup project on local environment

Following is step to setup project on local environment:

1. Install Composer : https://getcomposer.org/ .   
   Run following comment to make sure you have composer in your environment. Please pay attention on version .   
   `composer -v` .                 
   `Composer version 1.9.0 2019-08-02 20:55:32` .  
2. Install NodeJS: https://nodejs.org/en/ .   
   * Check version by command `node -v`    
   `v12.11.1`
    * Check laravel is installed by command `laravel` .  
    `Laravel Installer 2.1.0`
3. Clone the project to a local folder (ex: C:\Project): https://github.com/2019-fall-ite-5330-0na/project-user-interface-sharesquare.git
4. Use command line to go to C:\Project folder `cd C:\Project`
5. Install Composer Dependencies: `composer install`
6. Install NPM Dependencies: `npm install`
7. Generate an app encryption key: `php artisan key:generate`
8. Create an empty database for our application in MYSQL Database: `ex: project`
9. In the .env file, Edit database information to connect to the database according to your database configuration. You can file .env file in the project root folder .  
   * `DB_CONNECTION=mysql` 
   * `DB_HOST=127.0.0.1`  
   * `DB_PORT=3306`
   * `DB_DATABASE=project`
   * `DB_USERNAME=root`
   * `DB_PASSWORD=root`

10. Migrate the database: It means create database table in your database based on migrate feature of laravel
  * In project folder, run command: `php artisan migrate`
11. Add dummy data to database: 
  * In project folder, run command: `php artisan db:seed`
12. Run the project
 * In project folder, run command: `php artisan serve`
13. Access the website: http://127.0.0.1:8000
14. Access the admin page: http://127.0.0.1:8000/admin (email: admin@admin.com/pass: password)
15. Enjoy :)

## III. The project to work with github .  
   We are working in the project where serveral members will coding and commit contemporarily. As the result, code conflict will happen and one member might overide the code of other member when he commit if we don't have a process of how we commit code to github. Fortunately, github gives us the feature to handle it. Please strickly compliance with following process when working in the project
   1. Go to github website of our repository. Create a new branch from the master branch and named with your task name.
   2. Go to local environment, pull the repository
   3. Switch to your new created branch
   4. Coding for your task in your branch
   5. **Before commit your code: merge the master branch to your branch then test whether your code work normally**
   6. Commit code to your branch
   7. Push the code to github repository
   8. Go to github website to create a **pull request** to merge your branch to the master branch.
   9. Assign the pull request to other member of the team for review and merge code.
   10. To **reviewer**, please review the code then -> merge master branch to the branch being merged by the pull request. If there is any conflict, please ask member who created the pull request to resolve the conflict. If there is not any conflict, please merge the pull request.
