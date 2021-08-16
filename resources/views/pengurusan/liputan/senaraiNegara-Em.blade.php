<div class="card">
    <div class="card-header">
        <label>{{__('Negara Bawah Liputan')}}</label>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Bil</th>
                    {{-- <th>Kod EM</th>
                    <th>Nama EM</th> --}}
                    <th>Kod Negara</th>
                    <th>Negara</th>
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
                @foreach($liputan as $key=>$wilayah)
                <tr>
                    <td>{{$key+1}}</td>
                    {{-- <td>{{$wilayah->EduMas->Kod_EM}}</td>
                    <td>{{$wilayah->EduMas->NamaEM}}</td> --}}
                    <td>{{$wilayah->Negara->Kod_Negara}}</td>
                    <td>{{$wilayah->Negara->Keterangan}}</td>
                    <td>
                        <a href="#" title="Lihat"><i class="fas fa-eye fa-lg"></i></a>
                        <i class="fas fa-pencil-alt fa-lg" style="color:grey"></i>
                        <i class="fas fa-trash fa-lg" style="color:red"></i>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>