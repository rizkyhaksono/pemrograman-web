const firstInput = document.getElementById("first");
const secondInput = document.getElementById("second");

function getData() {
  const firstNumber = parseFloat(firstInput.value);
  const secondNumber = parseFloat(secondInput.value);

  if (isNaN(firstNumber) || isNaN(secondNumber)) {
    alert("Inputan tidak sesuai");
    return;
  }

  const product = firstNumber + secondNumber;

  alert(product);
}

function resetPage() {
  firstInput.value = "";
  secondInput.value = "";
  resultDisplay.textContent = "";
}
