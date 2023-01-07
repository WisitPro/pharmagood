<?php 
session_start();
        if(isset($_POST['adm_user'])){
				//connection
                  include("connection.php");
				//รับค่า user & password
                  $adm_user = $_POST['adm_user'];
                  $adm_pass = $_POST['adm_pass'];
				//query 
                  $sql="SELECT * FROM tbl_admin Where adm_user='".$adm_user."' and adm_pass='".$adm_pass."' ";
 
                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){
 
                      $row = mysqli_fetch_array($result);
 
                      $_SESSION["adm_id"] = $row["adm_id"];
                      $_SESSION["adm_name"] = $row["adm_name"];
                      $_SESSION["adm_phone"] = $row["adm_phone"];
                      
 
                      if($_SESSION["adm_id"]=="0"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
 
                        Header("Location: AdminHomePage.php");
 
                      }
 
                      if ($_SESSION["adm_id"]=="1"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
 
                        Header("Location: PhaHomePage.php");
 
                      }
 
                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
 
                  }
 
        }else{
 
 
             Header("Location: AdminLoginPage.php"); //user & password incorrect back to login again
 
        }
?>