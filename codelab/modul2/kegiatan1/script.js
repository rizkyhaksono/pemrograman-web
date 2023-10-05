let firstElement = document.getElementById("first");
let secondElement = document.getElementById("second");

function getData() {
  let first = parseFloat(firstElement.value);
  let second = parseFloat(secondElement.value);

  if (!first == null || !second == null || !first == NaN || !second == NaN) {
    let sum = first + second;

    alert("Total: " + sum);
  } else {
    alert("Inputan harus terisi");
  }
}

function resetPage() {
  window.location.reload();
}
