<?php 

include __DIR__ . "/../../databases/koneksi.php";

function ambilUsers() {
    global $connect;

    $roles = [];
    $konekDbRole = $connect->prepare("SELECT * FROM role");
    $konekDbRole->execute();
    $hasilRole = $konekDbRole->get_result();
    while ($rows = $hasilRole->fetch_assoc()) {
        $roles[$rows['id_user']] = [
            'role' => $rows['role_user'],
            'waktuHabis' => $rows['expired_at']
        ];
    }

    $konekDb = $connect->prepare("SELECT * FROM users");
    $konekDb->execute();
    $hasil = $konekDb->get_result();

    if ($hasil->num_rows === 0) {
        $html = '
        <div class="alert alert-warning text-center mt-4">
            Belum ada user yang join.
        </div>';
        $konekDbRole->close();
        $konekDb->close();
        return $html;
    }

    $html = '
    <div class="containerTampil mt-4">
        <h3 class="mb-3 text-center">Daftar Users</h3>
        <table class="table-hover">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Expired Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>';
    
    $no = 1;
    while ($user = $hasil->fetch_assoc()) {
        $id = $user['id_user'];
        $nama = $user["nama"];
        $username = $user["username"];
        $email = $user["email"];
        $role = $roles[$id]['role'] ?? "Free";
        $tanggal = $roles[$id]['waktuHabis'] ?? "Tidak Ada";

        $html .= "
            <tr>
                <td class='text-center'>".$no."</td>
                <td>".$nama."</td>
                <td class='text-center'>".$username."</td>
                <td>".$email."</td>
                <td class='text-center'>".$role."</td>
                <td class='text-center'>".$tanggal."</td>
                <td class='text-center'>
                    <a href='?adminPage=hapusUser&user=".$id."' 
                    class='buttonHapus' 
                    onclick=\"return konfirmasiHapus('".addslashes($nama)."', this.href);\">
                    Hapus
                    </a>
                </td>
            </tr>";
        $no++;
    }

    $html .= '
            </tbody>
        </table>
    </div>';
    $konekDbRole->close();
    $konekDb->close();
    return $html;
}