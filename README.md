<h3>Project description</h3>


<h3>1. Instructions to run the project</h3>
<h3>Getting started</h3>
Import sql file into a local database tool, check if the database name is matched with dbh.php in backend folder <br>
Unzip the download file and move it to the path :\xampp\htdocs if you are using xampp as PHP development environment <br>
Go to http://localhost/comp354Project in your web browser to access the frontend

<h3>Log in with the test user</h3>
Username: user123 <br>
Password: 123456 <br>
or feel free to create you own account to try out

<h3>Database setup</h3>
dump-bookappdb-202211281538 is the sql file to set up the database <br>
create a local database called bookappdb, then import the sql file into the database <br>

<h3>2. Dependencies used in the project</h3>
- users have to login to use the features<br>
- go to home page to see all the books<br>
- recommendation based on reading shelf. If user is not reading, will not recommend books<br>
- after account first created, all shelves are initially empty<br>

<h3>3. Screenshots of the project</h3>

login

![](https://github.com/itshisher/comp354Project/blob/main/IMG/login.jpg?raw=true)

after logging out

![](https://github.com/itshisher/comp354Project/blob/main/IMG/logout.jpg?raw=true)

error case: no info entered when loggin in, error message will pop up

![](https://github.com/itshisher/comp354Project/blob/main/IMG/login_blank.jpg?raw=true)

error case: wrong password when loggin in, error message will pop up

![](https://github.com/itshisher/comp354Project/blob/main/IMG/login_wrong_password.jpg?raw=true)

error case: signup password not matching, error message will pop up

![](https://github.com/itshisher/comp354Project/blob/main/IMG/signup_wrong_password.jpg?raw=true)

error case: signup username taken already, error message will pop up

![](https://github.com/itshisher/comp354Project/blob/main/IMG/signup_duplicate_username.jpg?raw=true)

 reading shelf: HERE YOU CAN CHECK FOR THE BOOKS CURRENTLY UNDER READING To fluidly change books between shelf, click on buttons in blue. Book will be deleted from reading, and added to other shelf (except for favorite, not deleting but added to favorite shelf)

![](https://github.com/itshisher/comp354Project/blob/main/IMG/reading.jpg?raw=true)

to read shelf: HERE YOU CAN CHECK FOR THE BOOKS YOU ARE GOING TO READ IN THE FUTURE same behaviour like other shelves you can switch between shelves or add to favorite

![](https://github.com/itshisher/comp354Project/blob/main/IMG/to_read.jpg?raw=true)

read shelf: HERE YOU CAN CHECK FOR BOOKS THAT ARE ALREADY READ same behaviour like other shelves you can switch between shelves or add to favorite

![](https://github.com/itshisher/comp354Project/blob/main/IMG/read.jpg?raw=true)

did not finish shelf: HERE YOU CAN CHECK FOR BOOKS THAT ARE NOT FINISHED same behaviour like other shelves you can switch between shelves or add to favorite

![](https://github.com/itshisher/comp354Project/blob/main/IMG/not_finish.jpg?raw=true)

sort by genre dynamic button: YOU CAN CHECK ALL THE BOOKS AVAILABLE IN OUR SYSTEM there is a sort by genre button, click on it the button disappear, and books will be sorted on the main page

![](https://github.com/itshisher/comp354Project/blob/main/IMG/login.jpg?raw=true)

![](https://github.com/itshisher/comp354Project/blob/main/IMG/sort_by_genre.jpg?raw=true)

favorite: HERE ARE THE BOOKS FAVORITED BY YOU if the favorite button is clicked on any shelf, book will appear in favorite shelf

![](https://github.com/itshisher/comp354Project/blob/main/IMG/favorite.jpg?raw=true)

unfavorite: there is an unfavorite button, click on it the book will be deleted from favorite shelf

![](https://github.com/itshisher/comp354Project/blob/main/IMG/Unfavorite.jpg?raw=true)

recommendation: HERE YOU CAN FIND BOOKS WE RECOMMEND TO YOU what users normally read, same type of book will be recommended based on reading shelf

![](https://github.com/itshisher/comp354Project/blob/main/IMG/recommendation.jpg?raw=true)

<h3>4. Coding standards in the project</h3>
- PHP 94.5%: backend and frontend<br>
- CSS 4.9%: frontend<br>
- SQL: database<br>
- JS: functions<br>

<h3>5. Folder structure explained</h3>
- .vscode: link, settings<br>
- CSS: frontend, styles<br>
- IMG: all the images used in the website and the screenshots for readme file<br>
- JS: javascript functions<br>
- backend: backend code implementation<br>
- frontend: frontend code implementation<br>
- SQL files: database<br>

<h3>6. Summary</h3>
This is a Book-Project web app with shelves:<br>
&nbsp;&nbsp;&nbsp;Reading: Books that are currently being read<br>
&nbsp;&nbsp;&nbsp;Read: Books that are already read<br>
&nbsp;&nbsp;&nbsp;To Read: Books that will be read in the future<br>
&nbsp;&nbsp;&nbsp;Favorites: which contains all the books most liked by the user<br>
&nbsp;&nbsp;&nbsp;Recommendations: containing books recommended for the user
based on the user’s interest<br>

Created a local database called bookappdb with three tables (book, records, user)<br>
login, signup system are included<br>
Home page can show all books that exist in the database<br>
The recommendation of books to a user is based on book genres in this user's reading shelf<br>
