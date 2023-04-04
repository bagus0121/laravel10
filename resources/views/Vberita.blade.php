@extends('Layout')
@section('Content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script>

<script>
var myInput = document.getElementById('#nama_berita')


// Modal Edit Berita


 // Modal Hapus Berita
 function ModalHapusBerita ($id) {
            $('[name="kd_berita"]').val($id);
           $('#ModalHapusBerita').modal('show');
       }
    // Modal Tambah Berita
    // Modal Tambah Berita
    function ModalTambahBerita (format) {
    $('#ModalTambahBerita').modal('show');
    $('[name="kd_berita"]').val('BRT-' + format);
}   

function ModalEditBerita (id,nama) {
    $('[name="kd_berita"]').val(id);
    $('[name="nama_berita"]').val(nama);
    $('#searchModal').on('shown.bs.modal', function () {
         $(this).find('[autofocus]').focus();
        });

 
    }

          
   </script>


    <a href="#"  onclick="ModalTambahBerita({{ $format  }})" class="btn btn-warning" style="margin-bottom: 20px"> + Add New Data</a>

<!-- Form Modal Tambah Berita -->
<form action="berita/tambah" method="post">
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
                <label  class="form-label">Kode Berita</label>
                <input type="text" class="form-control" name="kd_berita"  readonly>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nama Berita</label>
                <textarea name="nama_berita" class="form-control" required></textarea>
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


<!-- Form Modal Hapus Berita-->
<form action="berita/hapus" method="post">
    @csrf
<div class="modal fade" id="ModalHapusBerita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
          <div class="modal-footer">
              <input type="hidden" name="kd_berita">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
          </div>
      </div>
    </div>
  </div>
</form>
  <!-- Form Modal Hapus Berita-->
 <form action="berita/edit" method="post">
      @csrf
  <div class="modal fade" id="ModalEditBerita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" >Form Ubah</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
  
              <div class="mb-3">
                  <label  class="form-label">Kode Berita</label>
                  <input type="text" class="form-control" name="kd_berita" required readonly>

              </div>
              <div class="mb-3">
                  <label  class="form-label">Nama Berita</label>
                  <input type="text" class="form-control" name="nama_berita" id="#nama_berita" autofocus>
                </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <input type="submit" class="btn btn-primary" name="ubah" value="Ubah">
          </div>
          </div>
      </div>
  </div>
  </form>
  <!-- Form Modal Edit Berita -->
 


<table class="table table-dark table-striped">
    <tr>
        <th>id</th>
        <th>nama</th>
        <th>option</th>
 
    </tr>
    @foreach($berita as $Get)
    <tr>
        <td>{{ $Get->id_berita}}</td>
        <td>{{ $Get->nama}}</td>
       
        <td>
            <a href="#" data-bs-toggle="modal" data-bs-target="#ModalEditBerita" onclick="ModalEditBerita('{{ $Get->id_berita }}' ,'{{ $Get->nama }}')" class="btn btn-info" >Update</a>

            - <a href="#" data-bs-toggle="modal" data-bs-target="#ModalHapusBerita"   onclick="ModalHapusBerita('{{ $Get->id_berita }}')" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach
</table>

@endsection
