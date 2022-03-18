<?php include_once('header.php'); ?>
<?php include_once('navbar.php'); ?>

<div class='container'>
    <br/><br/>
    <div class='row'>
        <div class="card border-primary mb-3 col-md-3">
            <div class="card-header">Today's</div>
            <div class="card-body text-primary">
                <h5 class="card-title">Total Shows </h5>
                <span class="badge bg-primary"><?php echo $total_shows;?></span>
            </div>
        </div>
        <div class="card border-secondary mb-3 col-md-3">
            <div class="card-header">Today's</div>
            <div class="card-body text-primary">
                <h5 class="card-title">Total movies</h5>
                <span class="badge bg-danger"><?php echo $total_movies;?></span>
            </div>
        </div>
        <div class="card border-primary mb-3 col-md-3">
            <div class="card-header">Today's</div>
            <div class="card-body text-primary">
                <h5 class="card-title">Total Screens</h5>
                <span class='badge bg-success'><?php echo $total_screens;?></span>
            </div>
        </div>
        <div class="card border-secondary mb-3 col-md-3">
            <div class="card-header">Today's</div>
            <div class="card-body text-primary">
                <h5 class="card-title">Total Bookings</h5>
                <span class='badge bg-warning'><?php echo $total_seats_booked;?></span>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>