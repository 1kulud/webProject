function affichedate() {
  const now = new Date();
  const date = now.toString();
  document.getElementById("date").innerHTML = date.substr(0, 15);
}
