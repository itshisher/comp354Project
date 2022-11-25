<?php
    include_once 'header.php';
?>

    <section class="index-intro">
        <h1>Welcome to the book shelf web app!</h1>
        <p>Here you can check for the books you are going to read in the future.</p>
        
        <?php
            require_once '../backend/dbh.php';
            require_once '../backend/functions.php';

            //select if there is any book under toRead in record table in the database
            $sql = "select * from records where state='toread' and uid='$_SESSION[username]' ";
            $rs = mysqli_query($connection, $sql);
      
            $num = mysqli_num_rows($rs);
            if ($num < 1) {
                echo "<a href='home.php'><h2>No book in your planning to read, please click here to choose your books.</h2></a>";
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
                      <a href=../backend/action.php?original=read&action=reading&bid=" . $list['bid'] . ">Reading</a>
                      <a href=../backend/action.php?original=reading&action=nofinish&bid=" . $list['bid'] . ">Did Not Finish</a>
                      <a href=../backend/action.php?original=reading&action=favorite&bid=" . $list['bid'] . ">Favorite</a>
      
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