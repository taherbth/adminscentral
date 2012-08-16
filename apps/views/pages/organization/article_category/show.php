<h3 class="content_edit">Admin Control Panel View Article Category </h2>

<?php echo $this->session->flashdata('message'); ?>
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
      <legend align="left">View Article Category</legend>

<table width="98%" border="1" align="center" style="border-collapse:collapse; margin:10px;">
    <tr>
        <th>Category Id</th>
        <th>Category Name</th>            
        <th>Action</th>
    </tr>
    <script language="javascript">
        function confirmSubmit() {
            var agree=confirm("Are you sure to delete this record?");
            if (agree)
                return true;
            else
                return false;
        }
    </script>
    <?php
    if (count($query1)) {
        $i =  1;
        foreach ($query1 as $package_info) {
            if ($i % 2 == 0): $color = "#F1FAFA";
            else : $color = "#DDDDDD";
            endif;
            ?>
            <tr bgcolor="<?php echo $color; ?>">
                <td width="3%" align="center"><?php echo $i; ?></td>
                <td width="3%" align="center"><?php echo $package_info->category_name; ?> </td>
                <td align="center" width="12%">
                    <a href="<?php echo base_url(); ?>organization/info/article_category_edit/<?php echo $package_info->id; ?> " title="Edit the Content"><img src="<?php echo base_url(); ?>public/images/edit.png" border="0" align="absmiddle" alt="<?php echo "#"; ?>"/></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmSubmit()" href="<?php echo base_url() ?>organization/info/article_category_delete/<?php echo $package_info->id; ?>" title="Delete the Content"><img src="<?php echo base_url(); ?>public/images/delete.png" border="0" align="absmiddle" height="20" alt="<?php echo "#"; ?>"/></a></td>
            </tr>
            <?php
            $i = $i + 1;
        }
    }
    ?>
</table>
</fieldset>