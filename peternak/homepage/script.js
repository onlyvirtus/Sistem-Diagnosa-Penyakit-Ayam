document.getElementById("startBtn").onclick = function() {
    fetch('../pertanyaan.php')
        .then(response => response.text())
        .then(data => {
            const pertanyaanDiv = document.getElementById('pertanyaan');
            pertanyaanDiv.innerHTML = data;
            pertanyaanDiv.style.display = 'block';
            document.getElementById('selesaiBtn').style.display = 'block';
        });
}

document.getElementById("selesaiBtn").onclick = function() {
    document.getElementById('pertanyaan').style.display = 'none';
    document.getElementById('selesaiBtn').style.display = 'none';
}


function resetPage() {
    document.querySelector('.analisis').style.display = 'none';
    document.querySelector('.hasil').style.display = 'none';

    document.querySelector('.intro').style.display = 'block';
}