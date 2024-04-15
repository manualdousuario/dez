function searchHeader(event) {
  event.preventDefault();

  const primaryMenu = document.getElementById("primary-menu");
  const searchContainer = document.getElementById("search-container");

  const searchIcon = document.getElementById("search-icon");
  const searchField = document.getElementById("search-field");

  if (primaryMenu.style.display === "none") {
    primaryMenu.style.display = "flex";
    searchIcon.style.opacity = 1;
    searchContainer.style.display = "none";
  } else {
    primaryMenu.style.display = "none";
    searchIcon.style.opacity = 0.3;
    searchContainer.style.display = "block";
    searchField.focus();
  }
}
