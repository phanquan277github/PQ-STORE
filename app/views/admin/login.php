<div class="login-overlay d-flex justify-content-center align-items-center">
  <form class="p-4 rounded-4 fs-4 d-flex flex-column">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" aria-describedby="usernameHelp">
      <div id="usernameHelp" class="form-text"></div>
    </div>
    <div class="mb-4">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" aria-describedby="passwordHelp">
      <div id="passwordHelp" class="form-text"></div>
    </div>
    <button type="button" class="btn btn-secondary fs-4" onclick="login()">Login</button>
    <div class="text-center fs-5 mt-3">
      <a href="#" class="">Forget password?</a> or <a href="#">Sign up</a>
    </div>
  </form>
</div>