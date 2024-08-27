document.addEventListener("DOMContentLoaded", function () {
  console.log("JavaScript laddad och klar"); // Kontrollera att detta meddelande visas

  const items = document.querySelectorAll(".num-pronounced-item img");

  items.forEach(function (item) {
    item.addEventListener("click", function () {
      const soundName = item.getAttribute("data-sound");
      const audioUrl = pluginDir.url + "sounds/" + soundName + ".mp3";
      console.log("Spelar ljud från:", audioUrl); // Kontrollera att URL:en är korrekt

      const audio = new Audio(audioUrl);
      audio.play().catch(function (error) {
        console.error("Ljudfilen kunde inte spelas upp:", error);
      });
    });
  });
});
