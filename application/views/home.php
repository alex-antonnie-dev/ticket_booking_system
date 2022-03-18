<?php include_once('header.php'); ?>

<?php include_once('navbar.php'); ?>

<div class="container">
    <div class="row">
        <div class='col-md-3 mt-5'>
            <select class='form-control' name='shows_list' id='shows_list'>
                <option>Select Show</option>
                    <?php
                    if(!empty($shows)) {
                        foreach($shows as $show) {
                            echo "<option value='".$show['id']."'>".$show['show_name']."</option>";
                        }
                    }
                    ?>
            </select>
        </div>
    </div>
    <br/>
    <div class='row mt-4'>
        <div class='offset-md-4 col-md-8'>
            <h4>Seats Available</h4>
            <div id='seat_details' class='no-display'>
                <?php
                foreach($seats as $seat)
                {
                    ?>
                    <div class='seat-box' id='seat-box-<?php echo $seat;?>' data-id='<?php echo $seat;?>'>
                        <?php echo $seat;?>
                    </div>
                    <?php
                }
                ?>
                <br>
                <button type='button' class='btn btn-success' id='save_tickets'>Book Tickets</button>
            </div>
    </div>
</div>

<script>

$('#shows_list').change(function(){
    let show_id = $(this).val();
    if(show_id){
        //get booking history
        $.ajax({
            url: '<?php echo base_url('home/get_booking_history'); ?>',
            type: 'POST',
            data: {show_id:show_id},
            success: function(response){
                $('#seat_details').removeClass('no-display');
                let data = JSON.parse(response);
                if(data.status == 'success'){
                    let booking_history = data.data;
                    if(booking_history.length > 0){
                        $.each(booking_history, function(index, value){
                            let seats = value.seats_booked.split(',');
                            console.log(seats);
                            if(seats.length > 0){
                                $.each(seats, function(index, value){
                                    $('#seat-box-'+value).addClass('seat-box-booked');
                                });
                            }
                        });
                    } else {
                        $('#seat_details .seat-box').removeClass('seat-box-booked');
                        $('#seat_details .seat-box').removeClass('seat-box-selected');
                    }
                }
            }
        });
    }
});

$(document).on('click', '#save_tickets', function(){
    let show_id = $('#shows_list').val();
    let seats = [];
    $('.seat-box-selected').each(function(){
        seats.push($(this).data('id'));
    });
    if(seats.length > 0){
        $.ajax({
            url: '<?php echo base_url('home/save_booking'); ?>',
            type: 'POST',
            data: {show_id:show_id, seats:seats},
            success: function(response){
                let data = JSON.parse(response);
                if(data.status == 'success'){
                    alert('Tickets booked successfully');
                    window.location.reload();
                }
            }
        });
    }
});


$(document).on('click', '.seat-box', function(){
    let seat_id = $(this).data('id');
    if($(this).hasClass('seat-box-booked')){
        // alert('Seat already booked');
    }else if($(this).hasClass('seat-box-selected')){
        $(this).removeClass('seat-box-selected');
        // $('#seats_selected').val($('#seats_selected').val()+seat_id+',');
    } else {
        $(this).addClass('seat-box-selected');
        // $('#seats_selected').val($('#seats_selected').val()+seat_id+',');
    }
});

</script>

<?php include_once('footer.php'); ?>