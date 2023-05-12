
<!--  html code  start-->

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Document</title>
 <!--  css code  start-->

        <style>
        *{
          padding: 0;
          margin:0;


        }
        body{
             font:16px arial;
             margin: 0;
             padding: 0;
             background: #d1d1d1;
         }
       h2{
            text-align: center;
            margin-bottom: 20px;
         }
        .main{
          width: 50%;
          height:30%;
          background-color: #fff;
          padding: 30px;
          position: relative;
          top: 100px;
        }
            .input .first{
            margin-bottom: 10px;
            padding-bottom: 10px;
              font-size: 20px;
            }
            .input .text{

              float: right;

            }
            .btndiv{

              margin: 30px;
            }
            .btndiv .btn{
              background:#0be881;
              padding: 5px;
              font-size: 20px;
              text-transform: capitalize;
              border-radius: 10px;
            }
            .btndiv .btn:hover{
              background: green;
            }
              @media(max-width:1320px){
                .input .text{
                  display: flex;
                  width: 60%;
                }
              }
            @media(max-width:500px){
              .main{
              width: 70%;
              margin-left: 30px;

              }
              }


</style>

            <!--  css code  start-->
    </head>
    <body>

                  <!--  form  start-->


      <form class="table"  action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <center>
        <div class="main">
          <h2>Create Table</h2>
          <div class="input">

            <label class="first">Table Name :</label>

            <input type="text" name="tablename" class="text"></div>

          <div class="btndiv">

            <input type="submit" name="submit" value="submit" class="btn">
          </div>

        </div>
      </center>
</form>
<!--  form  end-->
    </body>
    </html>
<!--  html code  end-->

<!--  PHP CODE  START-->
    <?php
class dbconnection{
       private $databasehost = 'localhost';
       private $databaseuser = 'root';
       private $databasepass = '';
       private $databasename = 'mytable';
       private $conn;

       function __construct(){
         $this->conn = new mysqli($this->databasehost,$this->databaseuser,$this->databasepass,$this->databasename);
         if($this->conn->connect_error){
           echo "connection failed";
         }
         else {
           return $this->conn;
         }
          $this->conn->close();
       }//CONSTRUCTOR CLOSE

       public function tablecreate(){
             $tbname=$_POST['tablename'];
             $sql = "CREATE TABLE $tbname( "."id INT NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY, ". "firstname VARCHAR(100) NOT NULL, ".
                    "lastname VARCHAR(40) NOT NULL, "."username VARCHAR(40) UNIQUE); ";

             $result = $this->conn->query($sql);
             if(! $result )
             {
               $status='<div  style="position:absolute;top:45px;padding-left:20px; color:red;">Table Already exist......!</div>'. mysqli_connect_error();
                 echo $status;


             }
             else{
               $status='<div  style="position:absolute;top:45px;padding-left:20px; color:green;">Table created successfully</div>';
               echo $status;

           }
       } //TABLECREATE FUNCTION CLOSE

     } //CLASS CLOSE
      $obj=new dbconnection(); //CLASS  OBJECT
      if(isset($_POST['submit']))
      {
        $obj->tablecreate(); //TABLECREATE FUNCTION CALL
      }



    ?>
    <!--  PHP CODE  END-->
