<?php

$loginVerification = $this->session->userdata('logged_in');
$loginVerificationuser = $this->session->userdata('user_type');

if (!$loginVerification) {
    redirect("main/index");

}
elseif (($loginVerificationuser) != "ADMIN") {
    redirect("main/user_page");

}


?>




<!DOCTYPE html>
<html>
<head>
        <title> HCC DASHBOARD </title>
        <link href = "<?=base_url()?>bootstrap/css/basictable.css" rel ="stylesheet" type = "text/css">
        <link href = "<?=base_url()?>bootstrap/css/bootstrap.css" rel ="stylesheet" type = "text/css">
        <link href = "<?=base_url()?>bootstrap/css/examples.css" rel ="stylesheet" type = "text/css">
        <link href = "<?=base_url()?>bootstrap/css/font-awesome.css" rel ="stylesheet" type = "text/css">
        <link href = "<?=base_url()?>bootstrap/css/font.css" rel ="stylesheet" type = "text/css">
        <link href = "<?=base_url()?>bootstrap/css/ladda.min.css" rel ="stylesheet" type = "text/css">
        <link href = "<?=base_url()?>bootstrap/css/lsb.css" rel ="stylesheet" type = "text/css">
        <link href = "<?=base_url()?>bootstrap/css/monthly.css" rel ="stylesheet" type = "text/css">
        <link href = "<?=base_url()?>bootstrap/css/morris.css" rel ="stylesheet" type = "text/css">
        <link href = "<?=base_url()?>bootstrap/css/style.css" rel ="stylesheet" type = "text/css">
        <link href = "<?=base_url()?>bootstrap/css/table-style.css" rel ="stylesheet" type = "text/css">
        <link href = "<?=base_url()?>bootstrap/css/typo.css" rel ="stylesheet" type = "text/css">

        <script type = "text/javascript" src = "<?=base_url()?>bootstrap/js/jquery.min.js"></script>
        <script type = "text/javascript" src = "<?=base_url()?>bootstrap/js/bootstrap.js"></script>

        <script type = "text/javascript">
            function message(){
                alert("Record Successfully Changed");
            }
            function deleteRecord(){
                alert("Record Successfully Deleted");
            }
        </script>

    <meta name = "viewport" content = "width=device-width, initial=1">
    <script type = "text/javascript" src = "<?=base_url()?>bootstrap/js/jquery2.0.3.min.js"></script>
    <script type = "text/javascript" src = "<?=base_url()?>bootstrap/js/modernizr.js"></script>
    <script type = "text/javascript" src = "<?=base_url()?>bootstrap/js/jquery.cookie.js"></script>
    <script type = "text/javascript" src = "<?=base_url()?>bootstrap/js/screenfull.js"></script>

    <script type ="text/javascript">
        $(function (){
            $('#supported').text('supported/allowed: ' +!!screenfull.enabled);

            if(!screenfull.enabled){
                return false;
            }

            $('#toggle').click(function(){
                screenfull.toggle($('#container')[0]);


            });

            return 0;

        });
    </script>

    <style type="text/css">
    .admin_container{
    padding-left: 8%;
    }

    .img-logo-smol{
        width: 55px ;
        height: 55px;
        margin-bottom: 75px;
    }
    .headeradmin{
        margin-top: 5px;
        margin-bottom 0px;
        padding-left:40px;
    }
    .dot {
    height: 15px;
    width: 15px;
    background-color: red;
    border-radius: 50%;
    display: inline-block;
  }

  .button-left{
    padding-left: 10px;
    height: 42px;
  }

    .sec{
        position: relative;
        right: -1px;
        top:-22px;
    }

    .counter-lg {
        top: -24px !important;
    }
    .font-badge{
        font-family: sans-serif; !important

    }
    </style>


</head>
<body class = "dashboard-page">
    <script type = "text/javascript">
        var theme=$.cookie('protonTheme') || 'default';
        $('body').removeClass (function(index,css){
                return(css.match (/\btheme-\S+/g)|| []).join('');
        });
        if(theme !== 'default') $('body').addClass(theme);

    </script>

    <nav class = "main-menu">
        <ul>
            <li>
                <a href = "<?=site_url('main/dashboard')?>">
                    <i class = "fa fa-home nav_icon"></i>
                    <span class = "nav-text">Dashboard</span>
                </a>
            </li>

            <li class = "has-subnav">
                <a href = "">
                    <i class = "fa fa-cogs" aria-hidden="true"></i>
                    <span class = "nav-text">Components</span>
                </a>
            </li>

            <li class = "has-subnav">
                <a href = "">
                <i class = "fa fa-check-square-o nav_icon"></i>
                <span class ="nav-text">Records</span>
                </a>

            </li>

            <li class = "has-subnav">
                <a href = "">
                <i class = "fa fa-file-text-o nav_icon"></i>
                <span class ="nav-text">Feeds</span>
                </a>

            </li>

            <li class = "has-subnav">
                <a href = "">
                <i class = "fa fa-list-ul nav_icon"></i>
                <span class ="nav-text">Statistics</span>
                </a>
            </li>

            <li class = "has-subnav">
                <?php
                $countactivation=$this->db->query("SELECT COUNT(*) as count FROM activation");
                $crow=$countactivation->row();

                if(($crow->count)==0){

                ?>
                <a href = "<?=site_url('main/activation_page')?>">
                <i class = "fa fa-users nav_icon"><span  class="sec badge font-badge"></span></i>
                <span class ="nav-text">Account Activation Requests &nbsp;</span>
                </a>

                <?php
                    }else{
                 ?>
                <a href = "<?=site_url('main/activation_page')?>">
                <i class = "fa fa-users nav_icon"><span  class="sec badge font-badge"><?=$crow->count?></span></i>
                <span class ="nav-text">Account Activation Requests &nbsp;</span>
                </a>
                 <?php
                        }
                  ?>
            </li>
        </ul>

    </nav>

