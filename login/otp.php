<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Verification</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    input[type=number] {
        -moz-appearance: textfield;
    }
    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #4FAAF4;
    }
    :where(.container, form, .input-field, header) {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .container {
      background: #fff;
      padding: 35px 65px 50px 65px;
      border-radius: 20px;
      row-gap: 20px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
    }
    .container header{
      height: 150px;
      width: 150px;
      background-image: url('images/image.gif');
      background-size: cover;
      background-position: center;
    }
    .container h4 {
      font-size: 1.25rem;
      color: #333;
      font-weight: 500;
    }
    .container p {
      max-width: 250px;
      text-align: center;
      font-size: 13px;
    }
    .container p a {
      color: #4FAAF4;
      text-decoration: none;
    }
    .container p a:hover {
      text-decoration: underline;
    }
    form .input-field {
      flex-direction: row;
      column-gap: 10px;
    }
    form .input-field input {
      height: 50px;
      width: 43px;
      border-radius: 13px;
      outline: none;
      font-size: 1.125rem;
      text-align: center;
      border: 1px solid #ddd;
    }
    form .input-field input:focus {
      box-shadow: 0 1px 0 rgba(0, 0, 0, .1);
    }
    form .input-field input::-webkit-inner-spin-button,
    form .input-field input::-webkit-outer-spin-button {
      display: none;
    }
    form button{
      margin-top: 25px;
      margin-bottom: 15px;
      width: 100%;
      color: #fff;
      font-size: 1rem;
      border: none;
      padding: 9px 0;
      cursor: pointer;
      border-radius: 15px;
      pointer-events: none;
      background: #4FAAF4;
      opacity: .5;
      transition: all 0.2s ease;
    }
    form button.active {
      opacity: 1;
      pointer-events: auto;
    }
    form button:hover {
      background: #287ED4;
    }
  </style>
</head>
<body>
  <div class="container">
    <header></header>
    <h4>Masukan OTP</h4>
    <?php if(isset($_GET['error'])){ ?>
        <p style="color: red">OTP yang Anda masukan salah</p>
    <?php } ?>
    <?php if(isset($_GET['sans'])){ ?>
        <p>Kami telah mengirimkan kembali kode OTP ke email untuk nomor verifikasi</p>
    <?php } else { ?>
        <p>Kami telah mengirimkan kode OTP ke email untuk nomor verifikasi</p>
    <?php } ?>
    <form action="otpcontrol.php" method="post">
      <div class="input-field">
        <input type="number" name="id" value="<?php echo $_GET['id'] ?>" hidden>
        <input name="test1" type="number" />
        <input name="test2" type="number" disabled />
        <input name="test3" type="number" disabled />
        <input name="test4" type="number" disabled />
      </div>
      <button type="submit" name="submit">Verify</button>
    </form>
    <p>Belum menerima kode OTP? <br> <a href="otpcontrol.php?id=<?php echo $_GET['id'] ?>">Kirim Ulang</a></p>
  </div>

  <script>
    const inputs = document.querySelectorAll("input"),
      button = document.querySelector("button");

    inputs.forEach((input, index1) => {
      input.addEventListener("keyup", (e) => {
        const currentInput = input,
              nextInput = input.nextElementSibling,
              prevInput = input.previousElementSibling;
        if (currentInput.value.length > 1) {
          currentInput.value = "";
          return;
        }
        if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
          nextInput.removeAttribute("disabled");
          nextInput.focus();
        }
        if (e.key === "Backspace") {
          inputs.forEach((input, index2) => {
            if(index1 <= index2 && prevInput) {
              input.setAttribute("disabled", true);
              input.value = "";
              prevInput.focus();
            }
          });
        }
        if (!inputs[3].disabled && inputs[3].value !== "") {
          button.classList.add("active");
          return;
        }
        button.classList.remove("active");
      });
    });

    window.addEventListener("load", () => inputs[0].focus());
  </script>

</body>
</html>
