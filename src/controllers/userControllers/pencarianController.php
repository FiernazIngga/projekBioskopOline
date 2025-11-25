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

function ambilPencarianTandai($keyword) {
    $id_user = $_SESSION['id_user'];
    global $connect;

    $sql = "
        SELECT 
            v.*, 
            u.id_user, 
            u.username, 
            sf.id_film AS film_disimpan
        FROM video v
        INNER JOIN simpan_film sf 
            ON v.id = sf.id_film AND sf.id_user = ?
        INNER JOIN users u 
            ON sf.id_user = u.id_user
        WHERE v.judul LIKE ?
        ORDER BY v.judul ASC;
    ";

    $ambil = $connect->prepare($sql);
    $like = "%{$keyword}%";

    $ambil->bind_param("is", $id_user, $like);
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

function ambilGenre($kumpGenre) {
    global $connect;
    if (empty($kumpGenre)) {
        return "error";
    }
    $genreString = implode(" ", $kumpGenre);
    $sql = "SELECT *,
        MATCH(judul, sinopsis, genre)
        AGAINST ('$genreString' IN NATURAL LANGUAGE MODE) AS skor
        FROM video
        WHERE MATCH(judul, sinopsis, genre)
        AGAINST ('$genreString' IN NATURAL LANGUAGE MODE)
        ORDER BY skor DESC";
    // $sql = "SELECT * FROM video WHERE genre IN ($genreList)";
    $ambil = $connect->query($sql);
    if (!$ambil) {
        return "error";
    }
    $isi = "";
    if ($ambil->num_rows > 0) {
        while ($row = $ambil->fetch_assoc()) {
            $isi .= '
                <a href="?page=detail&id=' . $row['id'] . '" class="cardImg">
                    <div class="image">
                        <img src="src/uploads/thumbnail/' . $row["thumbnail"] . '" alt="">
                    </div>
                    <div class="keterangan">
                        <h2 class="judulImg">' . $row["judul"] . '</h2>
                        <p>Durasi : ' . $row["durasi"] . '</p>
                        <p class="rating">Genre : ' . $row["genre"] . '</p>
                        <div class="role ' . $row["role"] . '">' . $row["role"] . '</div>
                    </div>
                </a>
            ';
        }
        return $isi;
    } else {
        return "error";
    }
}


function ambilPencarianRiwayat($keyword) {
    $id_user = $_SESSION['id_user'];
    global $connect;

    $sql = "
        SELECT 
            v.*, 
            u.id_user, 
            u.username, 
            r.id_video AS film_ditonton
        FROM video v
        INNER JOIN riwayat r 
            ON v.id = r.id_video AND r.id_user = ?
        INNER JOIN users u 
            ON r.id_user = u.id_user
        WHERE v.judul LIKE ?
        ORDER BY v.judul ASC;
    ";

    $ambil = $connect->prepare($sql);
    $like = "%{$keyword}%";
    $ambil->bind_param("is", $id_user, $like);

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
