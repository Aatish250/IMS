<?php

$result = mysqli_query($conn, "SELECT * FROM full_inventory WHERE quantity < 5");
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "
        <tr>
          <td>{$row['item_id']}</td>
          <td>{$row['item_title']}</td>
          <td>{$row['quantity']}</td>
          <td class='qty-ctrl'>
            <button class='qty-ctrl-btn minus-btn' data-action='-'>-</button>
            <input type='number' id='old-qty' class='qty-ctrl-inp' value=0 />
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
              <input type='number' name='qty' id='new-qty' value=0 hidden/>
            </form>
          </td>
        </tr>
      ";
  }
} else {
  echo "<tr><td colspan='5' style='color: #888;'> -------------- --- -- - No Requests - -- --- -------------- </td></tr>";
}

?>