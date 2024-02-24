function creareFisierTxt() {
    // Obțineți informațiile produsului (nume, preț, etc.)
    var numeProdus = document.getElementById("numeProdus").textContent;
    var pretProdus = document.getElementById("pretProdus").textContent;
  
    // Creați conținutul fișierului text
    var currentDate = new Date();
    var continut = "         Bon Fiscal\n";
    continut += "         SRL 'MAGAZ'\n\n"
    continut += "Nume produs: " + numeProdus + "\n\n";
    continut += "Preț produs: " + pretProdus + " lei\n\n";
    continut += "Dara/ora: " + currentDate;
  
    // Creați un element a (ancoră) pentru descărcarea fișierului
    var ancoraNoua = document.createElement("a");
    ancoraNoua.href = "data:text/plain;charset=utf-8," + encodeURIComponent(continut);
    ancoraNoua.download = "informatii_produs.txt";
    ancoraNoua.style.display = "none";
  
    // Adăugați ancora în document
    document.body.appendChild(ancoraNoua);
  
    // Apăsați automat butonul de descărcare
    ancoraNoua.click();
  
    // Eliminați ancora din document (opțional)
    document.body.removeChild(ancoraNoua);
  }
  