var checkbox = document.querySelector('input[name="theme"]');
checkbox.addEventListener("change", function () {
  if (this.checked) {
    document.documentElement.setAttribute("data-theme", "dark");
  } else {
    document.documentElement.setAttribute("data-theme", "light");
  }
});

function getHistory() {
  return document.querySelector(".upper-value").innerHTML;
}

function printHistory(num) {
  document.querySelector(".upper-value").innerHTML = num;
}

function getOutput() {
  return document.querySelector(".lower-value").innerHTML;
}

function printOutput(num) {
  if (num == "") {
    document.querySelector(".lower-value").innerHTML = num;
  } else {
    document.querySelector(".lower-value").innerHTML = getFormattedNumber(num);
  }
}

function getFormattedNumber(num) {
  if (num == "-") {
    return "";
  }
  var n = Number(num);
  var value = n.toLocaleString("en"); // mengembalikan string di tampilan layar dari angka tsb.

  return value;
}

function reverseNumberFormat(num) {
  return Number(num.replace(/,/g, "")); //memberikan nilai koma yg terpisah
}

var hamburgerBtn = document.getElementsByClassName("btn-menu");

function onClickMenu() {
  alert("Hai" + hamburgerBtn);
}

// Get the modal and button elements
var modal = document.getElementById("myModal");
var openModalButton = document.getElementById("openModalButton");
var closeModalButton = document.getElementById("closeModalButton");

// Open the modal when the button is clicked
openModalButton.onclick = function () {
  modal.style.display = "block";
};

// Close the modal when the close button is clicked
closeModalButton.onclick = function () {
  modal.style.display = "none";
};

// Close the modal if the user clicks outside of it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

var operator = document.getElementsByClassName("operator");

for (var i = 0; i < operator.length; i++) {
  operator[i].addEventListener("click", function () {
    if (this.id == "clear") {
      printHistory("");
      printOutput("");
    } else if (this.id == "backspace") {
      var output = reverseNumberFormat(getOutput()).toString();
      if (output) {
        output = output.substr(0, output.length - 1);
        printOutput(output);
      }
    } else {
      var output = getOutput();
      var history = getHistory();
      if (output == "" && history != "") {
        if (isNaN(history[history.length - 1])) {
          history = history.substr(0, history.length - 1);
        }
      }
      if (output != "" || history != "") {
        output = output == "" ? output : reverseNumberFormat(output);
        history = history + output;
        if (this.id == "=") {
          Let = result = eval(history);
          printOutput(result);
          printHistory("");
        } else if (this.id == "%") {
          Let = n = reverseNumberFormat(getOutput());
          Let = percent = n / 100;
          printOutput(percent.toFixed(4));
        } else {
          history = history + this.id;
          printHistory(history);
          printOutput("");
        }
      }
    }
  });
}
var number = document.getElementsByClassName("number");
for (Let = i = 0; i < number.length; i++) {
  number[i].addEventListener("click", function () {
    var output = reverseNumberFormat(getOutput());
    //jika output adalah angka
    if (output != NaN) {
      output = output + this.id;
      printOutput(output);
    }
  });
}
