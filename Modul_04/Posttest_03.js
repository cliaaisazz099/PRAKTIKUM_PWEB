// Variabel Global
let globalVar = "Ini adalah variabel global"; // Variabel global bisa diakses di mana saja

// Fungsi untuk menampilkan hasil
function aksesVariabel() {
    // Variabel lokal dalam fungsi
    let localVar = "Ini adalah variabel lokal";  // Variabel ini hanya bisa diakses di dalam fungsi ini

    // Menampilkan nilai variabel di dalam fungsi
    let output = "Di dalam fungsi:\n";
    output += "globalVar (global): " + globalVar + "\n"; // Variabel global bisa diakses
    output += "localVar (local): " + localVar + "\n";    // Variabel lokal bisa diakses di sini
    document.getElementById("output").textContent = output;

    // Mencoba mengakses localVar di luar fungsi
    setTimeout(function() {
        let result = "\nDi luar fungsi:\n";
        result += "globalVar (global): " + globalVar + "\n";  // Variabel global masih bisa diakses
        try {
            result += "localVar (local): " + localVar + "\n";   // Ini akan gagal karena localVar tidak bisa diakses di luar fungsi
        } catch (e) {
            result += "localVar (local): Error! Variabel tidak dapat diakses di luar fungsi\n";
        }

        // Menampilkan hasil setelah percakapan timeout
        document.getElementById("output").textContent += result;
    }, 2000);
}