<section class = "wrapper scrollable">

        
    

<section class = "title-bar">
    <i class="d-block"><img class="img-responsive img-logo-smol logo mx-auto img-fluid float-left" src="<?=base_url()?>bootstrap/images/hcc-new.png"></i>
    <div class="profile_details_left">
    <div class="profile_details">
      <ul>
          <li class="dropdown profile_details_drop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <div class="profile_img">
                      <span class="prfil-img"><i class="fa fa-user" aria-hidden="true"></i></span>
                      <div class="clearfix"></div>
                  </div>
              </a>
              <ul class="dropdown-menu drp-mnu">
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="logout"><i class="fa fa-sign-out"></i> Log-out</a></li>

              </ul>
          </li>
      </ul>
      </div>
  </div>
 <div class="w3l_search text-right">
    <?=form_open("main/searchUsers")?>
      <input type = "text" name ="key">
      <button type = "submit" value="SEARCH" class = "btn btn-warning button-left">
      <i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
  </div>
  <div class="">
   <h1 class="float-right headeradmin"><a href="<?=site_url('main/dashboard')?>">Holy Cross College</a></h1>
  </div>
</section>
  
<div class = "main-grid">
    <div class = "agile-grids">
        <div class = "progressbar-heading grids-heading">
            <h2>Admin Dashboard</h2>
        </div>
    </div>

<div class = "codes">
<div class = "agile-container">
<table class = "table table-hover">
    <tr>
        <th class="text-center">Status</th>
        <th class="text-center">First Name</th>
        <th class="text-center">Middle Initial</th>
        <th class="text-center">Last Name</th>
        <th colspan="2" class="text-center">Details</th>
    </tr>

<?php

if(isset($_POST['key'])){
    $key = $_POST['key'];
$queryForUsers =$this->db->query("SELECT * FROM users where Fname like '%{$key}' or Lname like '%{$key}'");
}else{
    $queryForUsers =$this->db->query("SELECT * FROM users");
}
foreach($queryForUsers->result() as $rowUsers):
?>
        <tr>
            <?php
                        if(($rowUsers->user_type)=="ADMIN"){

                        }else{


                ?>
                <td class="text-center"><?=$rowUsers->status?></td>
                <td class="text-center"><?=$rowUsers->Fname?></td>
                <td class="text-center"><?=$rowUsers->Mi?></td>
                <td class="text-center"><?=$rowUsers->Lname?></td>
                <td class="text-center"><a class="btn btn-warning" data-toggle="modal" data-target="#modalEdit<?=$rowUsers->userID?>"  href="#modalEdit<?=$rowUsers->userID?>"><i class="fa fa-edit" aria-hidden="true"></i>
EDIT</a></td>
                <td><a class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?=$rowUsers->username?>"  href="#modalDelete<?=$rowUsers->username?>" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i>
DELETE</a></td>


        </tr>
<!--MODAL FOR EDIT-->
<div id="modalEdit<?=$rowUsers->userID?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Record</h4>
      </div>
      <div class="modal-body">

        <center>
        <?=form_open("main/updateUser/$rowUsers->userID")?>
        <?=form_hidden("date_modified",date("y_m_d H:i:s"))?>



            <input type = "password" name = "password" required value="<?=$rowUsers->password?>" minlength = "6"><br><br>
            <input type = "text" name = "Fname" required value="<?=$rowUsers->Fname?>" maxlength = "20"><br><br>
            <input type = "text" name = "Mi" required value="<?=$rowUsers->Mi?>" maxlength = "3"><br><br>
            <input type = "text" name = "Lname" required value="<?=$rowUsers->Lname?>" maxlength = "20"><br><br>
            <?php
                if(($rowUsers->status)=="DISABLE"){
                    echo "<input type='checkbox' name='status' value='ACTIVE'class=''> ENABLE USER</input>";
                }else{
                 echo "<input type='checkbox' name='status' value='DISABLE' class=''> DISABLE USER</input>";
                }
             ?>


        </center>


      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value = "Save" onClick = "message()">
        </form>

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--END MODAL EDIT-->

<!--MODAL DELETE-->
<div id="modalDelete<?=$rowUsers->username?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Record</h4>
      </div>
      <div class="modal-body">

        <center>
        <?=form_open("main/deleteUser/$rowUsers->username")?>

            <p>Do you want to delete this record permanently?</p>


        </center>

      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-danger" value = "YES" onClick = "deleteRecord()">
        </form>

        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
      </div>
    </div>

  </div>
</div>

<!--END OF MODAL DELETE-->
    <?php
        }
    endforeach;
    ?>
    </table>
    </div>
    </div>

</div>
</section>
<!-- Modal -->

</body>
</html>
