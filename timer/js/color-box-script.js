jQuery(document).ready(function ($) {
  let cycleCount = 0;
  let intervalId = null;
  let box = $("#color-box");

  box.on("click", function () {
    if (intervalId) return; // Om cykeln redan körs, gör inget

    cycleCount = 0;

    function startCycle() {
      if (cycleCount < 20) {
        // Röd färg i 5 sekunder
        box.css("background-color", "red");
        setTimeout(() => {
          // Grön färg i 10 sekunder
          box.css("background-color", "green");
          setTimeout(() => {
            cycleCount++;
            startCycle(); // Starta nästa cykel
          }, 10000); // Väntar 10 sekunder innan nästa cykel
        }, 5000); // Väntar 5 sekunder innan grön färg visas
      } else {
        // Efter 20 cykler, byt till orange färg
        box.css("background-color", "orange");
        setTimeout(() => {
          box.css("background-color", "");
          intervalId = null; // Återställ så att cykeln kan starta om
        }, 30000); // Orange färg visas i 30 sekunder
      }
    }

    startCycle(); // Starta cykeln direkt vid klick
  });
});
