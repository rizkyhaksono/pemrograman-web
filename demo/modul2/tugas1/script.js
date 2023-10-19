var checkbox = document.querySelector('input[name="theme"]');
checkbox.addEventListener("change", function () {
  if (this.checked) {
    document.documentElement.setAttribute("data-theme", "dark");
  } else {
    document.documentElement.setAttribute("data-theme", "light");
  }
});

var hamburgerBtn = document.getElementsByClassName("btn-menu")[0];
var modal = document.getElementById("myModal");
var closeModal = document.getElementById("closeModal");

hamburgerBtn.addEventListener("click", function () {
  modal.style.display = "block";
});

closeModal.addEventListener("click", function () {
  modal.style.display = "none";
});

window.addEventListener("click", function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
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
  var value = n.toLocaleString("en");

  return value;
}

function reverseNumberFormat(num) {
  return Number(num.replace(/,/g, ""));
}

var operator = document.getElementsByClassName("operator");

var useVisualOperator = false;

for (var i = 0; i < operator.length; i++) {
  operator[i].addEventListener("click", function () {
    if (this.id == "clear") {
      printHistory("");
      printOutput("");
    } else if (this.id == "backspace") {
      var output = reverseNumberFormat(getOutput()).toString();
      if (output) {
        output = output.substring(0, output.length - 1);
        printOutput(output);
      }
    } else {
      var output = getOutput();
      var history = getHistory();
      if (output == "" && history != "") {
        if (isNaN(history[history.length - 1])) {
          history = history.substring(0, history.length - 1);
        }
      }
      if (output != "" || history != "") {
        output = output == "" ? output : reverseNumberFormat(output);
        history = history + output;
        if (this.id == "=") {
          var result;
          if (useVisualOperator) {
            history = history.replace(/\^/g, "**");
            result = eval(history);
            history = history.replace(/\*\*/g, "^");
          } else {
            result = eval(history);
          }
          printOutput(result);
          printHistory("");
        } else if (this.id == "%") {
          var n = reverseNumberFormat(getOutput());
          var input = getOutput();
          var percent = n / 100;
          printOutput(percent.toFixed(4));
          console.log(input);
        } else if (this.id == "^") {
          if (useVisualOperator) {
            history = history.replace(/\^/g, "**");
          }
          history = history + "^";
          printHistory(history);
          printOutput("");
          useVisualOperator = true;
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
for (var i = 0; i < number.length; i++) {
  number[i].addEventListener("click", function () {
    var output = reverseNumberFormat(getOutput());
    if (output != NaN) {
      output = output + this.id;
      printOutput(output);
    }
  });
}
