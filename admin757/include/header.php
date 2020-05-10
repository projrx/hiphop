<button class="navbar-toggle mobheader">
  <i class="fa fa-bars"></i> 
</button>
<div class="navbar navbar-fixed-top">
    <div class="container-fluid main-nav clearfix">
 

    <div class="nav-collapse">


      <ul class="nav bgcolor">
      
      <a href="orders" class="textwhite">
      <span class="uprleft"><i class="fa fa-tasks" ></i> Orders Management</span></a>
        <div class="hidden">
        <?php

        $rows =mysqli_query($con,"SELECT name,slug,res,icon FROM pages WHERE hide=0 ORDER BY ordr" ) or die(mysqli_error($con));
                  
          while($row=mysqli_fetch_array($rows)){
            
            $slug = $row['slug']; 
            $name = $row['name']; 
            $res = $row['res']; 
            $icon = $row['icon']; 

            ?>

        <li>
          <a <?php if($link==$slug) echo'class="current"' ;?> href="<?php if($res==0) echo'cpages-' ;?><?php echo $slug ?>"><i class="fa fa-<?php echo $icon ?>"></i>  <?php echo $name ?></a>

        </li>

       
        <?php } ?>

      </div>
  <?php

        $rows =mysqli_query($con,"SELECT name,slug FROM productcat ORDER BY ordr" ) or die(mysqli_error($con));      
          while($row=mysqli_fetch_array($rows)){
            $slug = $row['slug']; 
            $name = $row['name']; 
            ?>

        <li>
          <a href="products-<?php echo $slug ?>"><?php echo $name ?></a>

        </li>

       
        <?php } ?>


      <a href="manages" class="textwhite">
      <span class="upr"> <i class="fa fa-bars" ></i> Manage Website</span></a>

      </ul>

    </div>
  </div>
</div>



<style type="text/css">

.uprleft{
  position: fixed;left: 30px;top: 20px;
}
  .upr{
  position: fixed;right: 30px;top: 20px;
}

@media (max-width: 767px){

.mobheader {
    display: block;
    padding: 12px 15px;
    background: #efefef;
    position: absolute;
    z-index: 9999999999999;
    right: 5px;
    top: -7px;
}

.uprleft{
position: absolute;
    top: 300px;
}


.upr{
  position: absolute;
    top: 350px;
    left: 30px;
}


}
  
.ordernav{
  background: #fff;
  padding:10px;
}
.orderul{
  display: contents;
}
.orderli {
    display: block;
    width: 100%;
    background: #f3f3f3;
    padding: 10px;
    margin-top: 15px;
}
.ordera{

  color:#000;
      text-decoration:;

}
.or{
  float: right;
}


.minicartimg{
  width: 50px;
}

.dataTables_wrapper .dataTables_filter input {
    width: 400px !important;
}

.overflow{
  overflow: auto !important;
}
.orow{
  cursor: pointer;
  transition: linear 0.2s;
}
.orow:hover{
  cursor: pointer;
  background: black;
    color: white;
}

#minwidth{
  width: 100px !important;
  max-width: 100px !important;
  overflow: auto !important;
}



.card{
 background: #f3f3f3;
    padding: 10px;
    /* border: 1px solid; */
    box-shadow: 2px 2px 5px;
    border-radius: 5px;
    transition: linear 0.1s;
}
.card:hover{
 background: #f3f3f3;
    padding: 10px;
    /* border: 1px solid; */
    box-shadow: 1px 1px 2px;
    border-radius: 5px;
}
</style>


<style>
/* width */
::-webkit-scrollbar {
  height: 1px;              /* height of horizontal scrollbar ← You're missing this */
  width: 8px;               /* width of vertical scrollbar */
  border: 1px solid #d5d5d5;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>