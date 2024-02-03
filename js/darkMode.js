// Função principal de atualização do tema
function updateDezTheme() {
  // Obtem o valor da preferencia salva pelo usuário
  const theme = localStorage.getItem("dezTheme");
  const isSystenDark = window.matchMedia(
    "(prefers-color-scheme: dark)"
  ).matches;

  // Verifica se o usuário prefere o tema alternativo
  if (theme == "alternate") {
    // Se sim, avisa pro browser escolher o inverso do sistema
    document.documentElement.dataset.theme = isSystenDark ? "light" : "dark";

  } else {
    // Se não, deixa o sistema operacional fazer a escolha por ele
    document.documentElement.dataset.theme = isSystenDark ? "dark" : "light";
   
  }
}

// Define qual é o tema por parte do usuário
function setDezTheme(event) {
  event.preventDefault();

  const currentTheme = localStorage.getItem("dezTheme");

  if (!!currentTheme) {
    // Se está com "alternate" salvo, remove
    localStorage.removeItem("dezTheme");
  } else {
    // SDefine que o tema é alternate
    localStorage.setItem("dezTheme", "alternate");
  }

  updateDezTheme();
}

// Escuta o evento de mudança do tema por parte do sistema operacional. Se mudou, executa novamente a função de atualização
window
  .matchMedia("(prefers-color-scheme: dark)")
  .addEventListener("change", (e) => updateDezTheme());

// Chama a função de atualização toda vez que o script é executado. Como ela que define o tema a ser exibido, para evitar qualquer "piscada" de tema errado, é necessário que o .js esteja sendo chamado no HEAD sem defer ou async
updateDezTheme();