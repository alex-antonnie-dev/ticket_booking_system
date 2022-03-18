<?php include_once('header.php'); ?>
<!-- <link rel='stylesheet' href='<?php echo base_url('assets/css/jquery.dataTables.min.css'); ?>'>
<script src='<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>'></script> -->
<?php include_once('navbar.php'); ?>

<div class='container'>
    
    <br/><br/>
    <h4>Bookings</h4>
    <div class="table-responsive">
    <table id="booking_table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Slno</th>
                <th>Movie</th>
                <th>Show</th>
                <th>Screen</th>
                <th>Customer Name</th>
                <th>Seats Booked</th>
                <th>Booking Date</th>
                
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($bookings))
            {
                foreach($bookings as $key => $booking)
                {
                    ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $booking['movie_name']; ?></td>
                        <td><?php echo $booking['show_name']; ?></td>
                        <td><?php echo $booking['screen_name']; ?></td>
                        <td><?php echo $booking['user_name'];?></td>
                        <td><?php echo $booking['booked_count']; ?></td>
                        <td><?php echo $booking['booked_date']; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Slno</th>
                <th>Movie</th>
                <th>Show</th>
                <th>Screen</th>
                <th>Customer Name</th>
                <th>Seats Booked</th>
                <th>Booking Date</th>
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