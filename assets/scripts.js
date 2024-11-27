// MAPEANDO OS CAMPOS PARA VALIDAÇÕES
const form = document.getElementById("form");
const formName = document.getElementById("formName");
const formEmail = document.getElementById("formEmail");
const formPhone = document.getElementById("formPhone");
const formMessage = document.getElementById("formMessage");

// FUNÇÃO PARA CHECAGEM DOS CAMPOS
function checkForm() {
  console.log("Função Checagem dos campos");

  let isValid = true;

  if (!checkInputName()) isValid = false;
  if (!checkInputEmail()) isValid = false;
  if (!checkInputPhone()) isValid = false;
  if (!checkInputMessage()) isValid = false;

  return isValid;
}

// FUNÇÃO PARA INPUT / TEXTAREA COM ERRO
function errorInput(input, message) {
  const formItem = input.parentElement;
  const errorMessage = formItem.querySelector(".form__error");

  errorMessage.innerText = message;

  formItem.className = "form__group error";
}

// FUNÇÃO PARA INPUT / TEXTAREA CORRETO
function successInput(input) {
  const formItem = input.parentElement;
  formItem.className = "form__group";
}

// FUNÇÃO PARA CHECAR O NOME
function checkInputName() {
  const formNameValue = formName.value;

  if (formNameValue === "") {
    errorInput(formName, "O nome é obrigatório!");
    return false;
  } else {
    successInput(formName);
    return true;
  }
}

// FUNÇÃO PARA CHECAR O EMAIL
function checkInputEmail() {
  const formEmailValue = formEmail.value;

  if (formEmailValue === "") {
    errorInput(formEmail, "O campo de e-mail é obrigatório!");
    return false;
  } else {
    successInput(formEmail);
    return true;
  }
}

// FUNÇÃO PARA CHECAR O TELEFONE
function checkInputPhone() {
  const formPhoneValue = formPhone.value;

  if (formPhoneValue === "") {
    errorInput(formPhone, "O campo de Telefone é obrigatório!");
    return false;
  } else {
    successInput(formPhone);
    return true;
  }
}

// FUNÇÃO PARA CHECAR A MENSAGEM
function checkInputMessage() {
  const formMessageValue = formMessage.value;

  if (formMessageValue === "") {
    errorInput(formMessage, "O campo de Mensagem é obrigatório!");
    return false;
  } else {
    successInput(formMessage);
    return true;
  }
}

// EVENTO DE SUBMISSÃO DO FORMULÁRIO
form.addEventListener("submit", (event) => {
  if (!checkForm()) {
    event.preventDefault(); // Impede o envio do formulário
    console.log("Erro na validação do formulário");
  }
});
