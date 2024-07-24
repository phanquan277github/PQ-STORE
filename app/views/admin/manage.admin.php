<?php if (!empty($noti = Session::flashData('success'))): ?>
  <script>alert('<?php echo $noti?>')</script>
<?php endif; ?>

<div class="container-fluid">
  <div class="d-flex justify-content-between">
    <h1 class="h3 mb-3 text-gray-800">Quản lí admin</h1>
    <button type="button" class="btn btn-primary mx-3 mb-3" id="add">Thêm quản trị viên</button>
  </div>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">User Name</th>
              <th scope="col">Password</th>
              <th scope="col">Role</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($admin)): ?>
              <?php foreach ($admin as $r): ?>
                <tr>
                  <td scope="row"><?php echo $r['id'] ?></td>
                  <td scope="row"><?php echo $r['username'] ?></td>
                  <td scope="row"><?php echo $r['password'] ?></td>
                  <td scope="row"><?php echo $r['role'] ?></td>
                  <td scope="row" class="d-flex">
                    <button onclick="showEditForm(<?php echo htmlspecialchars(json_encode($r)); ?>)" type="button"
                      class="btn btn-warning mx-2">Chỉnh sửa</button>
                    <a href="<?php echo _WEB_ROOT . '/admin/orderRemove/?id=' . $r['id'] ?>"
                      onclick="return confirm('Xác nhận xóa!');" type="button" class="btn btn-danger mx-2">Xóa</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<div id="update-container" class="row"></div>
<div id="add-container" class="row"></div>

<script>


  function showEditForm(data) {
    const container = document.getElementById('update-container');
    container.innerHTML = `
            <div class="border p-4">
              <form action="<?php echo _WEB_ROOT; ?>/admin/updateAdmin" method="post" class="">
              <input type="hidden" name="id" value="${data.id}">
              <div class="row mb-3">
                <div class="col-6">
                  <label for="username" class="form-label h4">User Name</label>
                  <input type="text" class="form-control fs-4" id="username" name="username" value="${data.username}">
                </div>
                <div class="col-6">
                  <label for="password" class="form-label h4">Password</label>
                  <input type="text" class="form-control fs-4" id="password" name="password" value="${data.password}">
                </div>
              </div>
              <div class="mb-3">
                <label for="role" class="form-label h4">Role</label>
                <select class="fs-4" id="role" name="role">
                  <option value="admin">Admin</option>
                  <option value="manager">Quản lí</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Save</button>
              <button type="button" class="btn btn-secondary" onclick="hideEditForm()">Cancel</button>
            </form>
              </div>
            `;
  }
  function hideEditForm() {
    const container = document.getElementById('update-container');
    container.innerHTML = '';
  }

  $(document).ready(function() {
    $('#add').on('click', function() {
      $('#add-container').html(`
        <div class="border p-4">
          <form action="<?php echo _WEB_ROOT; ?>/admin/addAdmin" method="post">
            <div class="row mb-3">
              <div class="col-6">
                <label for="new-username" class="form-label h4">User Name</label>
                <input type="text" class="form-control fs-4" id="new-username" name="username" required>
              </div>
              <div class="col-6">
                <label for="new-password" class="form-label h4">Password</label>
                <input type="text" class="form-control fs-4" id="new-password" name="password" required>
              </div>
            </div>
            <div class="mb-3">
              <label for="new-role" class="form-label h4">Role</label>
              <select class="fs-4" id="new-role" name="role" required>
                <option value="admin">Admin</option>
                <option value="manager">Quản lí</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
            <button type="button" class="btn btn-secondary" onclick="hideAddForm()">Cancel</button>
          </form>
        </div>
      `);
    });
  });

  function hideAddForm() {
    $('#add-container').html('');
  }
</script>