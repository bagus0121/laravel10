<a href="#"> + Add New Data</a>


<table border="1">
    <tr>
        <th>nama</th>
        <th>komentar</th>
 
    </tr>
    @foreach($profile as $Get)
    <tr>
        <td>{{ $Get->nama_depan}}</td>
        <td>{{ $Get->nama_belakang}}</td>
       
        <td>
            <a href="/controller/edit/{{ $Get->id }}">Update</a>
            |
            <a href="/controller/hapus/{{ $Get->id }}">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
