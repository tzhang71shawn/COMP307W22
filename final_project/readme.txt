Project Member: Aichen Jin (260862852), Yao Lin (260917196), Tian Zhang (260822562)
Mimi directory url Used: https://www.cs.mcgill.ca/~ylin123/final_project/landing.html

Testing browser: Chrome, Microsoft Edge
Database: SQL

Accounts (Username,password):
SysOp: jv,123
Admin: db,123
Prof: pp,123
TA: ta1,123
Student: s1,123


Green Area:
Landing&Login: (Aichen Jin, Yao Lin) The landing page contains user login and an hyper link to register page. 
                When logging in, the information of the identity will be store into the cookies 
                (we were using session, but it was curshed) By submitting logging, it will call login.php
Register: (Aichen Jin, Yao Lin) Register page will call register.php to store newly created user.
            It will then add the new user to SQL
Logout: (Tian Zhang) Logout calls loginout.php to terminate the session.
Dashboard: (Aichen Jin) The dashboard includes the portal to all four different webpage (TA admin, TA manage, Rate TA, Sysop Task)
            Using the data stored inside the cookies, dashboard will show options selectively based on the identity.
            This also includes responsiveness.
Rate a TA: (Tian Zhang) After click submit, it will call rateAction.php.


Orange Area: (Aichen Jin)
Import TA Cohort: By confirming the import, it will call importTACohort.php to import the 2 csv file,
                    it will also display the information of CourseQuota.csv by a table including newly
                    calculated "Enrollment/TA_quota".
TA Info/History: (Aichen Jin, Yao Lin) By selecting a TA, it will call TAinfo.php to find all relative field
                    about the TA selected, output the result (empty field will also have explaination message)
                    If the TA selected has rating, it will display the average rating score.
Course TA History: By selecting a TA, it will call TAhis.php, which will then display all the course (by term) and assigned hour
                    for such TA. By selecting a Course, it will call coursehis.php, show all TA for this course (with term and assigned hour)
Add TA to Course: By entering information, we call importTA.php to import TA.
Remove TA from Course: By entering information, we call deleteTA.php to delete TA.


Blue Area: (Yao Lin)
Select Course: We make a dropdown list to choose term and course. After submit, it will call course.php, 
                which shows OH,PerfLog and WishList related to the specific term and course in a new Page.
                Also, performance log and wish list blocks will be hidden if the user is a TA instead of a Prof.
Office Hour/Responsibilities Sheet: Given an date and time selection table to store office hour, and two text boxes to enter the office
                hour location and the duty. It will call officeHourAction.php to store the data into our OH table in 
                database.
Prof's TA Performance Log: Only prof can see this block. It has a dropdown list to select a TA and write a comment for him. Then
                it will call perfLogAction.php to store information into the perfLog table.
TA Wishlist: Only prof can see this block. Prof can enter their name and select the TA he wishes to have next term. The data
                will be stored into the wishlist table after call wishLAction.php.
Dashboard: Provide an button for you to return to the dashboard.


Yellow Area: (Tian Zhang)
Manage Users: The three forms call editUser.php, addUser.php, deleteUser.php.
Import Prof+Course: The two forms call importCourse.php and importProf.php,
                    which read and display importProf.csv and importCourse.csv and put them into database.
Manual Add Prof+Course: The forms call addProf.php and addCourse.php and manually store new data in database.