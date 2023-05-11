# Advanced database and big data - U14440

### Shane Anthony (sa743) & Michael Adelodun (ma617) 
----
## Background

The goal of this project is to develop a PHP/MySQL application that extends the given EMP and DEPT schema with three new tables of our own design, implement the database, and populate it with relevant data. In addition, we need to implement a PHP page that connects to the database in the backend, allows for updating tables (adding a new employee or department), and executing and displaying the results of three SQL queries. The second part of the project involves migrating the database to a MongoDB document database using denormalization techniques and updating the PHP application. The third part requires drawing conclusions from working with both SQL and NoSQL databases.

----
## Implementation
### Part 1
### MySQL Database

Before implementing the MySQL database, we prepared the database schema by normalizing it. Normalization is an important process that helps reduce redundancy and inconsistencies in the data, making it easier to manage and maintain. Once the schema was normalized, we extended it with three new tables that we designed ourselves. These tables included a 'project' table, a 'supervision' table, and a 'works_on' table, and they were designed to capture additional data that we felt was relevant to our application. We then created the corresponding foreign keys to ensure data integrity and populated the tables with relevant data. By extending the schema with new tables, we were able to capture a more comprehensive view of the data and provide more insights into our application. Overall, the backend implementation of the MySQL database was a success, and it allowed us to create a robust and comprehensive database for our application.

### PHP Frontend 

In the frontend of our PHP application, we had to connect to the MySQL database in the backend. To achieve this, we used XAMPP and Apache to create a local web server environment that could run our PHP scripts. Once we were connected to the database, we implemented pages that allowed us to update the tables by adding new employees and departments. These pages were designed to capture all the relevant information required for each table and insert it into the database. Additionally, we implemented pages that displayed the employee and department tables, allowing us to view all the records stored in the database. Finally, we executed and displayed the results of three SQL queries that we designed ourselves. These queries included finding the department with the highest average salary, finding employees hired before 1982, and finding the average salary of all employees. Once implemented, the frontend of our PHP application allowed us to interact with the database and gain insights into the data stored within it.

### Part 2
### MongoDB Database

To migrate our MySQL database to a MongoDB document database, we used denormalization techniques. We reduced the number of tables and simplified the schema so that we only had the employee and department tables. Instead of combining the two tables into a single document, we decided to keep them separate to ensure that departments could be kept unique. We then designed a JSON document that represented the data stored in the employee and department tables. This document included all the relevant fields and captured the necessary relationships between the two tables. We then implemented the new database on MongoDB, using the JSON document as a guide. This involved creating collections for the employee and department tables and populating them with the data stored in the MySQL database. Overall, our migration choices allowed us to create a more efficient and streamlined database on MongoDB, while still preserving the integrity of the data.

### PHP Frontend

In the front end (PHP), we updated our PHP page to connect to the new MongoDB database. We made sure that we could execute and display the results of 2 Mongodb/MQL queries. To achieve this, we modified our existing PHP page to use the MongoDB PHP Library. We then created two new queries using the aggregate method that MongoDB provides. The first query finds the number of employees in each department and displays the results as an unordered list. The second query finds the number of projects that each employee works on and displays the results as an unordered list. The results of both queries are displayed on the same page as the employee and department tables. The new queries are executed by using the aggregate method of the MongoDB PHP Library, passing in an array of pipeline stages that define the query. The results are then iterated over and displayed using PHP's echo statement, which outputs HTML.

----
## Results

The migration from MySQL to MongoDB involved some changes to the database schema and the backend and frontend implementations. With the MySQL database, we had to prepare the database by normalizing it, but with the MongoDB database, we denormalized the data to produce a JSON document that is more efficient for querying. We migrated the MySQL data to MongoDB by creating new collections for the employee and department tables and inserting the data into the appropriate collections. In the frontend, we updated the PHP page to connect to the new MongoDB database and executed two MQL queries to display the number of employees by department and the number of projects by employee. Overall, the migration was successful and we were able to leverage MongoDB's capabilities to create a more efficient and effective database for our needs.

----
## Conclusion

Based on our implementation, we can draw some conclusions regarding working with SQL and NoSQL databases. Firstly, it is essential to design and normalize the database carefully, especially when working with SQL databases, as this helps avoid data redundancy and inconsistencies. However, this process can be time-consuming and challenging to maintain when scaling up. Secondly, NoSQL databases, such as MongoDB, offer flexibility and scalability, making them ideal for handling large and complex data sets. Additionally, using denormalization techniques can further enhance performance, but it should be done carefully to avoid data inconsistencies. Finally, connecting to databases and executing queries in both SQL and NoSQL databases requires programming skills, and we need to choose the appropriate tools and libraries to ensure smooth integration. Overall, it is important to understand the strengths and weaknesses of both SQL and NoSQL databases and choose the appropriate one based on the application's requirements.

----
## Tasks

In this task section, it is worth mentioning that our team consisted of Shane and Michael, who collaborated to complete the project. For task 1, Shane worked on the front end, while Michael worked on the back end. For task 2 Shane worked on both back end and front end. Shane also wrote the report and produced the video.

----
## Video



https://github.com/Shane-Anthony/AdvancedDatabases/assets/78310026/765ccce2-6bd8-49b5-8817-4446981dccfc


----
## Link to Repo

https://github.com/Shane-Anthony/AdvancedDatabases

----
