let displayValue = "";

function appendToDisplay(value) {
  displayValue += value;
  document.getElementById("display").value = displayValue;
}

function clearInput() {
  displayValue = "";
  document.getElementById("display").value = "";
}

function calculateResult() {
  try {
    displayValue = eval(displayValue);
    document.getElementById("display").value = displayValue;
  } catch (error) {
    document.getElementById("display").value = "Error";
  }
}

function calculatePower() {
  displayValue = Math.pow(parseFloat(displayValue), 2);
  document.getElementById("display").value = displayValue;
}

function calculateModulus() {
  displayValue = eval(displayValue) / 100;
  document.getElementById("display").value = displayValue;
}
