<div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-xxl-5">
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
      <!-- <div class="specifications__footer">
      <div class="specifications__footer__btn">
        Xem thêm<i class="fa-solid fa-arrows-up-down"></i>
      </div>
    </div> -->
    </table>
  </div>
</div>