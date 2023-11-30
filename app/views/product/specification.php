<div class="col-12 col-lg-5">
  <div class="specifications">
    <h2 class="mb-3">Thông số kỹ thuật</h2>
    <table class="table table-striped">
      <tbody>
        <?php foreach ($specifications as $key => $value): ?>
          <?php if ($value['isTitle']): ?>
            <tr class="bg-primary">
              <th class="fw-normal" colspan="2">
                <?php echo $value['title']; ?>
              </th>
            </tr>
          <?php else: ?>
            <tr class="">
              <td class="">
                <?php echo $value['title']; ?>
              </td>
              <td>
                <?php echo $value['content']; ?>
              </td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>