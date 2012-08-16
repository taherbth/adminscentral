<div style="position:relative;">
    <div id="colorchanger">
        <a href="dashboard_red.html"><span class="redtheme">Red Theme</span></a>
        <a href="dashboard.html"><span class="bluetheme">Blue Theme</span></a>
        <a href="dashboard_green.html"><span class="greentheme">Green Theme</span></a>
    </div>
</div>
<!--LOGO-->
<div class="grid_8" id="logo">Online Association Board</div>
<div class="grid_8">
    <!-- USER TOOLS START -->      
<!--    <div id="user_tools"><span><a href="#" class="mail">(1)</a> Welcome <a href="#">Admin Username</a> |  <a href="<?php echo base_url(); ?>admin/backend/logout">Logout</a></span></div>
-->
<?php 
$query=$this->db->query("select * from contact_info where org_id='".$this->session->userdata("user_id")."'and message_status=2 and flag=1");
 $c=$query->num_rows();?> 
  <div id="user_tools">
 <span> 
  <a href="<?php echo base_url(); ?>organization/info/view_inbox"><?php if($c>0):echo "Inbox($c)";else:echo "Inbox";endif;?></a> ||

 <a href="<?php echo base_url(); ?>orgadmin/logout">Logout</a>
 </span>
 
 </div>

</div>