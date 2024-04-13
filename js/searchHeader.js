function searchHeader(event) {
  event.preventDefault();

  const primaryMenu = document.getElementById("primary-menu");
  const searchContatiner = document.getElementById("search-container");

  if (primaryMenu.style.display === "none") {
    primaryMenu.style.display = "flex";
    searchContatiner.style.display = "none";
  } else {
    primaryMenu.style.display = "none";
    searchContatiner.style.display = "block";
  }
}
