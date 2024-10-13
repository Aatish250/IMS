<?php

session_start();
include 'dbConn.php';
$message = "";
// added login logics in this php
include 'session.php';
if (isset($_SESSION['username']) && isset($_SESSION["role"])) {
  if ($_SESSION['role'] == 'admin') {
    header("location: Admin/Dashboard/dashboard.php");
    // echo "GO TO ADMIN";
  }
  if ($_SESSION['role'] == 'staff') {
    // echo "GO TO STAFF";
    header("Location: Staff/Inventory/inventory.php");
  }
}
?>

<style>
  .flash-message {
    background-color: #ff00004a;
    padding: 4px;
    border-radius: 4px;
  }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log In</title>

  <!-- link for icon -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />

  <!-- link -->
  <link rel="stylesheet" href="login.css" />
</head>

<body>
  <main>
    <div id="flashMessage" class="">
    </div>

    <h2 class="heading-welcome">Welcome</h2>
    <div class="logo-section">
      <svg width="90" height="40" viewBox="0 0 90 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M51.2136 20.5568V21.9886H43.9522V20.5568H51.2136ZM55.3386 12.5455H57.1795L63.5119 27.75H63.6653L69.9977 12.5455H71.8386V30H70.3386V15.9119H70.2022L64.313 30H62.8641L56.9749 15.9119H56.8386V30H55.3386V12.5455ZM85.9565 16.9091C85.8599 15.9375 85.4309 15.1648 84.6695 14.5909C83.9082 14.017 82.9508 13.7301 81.7974 13.7301C80.9849 13.7301 80.269 13.8693 79.6496 14.1477C79.036 14.4261 78.5531 14.8125 78.2008 15.3068C77.8542 15.7955 77.6809 16.3523 77.6809 16.9773C77.6809 17.4375 77.7803 17.8409 77.9792 18.1875C78.1781 18.5341 78.4451 18.8324 78.7803 19.0824C79.1212 19.3267 79.4962 19.5369 79.9053 19.7131C80.3201 19.8892 80.7377 20.0369 81.1582 20.1562L82.9991 20.6847C83.5559 20.8381 84.1127 21.0341 84.6695 21.2727C85.2264 21.5114 85.7349 21.8125 86.1951 22.1761C86.661 22.5341 87.0332 22.9744 87.3116 23.4972C87.5957 24.0142 87.7377 24.6364 87.7377 25.3636C87.7377 26.2955 87.4962 27.1335 87.0133 27.8778C86.5303 28.6222 85.8371 29.2131 84.9337 29.6506C84.0303 30.0824 82.9479 30.2983 81.6866 30.2983C80.4991 30.2983 79.4678 30.1023 78.5928 29.7102C77.7178 29.3125 77.0303 28.7642 76.5303 28.0653C76.0303 27.3665 75.7491 26.5568 75.6866 25.6364H77.3229C77.3798 26.3239 77.607 26.9062 78.0048 27.3835C78.4025 27.8608 78.9195 28.2244 79.5559 28.4744C80.1923 28.7187 80.9025 28.8409 81.6866 28.8409C82.5559 28.8409 83.3286 28.696 84.0048 28.4062C84.6866 28.1108 85.2207 27.7017 85.607 27.179C85.9991 26.6506 86.1951 26.0369 86.1951 25.3381C86.1951 24.7472 86.0417 24.2528 85.7349 23.8551C85.4281 23.4517 84.9991 23.1136 84.4479 22.8409C83.9025 22.5682 83.269 22.3267 82.5474 22.1165L80.4593 21.5028C79.09 21.0937 78.0275 20.5284 77.2718 19.8068C76.5161 19.0852 76.1383 18.1648 76.1383 17.0455C76.1383 16.108 76.3883 15.2841 76.8883 14.5739C77.394 13.858 78.0758 13.3011 78.9337 12.9034C79.7974 12.5 80.7661 12.2983 81.84 12.2983C82.9252 12.2983 83.8854 12.4972 84.7207 12.8949C85.5559 13.2926 86.2178 13.8409 86.7065 14.5398C87.2008 15.233 87.465 16.0227 87.4991 16.9091H85.9565Z" fill="#000"/>
          <path d="M19.0265 27.7544C18.471 27.5268 17.917 27.2965 17.3615 27.0703C17.1759 26.994 17.0311 26.901 16.9902 26.686C16.8002 25.6786 16.0313 25.3276 15.0811 25.1541C14.0974 24.9751 14.0243 24.7809 14.5768 23.9733C15.4831 22.6482 15.2463 21.6006 13.8372 20.7542C13.2276 20.3879 12.5932 20.4004 11.9675 20.7223C11.6913 20.8652 11.4355 21.0456 11.1694 21.2066C10.7236 21.4758 10.4385 21.3342 10.2909 20.8833C10.2412 20.7306 10.2251 20.5669 10.1886 20.4087C9.89914 19.1641 9.44599 18.7881 8.1187 18.6812C8.00176 18.6715 7.88774 18.6327 7.77226 18.6077C7.78249 16.0158 7.77226 13.4239 7.77957 10.8319C7.77957 10.5655 7.69478 10.2769 7.9199 10.0424C11.6898 11.3342 15.4627 12.6177 19.1887 14.0219C19.2486 14.2481 19.2457 14.477 19.2457 14.7087C19.2457 18.8075 19.2457 22.9077 19.2413 27.0065C19.2413 27.266 19.3583 27.5726 19.0279 27.7558L19.0265 27.7544Z" fill="#000"/>
          <path d="M20.6052 14.0163C23.2188 13.0839 25.831 12.1501 28.4461 11.219C29.4928 10.8472 30.5482 10.4961 31.5889 10.109C31.9807 9.96332 32.0845 10.0438 32.1137 10.4365C32.2687 12.5428 32.2774 12.5636 30.0322 12.5344C28.9665 12.5206 28.1114 12.7661 27.6597 13.7693C27.439 14.2619 26.98 14.0163 26.635 14.026C25.0753 14.0732 23.8883 14.9571 23.6179 16.3474C23.5609 16.6388 23.5653 16.944 23.5653 17.2437C23.5623 20.152 23.5521 23.0603 23.574 25.9672C23.5784 26.4306 23.4381 26.6762 22.9762 26.8427C22.2292 27.1105 21.5085 27.4436 20.7762 27.7488C20.4517 27.6253 20.4882 27.352 20.4882 27.1008C20.4853 23.5196 20.4575 19.9397 20.5087 16.3585C20.5204 15.5801 20.4751 14.7906 20.6052 14.0122V14.0163Z" fill="#000"/>
          <path d="M8.57037 9.09745C10.5891 8.37454 12.5566 7.66828 14.5242 6.96341C16.0474 6.41811 17.572 5.87558 19.0937 5.32889C19.4869 5.18736 19.8947 5.06525 20.3026 5.2054C21.8301 5.73266 23.3475 6.28213 25.0343 6.88155C24.378 7.13269 23.8766 7.33111 23.3708 7.51843C20.3596 8.63262 17.3483 9.74265 14.3385 10.8582C14.0637 10.9609 13.8065 11.058 13.4995 10.9484C11.931 10.3879 10.3581 9.83839 8.78672 9.28199C8.72678 9.26118 8.68439 9.19735 8.57037 9.09884V9.09745Z" fill="#000"/>
          <path d="M31.377 9.15159C28.718 10.0868 26.2841 10.9429 23.8503 11.8004C23.3255 11.985 22.7656 12.1071 22.2833 12.3624C20.6636 13.224 19.0878 13.1574 17.4696 12.3513C16.8513 12.0432 16.1599 11.8698 15.5109 11.6381C15.5035 11.3717 15.7257 11.3925 15.8631 11.3411C19.2574 10.0799 22.6545 8.82413 26.0517 7.56841C26.2768 7.48516 26.4902 7.39635 26.7504 7.49071C28.2224 8.0263 29.6988 8.5494 31.377 9.15021V9.15159Z" fill="#000"/>
          <path d="M28.2912 14.169C28.3189 13.8998 28.4827 13.736 28.7414 13.6486C30.975 13.5904 33.2086 13.6028 35.4422 13.6375C35.9903 14.0038 36.2491 15.0875 35.9655 15.877C35.7375 16.5125 35.182 16.5347 34.5987 16.5306C32.8534 16.5208 31.1095 16.5264 29.3641 16.5264C28.8408 16.5264 28.3979 16.4126 28.2795 15.8368C28.2926 15.2804 28.297 14.724 28.2912 14.1676V14.169Z" fill="#000"/>
          <path d="M37.6173 15.0015C37.1759 15.0084 37.0458 15.1319 37.0297 15.5537C36.9814 16.8289 36.2374 17.4879 34.8926 17.4935C33.1165 17.5004 31.339 17.4949 29.5629 17.4935C27.936 17.4921 27.3527 16.9912 27.1627 15.4316C27.1408 15.2526 27.1656 15.0847 26.8967 15.014C25.8836 14.7475 24.761 15.2818 24.3532 16.2503V16.253C24.3371 22.0307 24.3473 27.8071 24.3473 33.5834C24.7113 34.4853 25.2624 34.8378 26.3602 34.8378C30.1564 34.8405 33.9541 34.8405 37.7503 34.8378C39.2984 34.8364 39.9985 34.1551 39.9985 32.6593C40 27.5088 40 22.3568 39.9985 17.2063C39.9985 15.6592 39.2384 14.9765 37.6173 15.0015ZM32.6794 20.1381H37.4843C37.8468 20.1381 38.1377 20.2672 38.1304 20.6363C38.1231 21.0054 37.8234 21.1136 37.4638 21.1094C36.6628 21.1011 35.8617 21.1066 35.0607 21.108C34.2845 21.108 33.5068 21.1025 32.7306 21.1108C32.352 21.115 32.0099 21.04 32.0129 20.6182C32.0158 20.2478 32.3257 20.1381 32.6794 20.1381ZM26.3426 20.8083C26.5853 20.5558 26.8557 20.6349 27.1203 20.8222C27.4434 21.0498 27.7109 21.602 28.0442 21.4841C28.3745 21.3675 28.5485 20.8472 28.7838 20.5003C29.0469 20.1132 29.294 19.7163 29.5644 19.3334C29.7179 19.1155 29.9445 19.0531 30.2032 19.1613C30.4035 19.246 30.4765 19.4111 30.4692 19.6789C30.4108 19.7857 30.3333 19.9536 30.2339 20.109C29.7398 20.8763 29.2457 21.6436 28.74 22.4026C28.3336 23.0131 28.126 23.0339 27.5515 22.5358C27.1744 22.2097 26.809 21.8726 26.4406 21.5368C26.2052 21.3203 26.0971 21.0636 26.3426 20.8083ZM30.4765 29.597C30.4327 29.6928 30.3815 29.8468 30.2953 29.9814C29.7661 30.8097 29.2267 31.6339 28.6946 32.4609C28.3935 32.9285 28.0529 32.9729 27.6363 32.5844C27.2548 32.2278 26.863 31.8823 26.4698 31.5382C26.2038 31.3051 26.0766 31.0373 26.3558 30.7598C26.6028 30.5142 26.8733 30.6113 27.1349 30.8028C27.4492 31.0331 27.6933 31.5701 28.0632 31.4466C28.3716 31.3439 28.5324 30.8389 28.7546 30.5086C29.0162 30.1201 29.2677 29.7247 29.5352 29.3389C29.6799 29.1308 29.8845 29.0142 30.1579 29.11C30.3611 29.1807 30.4561 29.3348 30.4765 29.597ZM30.3187 24.9668C29.769 25.809 29.2238 26.6526 28.6771 27.4963C28.3979 27.9264 28.0602 27.9819 27.667 27.6295C27.2446 27.2493 26.8221 26.8677 26.4026 26.4848C26.2316 26.328 26.1614 26.1351 26.2491 25.9186C26.3266 25.7258 26.4932 25.6411 26.7739 25.6439C27.1393 25.6855 27.3571 26.0241 27.629 26.2725C27.9243 26.543 28.1041 26.5833 28.3292 26.1961C28.6698 25.612 29.063 25.057 29.4328 24.4895C29.6258 24.1939 29.8655 23.9372 30.2529 24.1773C30.592 24.3868 30.5014 24.6851 30.3187 24.9668ZM37.7416 31.4841C36.6204 31.6811 35.4904 31.5451 34.3649 31.559C33.7012 31.5673 33.0244 31.6825 32.3666 31.4785C32.14 31.2981 31.8989 31.1178 32.0436 30.7861C32.1854 30.4642 32.4953 30.4795 32.7891 30.4795H37.3849C37.6846 30.4795 37.9842 30.4878 38.1099 30.8153C38.243 31.1608 37.9696 31.3134 37.7416 31.4841ZM38.1085 25.9478C37.9784 26.2794 37.6743 26.2711 37.3776 26.2711H32.7788C32.4865 26.2711 32.1751 26.2947 32.0421 25.9603C31.9062 25.6231 32.1561 25.4524 32.3856 25.2762C33.0434 25.0931 33.7173 25.1957 34.3809 25.2027C35.5036 25.2165 36.6306 25.0889 37.7489 25.272C37.9769 25.4455 38.2415 25.6037 38.107 25.9478H38.1085Z" fill="#000"/>
          <path d="M15.0899 26.1615C14.8253 26.1282 14.5695 26.0394 14.3049 26.0061C13.8445 25.9478 13.6296 25.6814 13.3957 25.3137C12.8475 24.4506 13.4103 23.8679 13.862 23.2532C14.2654 22.7023 14.1017 22.2944 13.6413 21.8573C13.1837 21.423 12.7467 21.3522 12.2233 21.7075C12.045 21.8282 11.8564 21.9336 11.6723 22.046C10.6446 22.6732 9.56877 22.2583 9.30126 21.1289C9.23694 20.8583 9.17409 20.5877 9.11269 20.3171C9.01768 19.8953 8.74432 19.7038 8.29264 19.6719C7.21677 19.5956 6.95657 19.7413 6.78409 20.8722C6.66714 21.6395 6.29147 22.0557 5.53719 22.2972C4.80777 22.5303 4.37947 22.0641 3.90439 21.7519C3.29629 21.3509 2.83145 21.3758 2.30959 21.8934C1.83305 22.3652 1.81844 22.7773 2.18973 23.3031C2.56687 23.8359 3.05802 24.3008 2.7072 25.1139C2.38122 25.8687 1.79797 25.9991 1.11971 26.0962C0.451678 26.1906 -0.029246 26.3987 0.0014513 27.1771C0.0350721 28.043 0.103775 28.1637 1.05831 28.3677C1.22349 28.4037 1.39014 28.4356 1.55678 28.4689C2.69696 28.6979 3.1545 29.7385 2.54055 30.6793C2.30082 31.047 1.95292 31.3634 1.9003 31.7338H1.89883C1.88568 32.0155 1.94707 32.182 2.06548 32.3402C2.65603 33.1339 3.09749 33.2351 3.9497 32.6787C4.57534 32.2708 5.12789 31.9794 5.94356 32.3554C6.67884 32.694 6.67591 33.2809 6.78409 33.847C6.91126 34.5117 7.20508 34.8544 7.98713 34.8572C8.77064 34.86 9.09077 34.5186 9.18286 33.8512C9.20771 33.6694 9.25302 33.4891 9.29688 33.3087C9.54684 32.2833 10.6476 31.8629 11.5948 32.4318C11.8608 32.5927 12.1225 32.762 12.3929 32.9174C12.7759 33.138 13.1209 33.0811 13.46 32.8064C14.2084 32.2 14.2742 31.8892 13.7275 31.1011C13.3358 30.5364 12.9864 30.0438 13.3431 29.2696C13.7158 28.4592 14.4321 28.5064 15.0855 28.376C15.7623 28.24 15.9991 27.9028 15.9991 27.2646C16.0006 26.6277 15.7784 26.2503 15.0899 26.1615ZM8.01782 29.8773C6.47127 29.887 5.21999 28.7118 5.21852 27.2507C5.21852 25.8021 6.49319 24.5991 8.01782 24.6102C9.5176 24.6227 10.7513 25.7854 10.7835 27.216C10.8157 28.6618 9.56292 29.8676 8.01782 29.8773Z" fill="#000"/>
      </svg>
    </div>

    <div class="form-container">

      <form action="" method="POST">

        <input type="text" name="username" id="" placeholder="Username" required /><br /><br />

        <label class="password-container">
          <input type="password" id="password" name="password" placeholder="Password" required />
          <span class="toggle-password" onclick="togglePassword()">
            <i class="ri-eye-line" id="eyeIcon"></i>
          </span>
        </label>

        <select name="role">
          <option value="staff">Staff</option>
          <option value="admin">Admin</option>
        </select>

        <div class="login-btn">
          <button type="submit" name="login">login</button>
        </div>

      </form>

    </div>

  </main>
  <script>
    function togglePassword() {
      const passwordField = document.getElementById("password");
      const eyeIcon = document.getElementById("eyeIcon");

      if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.innerHTML = `<i class="ri-eye-off-line"></i>`; // Change icon when password is visible
      } else {
        passwordField.type = "password";
        eyeIcon.innerHTML = ` <i class="ri-eye-line"></i>`; // Change back to default icon
      }
    }

    // add this function
    function flashMessage(message) {
      var msg = document.getElementById("flashMessage");
      if (message != "") {
        msg.classList.add("flash-message");
        msg.textContent = message;
        msg.style.display = "block";
        setTimeout(() => {
          msg.classList.remove("flash-message");
          msg.style.display = "none";
        }, 3000);
      }
    }
    // send php value here inside the function
    flashMessage("<?php if (isset($message)) echo $message; ?>");
  </script>
</body>

</html>