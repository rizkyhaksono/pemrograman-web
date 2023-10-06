document.getElementById("myForm").addEventListener("submit", function (event) {
  event.preventDefault();

  var lname = document.getElementById("lname").value;
  var email = document.getElementById("email").value;
  var alamat = document.getElementById("alamat").value;

  if (lname === "" || email === "" || alamat === "") {
    alert("Tolong diisi semua bagian");
  } else {
    alert("Pesan telah dikirim");
  }
});
