<?php
include 'koneksi.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penyakit</title>
    <link rel="stylesheet" href="a.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="container1">
            <a href="" onclick="index()">
                <img src="../../00image/logo2.png" alt="LOGO" id="logo">
            </a>
            <a href="" onclick="index()" id="ayamsehat">AYAM SEHAT</a>
            <ul class="menu">
                <li><a href="../homepage/homepage.php">Home</a></li>
                <li><a href="../penyakit/penyakit.php">Penyakit</a></li>
                <li><a href="../../0interface/index.php">Logout</a></li>
            </ul>
            <a href="#" id="profile">Profile</a>
        </div>
    </nav>
    <div class="container0"></div>

    <div class="container2">
        <div class='judul'>
            <p id="judul">DAFTAR PENYAKIT</p>
            <button type="button" id="btn-click">TAMBAH PENYAKIT</button>
        </div>
        <div class="listpenyakit">
            <?php
            $sql = "SELECT * FROM p_ayambroiler";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    
                    echo "<div class='penyakit-item'>";
                    echo "  <div class='isipenyakit'>";
                    echo "      <button class='edit-penyakit' data-id='" . $row['idpenyakit'] . "'>Edit</button>";
                    echo "      <img src='uploads/" . $row['gambar'] . "' alt='Gambar Penyakit'>";
                    echo "  </div>";
                    echo "  <h2 id='judulpenyakit'>" . $row['namapenyakit'] . "</h2>";
                    echo "  <h2 id='namailmiah'>" . $row['namailmiah'] . "</h2>";
                    echo "  <h4 id='keterangan'>" . $row['keterangan'] . "</h4>";
                    echo "  <div class='gejala-solusi'>";
                    echo "  <h3><strong>Gejala</strong></h3>";
                    echo "      <p>" . $row['gejala'] . "</p>";
                    echo "  <h3><strong>Solusi</strong></h3>";
                    echo "      <p>" . $row['solusi'] . "</p>";
                    echo "  </div>";
                    echo "</div>";
                }
            } else {
                echo "Tidak ada data ditemukan.";
            }

            $conn->close();
            ?>
        </div>
    </div>
    
    <dialog id="dialog">
        <div id="form-tambah">
            <p>Tambah Penyakit Baru</p>
            <form action="add.php" method="post" enctype="multipart/form-data">
                <label for="namapenyakit">Nama Penyakit</label><br>
                <input type="text" id="namapenyakit" name="namapenyakit" required><br><br>
                <label for="namailmiah">Nama Ilmiah</label><br>
                <input type="text" id="namailmiah" name="namailmiah" required><br><br>
                <label for="gambar">Masukkan Gambar</label><br>
                <input type="file" id="gambar" name="gambar" accept="image/*" required><br><br>
                <label for="idpenyakit">ID Penyakit</label><br>
                <input type="text" id="idpenyakit" name="idpenyakit" required><br><br>
                <label for="keterangan">Keterangan</label><br>
                <textarea id="keterangan-tambah" name="keterangan" required></textarea><br><br>
                <label for="gejala">Gejala</label><br>
                <div id="gejala-container"></div>
                <button type="button" id="tambah-gejala">Tambah Gejala</button><br><br>
                <label for="solusi">Solusi</label><br>
                <textarea id="solusi" name="solusi" required></textarea><br><br>
                <ul class="buttonform">
                    <li><button type="button" id="close-dialog" value="Batal">Batal</button></li>
                    <li><input type="submit" id="submit" value="Tambahkan"></li>
                </ul>
            </form>
        </div>
    </dialog>
    
    <dialog id="dialog-edit">
        <div id="form-edit">
            <h2>Edit Penyakit</h2>
            <form action="edit.php" method="post" enctype="multipart/form-data">
                <input type="hidden" id="edit-idpenyakit" name="idpenyakit">
                <label for="edit-namapenyakit">Nama Penyakit</label><br>
                <input type="text" id="edit-namapenyakit" name="namapenyakit" required><br><br>
                <label for="edit-namailmiah">Nama Ilmiah</label><br>
                <input type="text" id="edit-namailmiah" name="namailmiah" required><br><br>
                <label for="edit-gambar">Masukkan Gambar</label><br>
                <input type="file" id="edit-gambar" name="gambar" accept="image/*"><br><br>
                <label for="edit-idpenyakit">ID Penyakit</label><br>
                <input type="text" id="edit-idpenyakit" name="edit-idpenyakit" required><br><br>
                <label for="edit-keterangan">Keterangan</label><br>
                <textarea id="edit-keterangan" name="keterangan" required></textarea><br><br>
                <label for="edit-gejala">Gejala</label><br>
                <div id="edit-gejala-container"></div>
                <button type="button" id="tambah-gejala-edit">Tambah Gejala</button><br><br>
                <label for="edit-solusi">Solusi</label><br>
                <textarea id="edit-solusi" name="solusi" required></textarea><br><br>
                <button type="button" id="close-dialog-edit" value="Batal">Batal</button>
                <input type="submit" value="Perbarui">
                <button type="button" id="delete-penyakit">Hapus</button>
            </form>
        </div>
    </dialog>

    <script>
        const dialogTambah = document.getElementById("dialog");
        const dialogEdit = document.getElementById("dialog-edit");

        const showBtn = document.getElementById("btn-click");
        const closeBtnTambah = document.getElementById("close-dialog");
        const closeBtnEdit = document.getElementById("close-dialog-edit");

        const deleteBtn = document.getElementById('delete-penyakit');

        showBtn.addEventListener("click", () => {
            dialogTambah.showModal();
        });

        closeBtnTambah.addEventListener("click", () => {
            dialogTambah.close();
        });

        closeBtnEdit.addEventListener("click", () => {
            dialogEdit.close();
        });

        const editButtons = document.querySelectorAll('.edit-penyakit');
        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                const idpenyakit = button.getAttribute('data-id');
                fetch(`edit.php?id=${idpenyakit}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('edit-idpenyakit').value = data.idpenyakit;
                        document.getElementById('edit-namapenyakit').value = data.namapenyakit;
                        document.getElementById('edit-namailmiah').value = data.namailmiah;
                        document.getElementById('edit-keterangan').value = data.keterangan;
                        document.getElementById('edit-solusi').value = data.solusi;

                        // Clear previous gejala inputs
                        const gejalaContainerEdit = document.getElementById('edit-gejala-container');
                        gejalaContainerEdit.innerHTML = '';

                        // Populate gejala inputs with data
                        data.gejala.forEach(gejala => {
                            addGejalaInput(gejalaContainerEdit, gejala.idgejala, gejala.namagejala, gejala.nilaicf);
                        });

                        dialogEdit.showModal();
                    });
            });
        });

        deleteBtn.addEventListener('click', () => {
            const idpenyakit = document.getElementById('edit-idpenyakit').value;
            if (confirm('Apakah Anda yakin ingin menghapus penyakit ini?')) {
                fetch(`delete.php?id=${idpenyakit}`, {
                    method: 'POST'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Penyakit berhasil dihapus.');
                        window.location.reload();
                    } else {
                        alert('Gagal menghapus penyakit.');
                    }
                });
            }
        });

        const tambahGejalaButton = document.getElementById('tambah-gejala');
        const gejalaContainer = document.getElementById('gejala-container');

        tambahGejalaButton.addEventListener('click', () => {
            addGejalaInput(gejalaContainer);
        });

        const tambahGejalaButtonEdit = document.getElementById('tambah-gejala-edit');
        const gejalaContainerEdit = document.getElementById('edit-gejala-container');

        tambahGejalaButtonEdit.addEventListener('click', () => {
            addGejalaInput(gejalaContainerEdit);
        });

        function addGejalaInput(container, idgejala = '', namagejala = '', nilaicf = '') {
            const gejalaDiv = document.createElement('div');
            gejalaDiv.innerHTML = `
                <table>
                    <tr>
                        <td id="idgejala"><label for="idgejala">ID Gejala</label></td>
                        <td><input type="text" name="idgejala[]" size="5" value="${idgejala}" required></td>
                    </tr>
                    <tr>
                        <td id="namagejala"><label for="namagejala">Nama Gejala</label></td>
                        <td><textarea id="namagejala" name="namagejala[]" size="5" value="${namagejala}" required></textarea></td>
                    </tr>
                    <tr>
                        <td id="nilaicf"><label for="nilaicf">Nilai CF</label></td>
                        <td><input type="number" name="nilaicf[]" value="${nilaicf}" step="0.01" min="0" max="1" required></td>
                    </tr>
                </table>
                <button type="button" class="hapus-gejala">Hapus Gejala</button>
                <br><br>
            `;
            container.appendChild(gejalaDiv);

            const hapusGejalaButton = gejalaDiv.querySelector('.hapus-gejala');
            hapusGejalaButton.addEventListener('click', () => {
                container.removeChild(gejalaDiv);
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('gejalaContainer');
            const tambahGejalaButton = document.getElementById('tambahGejalaButton');

            tambahGejalaButton.addEventListener('click', () => {
                addGejalaInput(container);
            });
        });
    </script>
</body>
</html>
