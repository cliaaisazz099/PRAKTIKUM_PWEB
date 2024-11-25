// Fungsi untuk filter alumni berdasarkan input pencarian
function filterAlumni() {
    let input = document.getElementById('search-input').value.toLowerCase(); 
    let alumniItems = document.querySelectorAll('.alumni-item');

    alumniItems.forEach(item => {
        let name = item.getAttribute('data-name').toLowerCase();
        let major = item.getAttribute('data-major').toLowerCase(); 
        const batch = item.getAttribute('data-batch').toLowerCase();
    
        if (name.includes(input) || major.includes(input) || batch.includes(input)) {
            item.style.display = '';  
        } else {
            item.style.display = 'none'; 
        }
    });
}
