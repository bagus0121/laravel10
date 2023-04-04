@extends('Layout')
@section('Content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script>



    <a href="#"href="#" data-bs-toggle="modal" data-bs-target="#ModalTambahBerita"  onclick="ModalTambahBerita()" class="btn btn-warning" style="margin-bottom: 20px"> + Add New Data</a>

<!-- Form Modal Tambah Berita -->
<form id="formTambahBerita" action="berita/tambah" method="post">
    @csrf
<div class="modal fade" id="ModalTambahBerita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Form Tambah</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        <div class="mb-3">
    <label class="form-label">NPM</label>
    <input type="text" class="form-control" name="npm" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
    <span id="npm-error" class="text-danger"></span>
</div>

            <div class="mb-3">
                <label  class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Phone</label>
                <textarea name="phone" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Adress</label>
                <textarea name="address" class="form-control" required></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
        </div>
        </div>
    </div>
</div>
</form>
<!-- Form Modal Tambah Berita -->
<script>
function ModalTambahBerita() {
        $('#formTambahBerita').submit(function(e) {
  e.preventDefault(); // menghentikan form submit secara default

  // mengambil data dari form
  var npm = parseInt($('[name="npm"]').val());
  var name = $('[name="nama"]').val();
  var phone = $('[name="phone"]').val();
  var address = $('[name="address"]').val();

  // membuat objek data yang akan dikirimkan
  var data = {
    'NPM': npm,
    'Name': name,
    'Phone': phone,
    'Address': address
  };
      // validasi input NPM
      if (isNaN(npm)) {
            $('#npm-error').html('NPM harus berupa angka');
            return false;
        } else {
            $('#npm-error').html('');
        }
  // mengirimkan data ke server dengan AJAX
  $.ajax({
    type: 'POST',
    url: 'http://localhost:1323/mahasiswa',
    data: JSON.stringify(data),
    contentType: 'application/json',
    success: function(response) {
  // jika data berhasil ditambahkan, tampilkan pesan sukses dan tutup modal
  alert('Data berhasil ditambahkan!');
  $('#ModalTambahBerita').modal('hide');
  location.reload(); // refresh halaman
},

    error: function(xhr, status, error) {
      // jika terjadi error, tampilkan pesan error
      alert('Terjadi kesalahan: ' + error);
    }
  });
});

}
</script>   


<!-- Form Modal Hapus Berita-->
<div class="modal fade" id="ModalHapusBerita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi Hapus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus berita ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" id="hapusBerita">Hapus</button>
      </div>
    </div>
  </div>
</div>

<script>
    function ModalHapusBerita(npm) {
    $('[name="kd_berita"]').val(npm);
    $('#ModalHapusBerita').modal('show');
    $('#hapusBerita').click(function () {
        $.ajax({
            url: 'http://localhost:1323/mahasiswa/' + npm,
            type: 'DELETE',
            success: function (response) {
                alert('Data berhasil dihapus!');
                location.reload();
            },
            error: function () {
                alert('Terjadi kesalahan saat menghapus data.');
                console.log(error   )
            }
        });
    });
}

    </script>
  <!-- Form Modal Hapus Berita-->
    <form id="form-edit" action="berita/edit" method="put">
        <div class="modal fade" id="ModalEditBerita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Ubah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Kode mahasiswa</label>
                            <input type="text" class="form-control" name="npm" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama mahasiswa</label>
                            <input type="text"id="nama" class="form-control" name="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">notlpn mahasiswa</label>
                            <input type="text" id="phone" class="form-control" name="phone" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">alamat mahasiswa</label>
                            <input type="text"id="address" class="form-control" name="address">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
    function ModalEditBerita(npm, nama, phone, address) {
        $('[name="npm"]').val(npm);
        $('[name="nama"]').val(nama);
        $('[name="phone"]').val(phone);
        $('[name="address"]').val(address);

        $('#form-edit').submit(function(e) {
  e.preventDefault(); // menghentikan form submit secara default
var name = $('#nama').val();
var phone = $('#phone').val();
var address = $('#address').val();

// membuat objek data yang akan dikirimkan
var data = {
  'Name': name,
  'Phone': phone,
  'Address': address
};



  // mengirimkan data ke server dengan AJAX
  $.ajax({
    url: 'http://localhost:1323/mahasiswa/' + npm,
    type: 'PUT',
    data: JSON.stringify(data),
    contentType: 'application/json',
    success: function(response) {
  // jika data berhasil ditambahkan, tampilkan pesan sukses dan tutup modal
  alert('Data berhasil ditambahkan!');
  $('#ModalEditBerita').modal('hide');
  location.reload(); // refresh halaman
},

    error: function(xhr, status, error) {
      // jika terjadi error, tampilkan pesan error
      alert('Terjadi kesalahan: ' + error);
    }
  });
});

    }

 
</script>

  <!-- Form Modal Edit Berita -->
 

  <table class="table table-dark table-striped">
    <tr>
        <th>NPM</th>
        <th>Nama</th>
        <th>NoTlpn</th>
        <th>Alamat</th>
        <th>option</th>
    </tr>
    <tbody id="mahasiswa-table">
    </tbody>
</table>

<script>
    // Ajax Request
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: " http://localhost:1323/mahasiswa", // sesuaikan dengan URL API Anda
            dataType: "json",
            success: function (response) {
                // Loop data dan tambahkan ke dalam tabel
                $.each(response, function (i, data) {
                    var row = $('<tr>');
                    row.append($('<td>').html(data.npm));
                    row.append($('<td>').html(data.name));
                    row.append($('<td>').html(data.phone));
                    row.append($('<td>').html(data.address));
                    row.append($('<td>').html(
                        '<a href="#" data-bs-toggle="modal" data-bs-target="#ModalEditBerita" onclick="ModalEditBerita(\'' + data.npm + '\', \'' + data.name + '\', \'' + data.phone + '\', \'' + data.address + '\')" class="btn btn-info">Update</a>' +
                        '<a href="#" data-bs-toggle="modal" data-bs-target="#ModalHapusBerita" onclick="ModalHapusBerita(\'' + data.npm + '\')" class="btn btn-danger ml-2">Delete</a>'
                    ));
                    $('#mahasiswa-table').append(row);
                });
            },
            error: function (response) {
                console.log(response);
            }
        });
    });
</script>

@endsection
