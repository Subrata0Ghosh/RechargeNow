<?php
       
       session_start();
       if(!isset($_SESSION['session_id']))
          header("Location:admin_login.php");
       
?>
<html>
      <head>
            <title>Admin Panel</title>
            <link rel="stylesheet" type="text/css" href="style/mystyle.css">
      </head>
      <body>
            <div id="header">
                <h1>Admin Panel</h1>
            </div>
            <div id="logout">
                <a href="admin_logout.php">logout</a>
            </div>
            <div class="content">
                 <div id="left">
                      <?php
                         include_once'connectivity.php';
                         try{
                              $database=new Connection();
                              $db=$database->openConnection();
                              $stm=$db->prepare("select * from admin_menu");
                              $stm->execute();
                              $stm->setFetchMode(PDO::FETCH_ASSOC);
                              while($data=$stm->fetch())
                                    {
                                       $menu_name=$data['adm_menu_name']; 
                                       $menu_id=$data['adm_menu_id'];
                                       ?>
                                       <ul>
                                             <a href="admin_menu.php?menu_id=<?php echo $menu_id?>"><li><?php echo $menu_name ?></li></a>
                                       </ul>
                                   <?php }                              
                            }
                         catch(PDOExecption $e)
                            {
                              echo "there is some problem in connection";
                            }

                   ?>
                 </div>
                 <div id="right">
                       
                 </div>
            </div>
            <div id="footer">
            </div>
      </body>
</html>
