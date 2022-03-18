<?php include_once('header.php'); ?>
<!-- <link rel='stylesheet' href='<?php echo base_url('assets/css/jquery.dataTables.min.css'); ?>'>
<script src='<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>'></script> -->
<?php include_once('navbar.php'); ?>

<div class='container'>
    
    <br/><br/>
    <h4>Users</h4>
    <div class="table-responsive">
    <table id="booking_table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Slno</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Total Seats Booked</th>
                
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($users))
            {
                foreach($users as $key => $user)
                {
                    ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['booked_count']; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Slno</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Total Seats Booked</th>
            </tr>
        </tfoot>
    </table>
    </div>
</div>
<script>
// $(document).ready(function() {
//     $('#example').DataTable();
// } );
</script>
<?php include_once('footer.php');?>