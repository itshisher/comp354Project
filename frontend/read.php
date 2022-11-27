<?php
    include_once 'header.php';
?>

    <section class="index-intro">
        <h1>Welcome to the book shelf web app!</h1>
        <p>Here you can check for the books that are already read.</p>
        
        <?php
            require_once '../backend/dbh.php';
            require_once '../backend/functions.php';

            //select if there is any book under read in record table in the database
            //$sql = "select * from records where state='read' and uid='$_SESSION[username]'";
            $sql = "SELECT * FROM records LEFT OUTER JOIN book ON records.bid = book.bid WHERE records.state='read' AND records.uid = '$_SESSION[username]' ORDER BY book.category;";
            $rs = mysqli_query($connection, $sql);
      
            $num = mysqli_num_rows($rs);
            if ($num < 1) {
                echo "<a href='home.php'><h2>No book has been finished, please click here to choose your books.</h2></a>";
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
                        
                        
                        <a href=../backend/action.php?original=read&action=favorite&bid=" . $list['bid'] . ">Favorite</a>

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