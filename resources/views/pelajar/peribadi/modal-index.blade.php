{{-- Modal --}}
{{-- Agama --}}
<div class="modal fade" id="agamaModal" tabindex="-1" role="dialog" aria-labelledby="agamaModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agamaModalTitle">Kemaskini Maklumat Agama</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">@csrf
                <input name="profilid" value="{{$user->profil_pelajar->id}}" hidden>
                <div class="modal-body">
                    Maklumat Agama                    
                    <select name="agama" class="form-control">
                        {{-- <option selected disabled></option> --}}
                        @foreach($senaraiAgama as $key => $agama)
                        <option value="{{$agama->id}}">{{$agama->keterangan}}</option>
                        @endforeach              
                    </select>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Kemaskini</button>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Bangsa --}}
<div class="modal fade" id="bangsaModal" tabindex="-1" role="dialog" aria-labelledby="bangsaModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bangsaModalTitle">Kemaskini Maklumat Bangsa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">@csrf
                <input name="profilid" value="{{$user->profil_pelajar->id}}" hidden>
                <div class="modal-body">
                    Maklumat Bangsa                    
                    <select name="bangsa" class="form-control">
                        @foreach($senaraiBangsa as $key => $bangsa)
                        <option value="{{$bangsa->id}}">{{$bangsa->keterangan}}</option>
                        @endforeach              
                    </select>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Kemaskini</button>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Jantina --}}
<div class="modal fade" id="jantinaModal" tabindex="-1" role="dialog" aria-labelledby="jantinaModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jantinaModalTitle">Kemaskini Maklumat Jantina</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">@csrf
                <input name="profilid" value="{{$user->profil_pelajar->id}}" hidden>
                <div class="modal-body">
                    Maklumat Jantina                    
                    <select name="jantina" class="form-control">
                        @foreach($senaraiJantina as $key => $jantina)
                        <option value="{{$jantina->id}}">{{$jantina->keterangan}}</option>
                        @endforeach              
                    </select>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Kemaskini</button>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Emel --}}
<div class="modal fade" id="emelModal" tabindex="-1" role="dialog" aria-labelledby="emelModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emelModalTitle">Kemaskini Alamat Emel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">@csrf
                <input name="userid" value="{{$user->id}}" hidden>
                <div class="modal-body">
                    Alamat Emel
                    <input class="form-control" name="emel" type="email" value="{{$user->email}}">
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Kemaskini</button>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Nombor Telefon --}}
<div class="modal fade" id="noTelModal" tabindex="-1" role="dialog" aria-labelledby="noTelModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noTelModalTitle">Kemaskini Nombor Telefon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">@csrf
                <input name="userid" value="{{$user->id}}" hidden>
                <div class="modal-body">
                    Nombor Telefon
                    <input class="form-control" name="no_tel" type="text" value="{{$user->no_tel}}">
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Kemaskini</button>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Alamat --}}
<div class="modal fade" id="alamatModal" tabindex="-1" role="dialog" aria-labelledby="alamatModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alamatModalTitle">Kemaskini Alamat Rumah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">@csrf
                <input name="profilid" value="{{$user->profil_pelajar->id}}" hidden>
                <div class="modal-body">
                    <h6>Alamat Rumah</h6>
                        <p><input class="form-control" name="alamat_malaysia" type="text" value="{{$user->profil_pelajar->alamat_malaysia}}"></p>
                    <h6>Daerah</h6>
                        <p><input class="form-control" name="bandar_malaysia" type="text" value="{{$user->profil_pelajar->bandar_malaysia}}"></p>
                    <h6>Poskod</h6>
                        <p><input class="form-control" name="poskod_malaysia" type="text" value="{{$user->profil_pelajar->poskod_malaysia}}"></p>
                    <h6>Negeri</h6>
                        <select class="form-control" name="negeri_alamat">
                            @foreach($senaraiNegeri as $negeri)
                            <option value="{{$negeri->id}}">{{$negeri->keterangan}}</option>
                            @endforeach
                        </select>
                    {{-- <p><input class="form-control" name="negeri_alamat" type="text" placeholder="Sila masukkan negeri bagi alamat rumah di Malaysia"></p> --}}
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Kemaskini</button>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Tarikh Lahir --}}
<div class="modal fade" id="tarikhLahirModal" tabindex="-1" role="dialog" aria-labelledby="tarikhLahirModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tarikhLahirModalTitle">Kemaskini Tarikh Lahir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">@csrf
                <input name="profilid" value="{{$user->profil_pelajar->id}}" hidden>
                <div class="modal-body">
                    Tarikh Lahir
                    <input class="form-control" name="tarikhLahir" type="date" value="{{$user->profil_pelajar->tarikh_lahir}}">
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Kemaskini</button>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Negeri Lahir --}}
<div class="modal fade" id="negeriLahirModal" tabindex="-1" role="dialog" aria-labelledby="negeriLahirModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="negeriLahirModalTitle">Kemaskini Negeri Lahir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">@csrf
                <input name="profilid" value="{{$user->profil_pelajar->id}}" hidden>
                <div class="modal-body">
                    Negeri Lahir
                    <select class="form-control" name="negeri_lahir">
                        @foreach($senaraiNegeri as $negeri)
                        <option value="{{$negeri->id}}">{{$negeri->keterangan}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Kemaskini</button>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('.alert').alert();
</script>