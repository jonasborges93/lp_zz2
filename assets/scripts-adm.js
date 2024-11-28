// MAPEANDO OS CAMPOS PARA VALIDAÇÕES
const form = document.getElementById("formSecret");
const formSecretPassword = document.getElementById("formSecretPassword");

// FUNÇÃO PARA CHECAGEM DOS CAMPOS
function checkFormSecret() {
  console.log("Função Checagem dos campos");

  let isValid = true;

  if (!checkInputPassword()) {
    isValid = false;
  }

  return isValid;
}

// FUNÇÃO PARA INPUT COM ERRO
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
function checkInputPassword() {
  const formSecretValue = formSecretPassword.value;

  if (formSecretValue === "") {
    errorInput(formSecretPassword, "O campo de não pode ser vazio!");
    return false;
  } else {
    successInput(formSecretPassword);
    return true;
  }
}

// EVENTO DE SUBMISSÃO DO FORMULÁRIO
form.addEventListener("submit", (event) => {
  if (!checkFormSecret()) {
    event.preventDefault(); // Impede o envio do formulário
    console.log("Erro na validação do formulário");
  }
});
