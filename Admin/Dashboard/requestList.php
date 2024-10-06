<!-- <tr>
    <td>1</td>
    <td>Lorem ipsum, dolor sit amet</td>
    <td>23</td>
    <td class="qty-ctrl">
      <button class="qty-ctrl-btn minus-btn" data-action="-">
        -
      </button>
      <input type="number" id="old-qty" class="qty-ctrl-inp" value="1" />
      <button class="qty-ctrl-btn plus-btn" data-action="+">+</button>
    </td>
    <td>
      <form method="POST" action="">
        <button type="submit" name="add-id" value="" class="add-btn">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 icon">
            <path
              d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
            <path fill-rule="evenodd"
              d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087ZM12 10.5a.75.75 0 0 1 .75.75v4.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l1.72 1.72v-4.94a.75.75 0 0 1 .75-.75Z"
              clip-rule="evenodd" />
          </svg>
          ADD
        </button>
        <button type="submit" name="delete-id" value="" class="delete-btn">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 icon">
            <path fill-rule="evenodd"
              d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
              clip-rule="evenodd" />
          </svg>
        </button>
        <input type="number" ame="qty" id="new-qty" value="1" hidden />
      </form>
    </td>
  </tr> -->

<?php

$result = mysqli_query($conn, "SELECT * FROM view_requests");
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "
        <tr>
          <td>{$row['item_id']}</td>
          <td>{$row['item_title']}</td>
          <td>{$row['quantity']}</td>
          <td class='qty-ctrl'>
            <button class='qty-ctrl-btn minus-btn' data-action='-'>-</button>
            <input type='number' id='old-qty' class='qty-ctrl-inp' value='{$row['request_qty']}' />
            <button class='qty-ctrl-btn plus-btn' data-action='+'>+</button>
          </td>
          <td>
            <form method='POST' action=''>
              <button type='submit' name='add-id' value='{$row['item_id']}' class='add-btn'>
              <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='size-6 icon'>
                <path d='M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z' />
                <path fill-rule='evenodd' d='m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087ZM12 10.5a.75.75 0 0 1 .75.75v4.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l1.72 1.72v-4.94a.75.75 0 0 1 .75-.75Z' clip-rule='evenodd' />
              </svg>
                ADD
              </button>
              <button type='submit' name='delete-id' value='{$row['item_id']}' class='delete-btn'>
                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='size-6 icon'>
                  <path d='M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z' />
                  <path fill-rule='evenodd' d='m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.133 2.845a.75.75 0 0 1 1.06 0l1.72 1.72 1.72-1.72a.75.75 0 1 1 1.06 1.06l-1.72 1.72 1.72 1.72a.75.75 0 1 1-1.06 1.06L12 15.685l-1.72 1.72a.75.75 0 1 1-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 0 1 0-1.06Z' clip-rule='evenodd' />
                </svg>

              </button>
              <input type='number' name='qty' id='new-qty' value='{$row['request_qty']} ' />
            </form>
          </td>
        </tr>
      ";
  }
} else {
  echo "<tr><td colspan='5' style='color: #888;'> -------------- --- -- - No Requests - -- --- -------------- </td></tr>";
}

?>