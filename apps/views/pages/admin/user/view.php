<h3 class="content_edit">Admin Control Panel View User</h2>
<style>
    legend {
        -moz-border-radius: 10px 10px 10px 10px;
        background-color: #499DC4;
        color: White;
        font: bold 12px Arial;
        padding: 5px 10px;
        text-align: center;
    }
    fieldset {
        -moz-border-radius: 8px 8px 8px 8px;
        border: 2px solid #E2E6E7;
        margin: 1em 0.2em;
        padding: 10px 7px 7px;
    }
	</style>

<fieldset>
<legend align="left">User List</legend>
<table width="100%" border="1" align="center" style="border-collapse:collapse; ">
<tr>
<th>SN</th>
<th>Name</th>
<th>User ID</th>
<th>Email</th>
<th>Action</th>
</tr>
<?php
    if(count($userLists))
    {
      $i = 1;
    foreach($userLists as $userList)
        {
    if($i%2 == 0):	$color="#FFFFFF"; else : $color="#DDDDDD"; endif;
	
     ?>
		<tr bgcolor="<?php echo $color; ?>">
			<td width="3%" align="center"><?php  echo $i; ?></td>
         	<td align="center" width="7%"><?php echo $userList->name; ?></td>
			<td align="center" width="7%"><?php echo $userList->username; ?></td>
            <td align="center" width="7%"><?php echo $userList->email; ?></td>
			<td align="center" width="12%">
            <a href="<?php echo base_url().'admin/backend/userdelete/'.$userList->id; ?>" title="Edit the Content"><img src="<?php echo base_url(); ?>public/images/delete.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>
            
            </td>
		</tr>
<?php $i = $i + 1; 
	}
}if(!empty($pagination)): ?>
 <tr><td colspan="9" align="center"> <?php echo $pagination.br(3); ?></td></tr>
 <?php endif; ?>
 </table>
</fieldset>


