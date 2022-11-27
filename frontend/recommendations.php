<?php
    include_once 'header.php';
?>

    <section class="index-intro">
        <h1>Welcome to the book shelf web app!</h1>
        <p>Here you can find books that we recommend for you!</p>
        
        <?php
            require_once '../backend/dbh.php';
            require_once '../backend/functions.php';

            //use sql statements to extract book ids first, then use these ids to compare to the books in the book table
            //to get books genres, according to the genres, use sql statements to extract books with the same genre
            $sql = "SELECT * FROM book WHERE book.category IN (SELECT book.category FROM book WHERE book.bid = any(SELECT records.bid FROM records LEFT OUTER JOIN book ON records.bid = book.bid WHERE records.state='reading' AND records.uid = '$_SESSION[username]')) ORDER BY category";
            $rs = mysqli_query($connection, $sql);
      
            $num = mysqli_num_rows($rs);
            if ($num < 1) {
                echo "<h2>No book under this section.</h2>";
                echo "<a href='home.php'><h2>Please click here to choose your books!</h2></a>";
                
            } else {
                while ($row = mysqli_fetch_array($rs)) {
                    $sqllist = "select * from book where bid='$row[bid]'";
                    $relust = mysqli_query($connection, $sqllist);
                    $list = mysqli_fetch_array($relust);

                    echo "<li>
                        <img src=" . $list['img'] . ">
                        <h3>" . $list['bookname'] . "</h3>
                        <h3><span>Author: " . $list['author'] . "</span><span> Category: " . $list['category'] . "</span></h3>
                        <p>Description: " . $list['description'] . "</p>
                        
                        <p>
                            <a href=../backend/action.php?original=nofinish&action=reading&bid=" . $list['bid'] . ">Reading</a>
                            <a href=../backend/action.php?original=nofinish&action=toread&bid=" . $list['bid'] . ">To read</a>
                            <a href=../backend/action.php?original=nofinish&action=read&bid=" . $list['bid'] . ">Read</a>
                            <a href=../backend/action.php?original=nofinish&action=favorite&bid=" . $list['bid'] . ">Favorite</a>
      
                        </p>

                      <p>-------------------------------------------------------</p>
                      
                      </li>";
                }
              }
        ?>
     
      </ul>


    
        
       
        
    </section>
    

<?php
    include_once 'footer.php';
?>