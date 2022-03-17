<?php include_once('header.php'); ?>

<?php include_once('navbar.php'); ?>

<div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto pt-5">
                    <h1>Register</h1>
                    <form action="<?php echo site_url('register'); ?>" method="post">
                        <div class="form-group">
                            <label for="fname">Name</label>
                            <input type="text" class="form-control" id="fname" name="fname">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                        <a href='<?php echo base_url('login/register'); ?>' class="btn btn-default pull-right">Login</a>
                    </form>
                </div>
            </div>
        </div>

<?php include_once('footer.php'); ?>