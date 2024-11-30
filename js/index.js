function log_out() {
  const log_out_button = document.querySelector("#logout");

  log_out_button.onclick = () => {
    window.location.href = "../login.php";
  };
}

log_out();
