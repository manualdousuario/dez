// Função principal de atualização do tema
function updateDezTheme() {
    // Obtem o valor da preferencia salva pelo usuário
    const theme = localStorage.getItem("dezTheme");
  
    // Verifica se o usuário salvou algum valor válido
    if (!!theme) {
      // Se sim, usa a preferência dele
      document.documentElement.dataset.theme = theme;
    } else {
      // Se não, deixa o sistema operacional fazer a escolha por ele
      document.documentElement.dataset.theme = window.matchMedia(
        "(prefers-color-scheme: dark)"
      ).matches
        ? "dark"
        : "light";
    }
  }

// Define qual é o tema por parte do usuário
function setDezTheme(event, theme) {
  event.preventDefault();

  if (theme === "system") {
    // Limpa qualquer escolha salva pelo usuário
    localStorage.removeItem("dezTheme");
  }

  if (theme === "light") {
    // Salva preferência de tema claro (padrão)
    localStorage.setItem("dezTheme", "light");
  }

  if (theme === "dark") {
    // Salva preferência de tema escuro
    localStorage.setItem("dezTheme", "dark");
  }

  updateDezTheme();
}

// Escuta o evento de mudança do tema por parte do sistema operacional. Se mudou, executa novamente a função de atualização
window
  .matchMedia("(prefers-color-scheme: dark)")
  .addEventListener("change", (e) => updateDezTheme());

// Chama a função de atualização toda vez que o script é executado. Como ela que define o tema a ser exibido, para evitar qualquer "piscada" de tema errado, é necessário que o .js esteja sendo chamado no HEAD sem defer ou async
updateDezTheme();
