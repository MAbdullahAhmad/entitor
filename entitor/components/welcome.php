<div class="welcome-container">
  <div class="fh-wrapper fh-center">
    <div class="welcome-logo-wrapper">
      <img src="assets/img/logo.png" alt="" class="welcome-logo">
    </div>
    <div class="welcome-anim-arrow">
      <div class="welcome-anim-box" onclick="scrollToNick()">
        <i class="mdi mdi-chevron-down"></i>
      </div>
    </div>
  </div>
  <div class="fh-wrapper fh-center" id="nick">
    <div class="text-center">
      <h1 class="text-muted">Welcome to <b>entitor</b>!</h1>
      <p class="text-muted w-50 mx-auto">
        Enter your Nickname to move next
      </p>
      <form action="index.php" method="post" class="m-auto" style="max-width: 30em;">
        <div class="row mt-5 no-gutters">
          <div class="col">
            <input type="text" name="nick" class="form-control w-rounded px-3" placeholder="Nick" required>
          </div>
          <div class="col-auto pl-3">
            <button type="submit" class="btn btn-success w-rounded px-4">Go</button>
          </div>
          <?php
            if(is_error_message()){
              ?>
                <div class="col-12 mt-2" id="nick-alert-box">
                  <p class="text-danger">
                    <?=error_message()?>
                  </p>
                </div>
              <?php
            }
          ?>
        </div>
      </form>
    </div>
  </div>
</div>