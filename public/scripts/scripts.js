window.onload =function(){
  console.log('loaded');
  if (document.getElementById("raining")){
    showRain();
  }
}

const rainfallTime = 1.5;
let rainingInterval;

const showRain = function() {
  console.log('showint');
  const raindrop = document.createElement("div");
  raindrop.id="raindropcontainer"
  document.getElementById("raining").appendChild(raindrop);
  let idIterator = 0;

  rainingInterval = setInterval(function() {
    createDrop(Math.floor(Math.random() * 100), "raindrop" + idIterator);
    idIterator = idIterator + 1;
  }, 300);
}

const stopRain = function() {
  clearInterval(rainingInterval);
  document.getElementById("container").removeChild(document.getElementById("raindropcontainer"))
};

const createDrop = function(xIndex, id) {
  const cont = document.getElementById("raindropcontainer");
  const raindrop = document.createElement("img");

  raindrop.setAttribute("id", id);
  raindrop.setAttribute("src", "/images/raindrop.svg");
  raindrop.setAttribute("class", "raindrop");
  raindrop.style.left = xIndex + "vw";
  raindrop.style.animation = `rainfall ${rainfallTime}s linear normal`;
  cont.appendChild(raindrop);

  setTimeout(function() {
    cont.removeChild(document.getElementById(id));
  }, rainfallTime * 1000);
};


function checkSeason(selected, planted) {
    let season = JSON.parse(
        document.getElementById("date-message").dataset.plantingTimes
    )[selected];
    let dateInputMonth = new Date(planted).getMonth();
    if (season.seasonstart > season.seasonend) {
        return (
            dateInputMonth >= season.seasonstart ||
            dateInputMonth <= season.seasonend
        );
    }
    return (
        dateInputMonth >= season.seasonstart &&
        dateInputMonth >= season.seasonend
    );
}

//input rules for iodine
Iodine.addRule(
    "matchingPassword",
    value => value === document.getElementById("password").value
);
Iodine.addRule("lettersSpacesDashes", value => value.match(/[a-zA-Z -]+$/));
Iodine.messages.lettersSpacesDashes =
    "Please only use letters spaces and dashes in name";
Iodine.addRule(
    "matchingPassword",
    (value) => value === document.getElementById("password").value
  );
Iodine.messages.matchingPassword =
    "Password confirmation needs to match password";

function form() {
    return {
      inputElements: [],
      init: function () {
        this.initInputElements();
        this.initDomData();
        this.updateState();
      },
      initInputElements: function () {
        this.inputElements = [...this.$el.querySelectorAll("input[data-rules]")];
      },
      initDomData: function () {
        this.inputElements.map((ele) => {
          this[ele.name] = {};
          this[ele.name].serverErrors = JSON.parse(ele.dataset.serverErrors);
          this[ele.name].blurred = false;
        });
      },
      updateState: function () {
        this.inputElements.map((ele) => {
          this[ele.name].errorMessage = this.getErrorMessage(
            this[ele.name],
            ele.value,
            JSON.parse(ele.dataset.rules)
          );
        });
      },
      getErrorMessage: function (input, value, rules) {
        let isValid = Iodine.is(value, rules);
        if (input.serverErrors.length > 0) {
          return input.serverErrors[0];
        }
        if (isValid !== true && input.blurred) {
          return Iodine.getErrorMessage(isValid);
        }
        return "";
      },
      submit: function (event) {
        this.inputElements.map((input) => {
          if (Iodine.is(input.value, JSON.parse(input.dataset.rules)) !== true) {
            event.preventDefault();
          }
          this[input.name].blurred = true;
        });
        this.updateState();
      },
      change: function (event) {
        if (!this[event.target.name]) {
          return false;
        }
        if (event.type === "input") {
          this[event.target.name].serverErrors = [];
        }
        if (event.type === "focusout") {
          this[event.target.name].blurred = true;
        }
        this.updateState();
      }
    };
  }
  