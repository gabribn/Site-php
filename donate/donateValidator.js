var donateForm = document.querySelector(".donateForm");
var amountAlert = document.getElementById("amountError");


donateForm.addEventListener('submit', (event) => {
    const amount = document.getElementById("amount");
    amountAlert.textContent = "";
    amountAlert.style.display = ""
    amount.style.border = "none";

    if(amount.value === null || amount.value === "") {
        amount.style.border = "1px solid #f00";
        amountAlert.style.display = "block";
        amountAlert.textContent = "O campo de doação deve ser preenchido";
        event.preventDefault();
    }
    else if (amount.value <= 0) {
      amount.style.border = "1px solid #f00";
      amountAlert.style.display = "block";
      amountAlert.textContent = "Selecione um valor maior que 0";
      event.preventDefault();
    }
  
});