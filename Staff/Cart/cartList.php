<!-- <tr>
  <td>1</td>
  <td>Lorem ipsum, dolor sit amet</td>
  <td>23</td>
  <td>2</td>
  <td class="qty-ctrl">
    <button class="qty-ctrl-btn minus-btn" data-action="-">
      -
    </button>
    <input type="number" id="old-qty" class="qty-ctrl-inp" value="1" />
    <button class="qty-ctrl-btn plus-btn" data-action="+">+</button>
  </td>
  <td>
    <form method="POST" action="">
      <button type="submit" name="sell-id" value="" class="sell-btn">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 icon">
          <path
            d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
          <path fill-rule="evenodd"
            d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087ZM12 10.5a.75.75 0 0 1 .75.75v4.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l1.72 1.72v-4.94a.75.75 0 0 1 .75-.75Z"
            clip-rule="evenodd" />
        </svg>
        sell
      </button>
      <button type="submit" name="delete-id" value="" class="delete-btn">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 icon">
          <path fill-rule="evenodd"
            d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
            clip-rule="evenodd" />
        </svg>
      </button>
      <input type="number" name="qty" id="new-qty" value="1" hidden/>
    </form>
  </td>
</tr> -->

<?php

$result = mysqli_query($conn, "SELECT * FROM view_cart_items");
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "
        <tr id='sellLi'>  
          <form method='POST' action=''>
            <td>{$row['item_id']}</td>
            <td>{$row['item_title']}</td>
            <td>
              {$row['quantity']}
              <input type='number' id='maxQty' name='quantity' value={$row['quantity']} class='inp' readonly hidden>
            </td>x
            <td>
              <input type='number' id='rate' value={$row['price']} class='inp'>
            </td>
            <td class='qty-ctrl'>
              <button class='qty-ctrl-btn minus-btn' data-action='-'>-</button>
              <input type='number' name='sell-qty' id='sellQty' class='qty-ctrl-inp' value={$row['cart_qty']}>
              <button class='qty-ctrl-btn plus-btn' data-action='+'>+</button>
            </td>
            <td>
              <input type='number' id='total' name='total' class='inp'>
            </td>
            <td>
              <button type='submit' name='sell-item' value='{$row['item_id']}' class='sell-btn' id='sellBtn'>  
              <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='size-6 icon'>
                <path d='M12 7.5a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z' />
                <path fill-rule='evenodd' d='M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 14.625v-9.75ZM8.25 9.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM18.75 9a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V9.75a.75.75 0 0 0-.75-.75h-.008ZM4.5 9.75A.75.75 0 0 1 5.25 9h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1-.75-.75V9.75Z' clip-rule='evenodd' />
                <path d='M2.25 18a.75.75 0 0 0 0 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 0 0-.75-.75H2.25Z' />
              </svg>
                SELL
              </button>
              <button type='submit' name='delete-id' value='{$row['item_id']}' class='delete-btn'>
                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='size-6 icon'>
                  <path d='M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z' />
                  <path fill-rule='evenodd' d='m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.133 2.845a.75.75 0 0 1 1.06 0l1.72 1.72 1.72-1.72a.75.75 0 1 1 1.06 1.06l-1.72 1.72 1.72 1.72a.75.75 0 1 1-1.06 1.06L12 15.685l-1.72 1.72a.75.75 0 1 1-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 0 1 0-1.06Z' clip-rule='evenodd' />
                </svg>

              </button>
              <input type='number' name='qty' id='new-qty' value='{$row['cart_qty']}'hidden />
            </td>
          </form>
        </tr>
      ";
  }
} else {
  echo "<tr><td colspan='5' style='color: #888;'> -------------- --- -- - No Requests - -- --- -------------- </td></tr>";
}

?>