let current = document.getElementById("current_date");
let end = document.getElementById("end_date");
let endVal = end.value;

let currentDate = () => {
    if (current.checked) {
        end.setAttribute("disabled", true);
        end.value = null;
    } else {
        end.removeAttribute("disabled");
        end.value = endVal;
    }
};

current.addEventListener("click", currentDate);

currentDate();
