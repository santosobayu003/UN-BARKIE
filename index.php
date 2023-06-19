<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">

    <style>
        .container {
            padding: 20px;
        }

        input {
            margin-bottom: 15px;
        }

        .poin {
            width: 50rem;
        }

        .nilai {
            width: 10rem;
        }
    </style>

</head>

<body>

    <div class="container">

        <!-- form untuk mengirim data poin dan nilai yang nantinya akan di proses -->
        <form method="POST">
            <section>
                <p>Soal (Masukkan nilai-nilai tiap pertanyaan dalam soal yang dipisah dengan koma,maksimal 10 pertanyaan)
                </p>
                <input type="text" class="poin" name="poin"> <br>
                T <input type="text" class="nilai" name="nilai">
                <button>submit</button>
            </section>
        </form>

        <?php

        if (isset($_POST['poin']) && isset($_POST['nilai'])) { // Jika form mengirimkan value poin dan nilai

            // memasukan nilai dari form ke dalam sebuah variabel
            $poin = $_POST['poin'];
            $nilai = $_POST['nilai'];


            $arr_poin = array_map('intval', explode(',', $poin)); // merubah variable $poin menjadi sebuah array
            $t_pertanyaan = count($arr_poin); // Menentukan panjangnya array $arr_poin

            // Perulangan untuk dapat merubah bentuk key & value pada array sesuai yang di inginkan
            for ($i = 0, $k = 1; $k, $i < count($arr_poin); $k++, $i++)

                $array["Pertanyaan " . $k] = $arr_poin[$i];
            echo 'SOAL';
            echo '<pre>';

            // Mencetak bentuk array sesuai yang di inginkan
            print_r($array);


            // Menampilkan variable nilai yang diambil dari form  
            echo '<br> Dengan Nilai total soal (T) = ' . $nilai .  ' ?<br><br>';
            echo 'JAWABAN';

            // Looping untuk mendapatkan semua kombinasi value array, Panjang looping kurang dari panjangnya array
            for ($i = 1, $next = 1; $next < $t_pertanyaan; $next++) {
                if ($i != $next)
                    for ($j = 1, $k = $i + 1; $j < $t_pertanyaan; $j++) {

                        echo '<pre>';

                        // Membentuk sebuah array baru yang berisi array yang di kombinasikan
                        $arr_dsum[] = $array["Pertanyaan " . $j];

                        // Mendapatkan jumlah value array 1+2 , 1+3 dan seterusnya
                        $total_total = array_sum($arr_dsum);

                        // Mencoba menampilkan array yang jika di jumlahkan hasilnya = $nilai
                        if ($total_total = $nilai) {
                            echo '<pre>';
                            print_r($arr_dsum);
                        }
                    }
            }
        }
        ?>
    </div>

</body>

</html>