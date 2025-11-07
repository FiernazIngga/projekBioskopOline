<?php 

include __DIR__ . "/../../databases/koneksi.php";

function ambilPencarian($keyword) {
    global $connect;
    $sql = "
        SELECT *,
        MATCH(judul, sinopsis, genre)
        AGAINST (? IN NATURAL LANGUAGE MODE) AS skor
        FROM video
        WHERE MATCH(judul, sinopsis, genre)
        AGAINST (? IN NATURAL LANGUAGE MODE)
        ORDER BY skor DESC;
    ";
    $ambil = $connect->prepare($sql);
    $ambil->bind_param("ss", $keyword, $keyword);
    $ambil->execute();
    $hasil = $ambil->get_result();
    $ambil->close();
    $isi = "";
    if ($hasil->num_rows > 0) {
        while ($row = $hasil->fetch_assoc()) {
            $isi .= '
                <a href="?page=detail&id='.$row['id'].'" class="cardImg">
                    <div class="image">
                        <img src="src/uploads/thumbnail/'.$row["thumbnail"].'" alt="">
                    </div>
                    <div class="keterangan">
                        <h2 class="judulImg">'.$row["judul"].'</h2>
                        <p>Durasi : '.$row["durasi"].'</p>
                        <p class="rating">Genre : '.$row["genre"].'</p>
                        <div class="role '.$row["role"].'">'.$row["role"].'</div>
                    </div>
                </a>
            ';
        }
        return $isi;
    } else {
        return "error";
    }
}