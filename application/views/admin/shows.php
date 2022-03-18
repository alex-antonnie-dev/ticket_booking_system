<?php include_once('header.php'); ?>
<!-- <link rel='stylesheet' href='<?php echo base_url('assets/css/jquery.dataTables.min.css'); ?>'>
<script src='<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>'></script> -->
<?php include_once('navbar.php'); ?>

<div class='container'>
    
    <br/><br/>
    <h4>Shows</h4>
    <div class="table-responsive">
    <table id="booking_table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Slno</th>
                <th>Show Name</th>
                <th>Movie</th>
                <th>Screen</th>
                <th>Seats Booked</th>
                <th>Seats Available</th>
                <th>Date</th>
                
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($shows))
            {
                foreach($shows as $key => $show)
                {
                    ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $show['show_name']; ?></td>
                        <td><?php echo $show['movie_name']; ?></td>
                        <td><?php echo $show['screen_name']; ?></td>
                        <td><?php echo $show['booked_count']; ?></td>
                        <td><?php echo $show['seats_available']; ?></td>
                        <td><?php echo $show['show_time']; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Slno</th>
                <th>Show Name</th>
                <th>Movie</th>
                <th>Screen</th>
                <th>Seats Booked</th>
                <th>Seats Available</th>
                <th>Date</th>
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