<div class="table-container">
<h4 class="archive-title"><?php echo $title; ?></h4>
  <div class="row">
    <table class="table table-bordered table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col" class="ccy_type_eur">
            BUY
          </th>
          <th scope="col" class="ccy_type_usd">
            SALE
          </th>
          <th scope="col">BANK</th>
          <th scope="col">DATE</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($data as $data_item): ?>
        <tr>
          <th scope="row"><?php echo $data_item['currency_type']; ?></th>
          <td class="buy_usd">
                <?php echo $data_item['buy']; ?>
          </td>
          <td class="sale_usd">
                <?php echo $data_item['sale']; ?>
          </td>
          <td class="bank">
                <?php echo $data_item['bank']; ?>
          </td>
          <td class="date">
                <?php echo $data_item['current_date']; ?>
          </td>
        </tr>
        <?php endforeach; ?>
        <!-- <tr>
          <th scope="row">EUR</th>
          <td class="buy_eur">
            <div class="spinner-border spinner-border-sm text-warning" role="status"></div>
          </td>
          <td class="sale_eur">
            <div class="spinner-border spinner-border-sm text-warning" role="status"></div>
          </td>
        </tr> -->
        
      </tbody>
    </table>
  </div>
</div>