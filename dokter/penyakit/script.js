const dialogTambah = document.getElementById("dialog");
        const dialogEdit = document.getElementById("dialog-edit");
        const showBtn = document.getElementById("btn-click");
        const closeBtnTambah = document.getElementById("close-dialog-tambah");
        const closeBtnEdit = document.getElementById("close-dialog-edit");

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
                        document.getElementById('edit-keterangan').value = data.keterangan;
                        document.getElementById('edit-gejala').value = data.gejala;
                        document.getElementById('edit-solusi').value = data.solusi;
                        dialogEdit.showModal();
                    });
            });
        });