<?php include_once('header.php'); ?>

<?php include_once('navbar.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto pt-5">
            <h1>Login</h1>
            <?php if($this->session->flashdata('error')){ ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php }
            elseif($this->session->flashdata('success')){ ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php
            } ?>
            <form action="<?php echo base_url('login'); ?>" id='login_form' method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <span class='error-msg email_error no-display'></span>
                </div>
                <div class="form-group mb-2">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <span class='error-msg password_error no-display'></span>
                </div>
                <button type="button" id='login_btn' class="btn btn-primary">Login</button>
                <a href='<?php echo base_url('login/register'); ?>' class="btn btn-default pull-right">Register</a>
            </form>
        </div>
    </div>
</div>
<script>
$(document).on('click', '#login_btn', function(){
    let email = $('#email').val().trim();
    let password = $('#password').val().trim();
    let errorCount = 0;
    if(email == ''){
        $('.email_error').text('Please enter your email');
        $('.email_error').removeClass('no-display');
        errorCount++;
    } else if(!validateEmail(email)){ 
        $('.email_error').text('Please enter valid email');
        $('.email_error').removeClass('no-display');
        errorCount++;
    } else {
        $('.email_error').addClass('no-display');
    }

    if(password == ''){
        $('.password_error').text('Please enter your password');
        $('.password_error').removeClass('no-display');
        errorCount++;
    } else if(password.length < 6){
        $('.password_error').text('Password must be at least 6 characters');
        $('.password_error').removeClass('no-display');
        errorCount++;
    } else {
        $('.password_error').addClass('no-display');
    }

    if(errorCount > 0){
        return false;
    }
    else{
        $('#login_form').submit();
    }

});
</script>
<?php include_once('footer.php'); ?>