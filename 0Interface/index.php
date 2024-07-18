<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisis Penyakit Ayam</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<nav class="navbar">
	<div class="container1">
        
    <a href="index.php" onclick="index()">
    <img src="../00image/logo2.png" alt="LOGO" id="logo"></a>
    <a href="index.php" onclick="index()"id="ayamsehat">AYAM SEHAT</a>
		
		<ul class="menu">
			<li><a href="#">Home</a></li>
			<li><a href="#textintro2">Pilih Role</a></li>
			<li><a href="#lb">Latar Belakang</a></li>
			<li><a href="#tujuan">Tujuan</a></li>
			<li><a href="#kontak">Kontak Kami</a></li>
		</ul>
	</div>
</nav>


    <main>
        <div class="container">
            <div class="intro1"  >
                        <p id="textintro">
                        SELAMAT DATANG
                        </p>
                        <a id="isiintro" ><p>"Selamat datang di Sistem Pakar Penyakit Ayam Berbasis Web, 
                            sebuah platform inovatif yang dirancang untuk membantu peternak ayam dalam 
                            mendiagnosis dan mengelola penyakit ayam secara efektif dan efisien. 
                            Sistem ini memanfaatkan teknologi terkini untuk memberikan solusi yang tepat dan 
                            terpercaya dalam merawat kesehatan ayam</p></a>
                    <br>
                
            </div>
        </div>

        
    </main>

        <div class="borderbg">
            <div class="intro2">
                <tr>
                    <p id="textintro2">SIAPAKAH ANDA?</p>
                </tr>
            </div>

            <div class="container2">
                <div class ="bg_peternak">
                    <table>
                        <tr>
                            <td>
                            <div class="container11">
                    <a href="../peternak/homepage/peternak.php" onclick="peternak()">
                        <img src="../00image/peternak.png" alt="Gambar Peternak" id="gambarpeternak">
                        <div class="textpeternak">
                            <a href="../peternak/homepage/peternak.php">PETERNAK AYAM</a>
                            <p id="isipeternak">"Diagnosis cepat dan akurat untuk penyakit ayam broiler"</p>
                        </div>
                    </a>
                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="bg_dokter">
                    <table>
                        <tr>
                            <td>
                            <div class="container11">
                    <a href="../dokter/logindokter/dokter1.php" onclick="dokter()">
                        <img src="../00image/dkter.png" alt="Gambar Dokter" id="gambardokter">
                        <div class="textdokter">
                            <a href="../dokter/logindokter/dokter1.php">DOKTER HEWAN</a>
                            <p id="isidokter">"Memberikan pengetahuan tentang penyakit, gejala, dan faktor kepercayaan (CF). Serta dapat melakukan pembaruan, 
                                seperti input, edit, serta delete"
                            </p>
                        </div>
                    </a>
                </div>

                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            </div>

            <div class="ct_definisi">
                <div class="bg_latarbelakang" id="lb">
                    <a id="textlb">LATAR BELAKANG</a>
                    <a id="isilb" ><p>"Banyak peternak sering kali mengalami kesulitan dalam mendiagnosis penyakit ayam broiler secara tepat dan cepat. Keterbatasan pengetahuan dan pengalaman menjadi faktor utama yang mempengaruhi kemampuan mereka dalam mengidentifikasi penyakit. Kesalahan diagnosa dapat berakibat fatal, sehingga diperlukan 
                        suatu alat bantu yang dapat meningkatkan akurasi diagnosa dan memberikan rekomendasi penanganan yang tepat.
"</p>
</a>
                </div>

                <div class="bg_tujuan" id="tujuan">
                    <a id="texttj">TUJUAN</a>
                    <ul style="list-style-type:none">
                        <li id="isitj">
                            <p>1. Melakukan penalaran terhadap rules penyakit pada ayam dengan Inference Engine Forward Chaining
                            <br>
                            <br>2. Menghitung persentase keyakinan penyakit berdasarkan bobot masing-masing gejala menggunakan metode Certainty Factor. 
                            <br>
                            <br>3. Membangun sebuah sistem pakar yang dapat digunakan untuk melakukan diagnosa penyakit pada ayam 
                            <br>yang mampu membuat suatu 
                            keputusan seperti seorang pakar. 
                            </p>
                        </li>
                    </ul>
                </div>

                
            </div>





    
    <footer>
        <p id="kontak">&copy; Kelompok 2</p>
    </footer>
    <script src="script.js"></script> 
    <script>
      function resetPage() {
          document.querySelector('.analisis').style.display = 'none';
          document.querySelector('.hasil').style.display = 'none';

          // Show intro section
          document.querySelector('.intro').style.display = 'block';
      }

  </script>
</body>
</html>