<div class="card">
    <div class="card-header">
        {{__('Senarai Wilayah Liputan') }}
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <th>Nama Negara Liputan Pegawai BEM</th>
                <th>Tindakan</th>
            </tr>
            {{-- Coding asal start --}}
            {{-- @foreach($senarai_Liputan as $liput)
            <tr>
            <td>{{$liput->negara->Nama_Negara}}</td>
                <td>
                <a href="" class="btn btn-primary">Lihat</a>
                 </td>
            </tr>
             @endforeach --}}
             {{-- coding asal end --}}

            <tr>
                <td>Nama Negara ikut kepada apa yang didaftarkan kepada Pegawai BEM ni</td>
                <td><a href="" class="btn btn-primary">Lihat</a></td>
            </tr>
        </table>
    </div>
</div>