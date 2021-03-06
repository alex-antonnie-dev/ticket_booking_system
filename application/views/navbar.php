<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="<?php echo site_url();?>">Ticket Booking System</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        </li>
      </ul>
      <span class="navbar-text">
      Welcome <?php echo isset($_SESSION['user']) ? $_SESSION['user']['name'] : 'Guest'; ?>
    </span> &nbsp;
      <form class="d-flex">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <?php if($this->session->userdata('user') == '') { ?>
                    <a class="btn btn-outline-success" href="<?php echo base_url('login'); ?>">Login</a>
                <?php } else { ?>
                    <a class="btn btn-outline-primary" aria-current="page" href="<?php echo base_url('logout'); ?>">Logout</a>
                <?php } ?>
            </li>
        </ul>
      </form>
    </div>
  </div>
</nav>