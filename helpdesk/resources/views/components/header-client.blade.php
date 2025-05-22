<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
      <!-- Brand -->
      <a class="navbar-brand me-5" href="home">HELPDESK</a>

      <!-- Toggle button for mobile (optional if you want it collapsible) -->
      <!-- Uncomment below if you want it responsive -->
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
     

      <!-- Menu -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
       <ul class="navbar-nav">
      <?php 
        if (!isset($_SESSION['jwt_token']) || empty($_SESSION['jwt_token'])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="newTicket">SUBMIT TICKET</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="knowledgeBase">KNOWLEDGEBASE</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary" href="login">LOGIN</a>
          </li>
      <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="newTicket">SUBMIT TICKET</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="knowledgeBase">KNOWLEDGEBASE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="myTickets">MY TICKET</a>
          </li>
          <!-- User Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="far fa-user"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <li><a class="dropdown-item" href="adminhome"><i class="fas fa-user-shield me-2"></i> Admin Portal</a></li>
              <?php endif; ?>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="profile"><i class="fas fa-sign-out-alt me-2"></i> My Profile</a></li>
              <li><a class="dropdown-item" href="logout"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
            </ul>
          </li>
      <?php } ?>
      </ul>
      </div>

  </div>
</nav>