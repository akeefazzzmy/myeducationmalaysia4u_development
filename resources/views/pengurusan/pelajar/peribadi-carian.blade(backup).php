@extends('admin.layouts.main')

@section('body')
<div class="container">
    <div class="main-body">
    
      {{-- Interface Source https://www.bootdey.com/snippets/view/profile-with-data-and-skills --}}
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Carian</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">Senarai Carian</a></li>
              <li class="breadcrumb-item active" aria-current="page">Maklumat Peribadi</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-12">
              <div class="card mb-3">
                      <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                          <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                          <div class="mt-3">
                            <h4>{{$nama->Nama}}</h4>
                            <p class="text-secondary mb-1">Uni Mana /  Apa2 berkenaan</p>
                            <p class="text-muted font-size-sm">a</p>
                          </div>
                        </div>
                      </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Kad Pengenalan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$pelajar->no_kp}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Passport</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$pelajar->NoPassport}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tarikh Lahir</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$pelajar->TarikhLahir}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Umur</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$pelajar->Umur}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Jantina</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$jantina->Keterangan}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Negeri Lahir</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$negeriLahir->NamaNegeri}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Bangsa</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$bangsa->NamaBangsa}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Agama</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$agama->NamaAgama}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$pelajar->Alamat}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Poskod</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$pelajar->Poskod}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Bandar</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$pelajar->Bandar}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Negeri</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$negeri->NamaNegeri}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Negara</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$negara->Keterangan}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Status (data table mana?)</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$pelajar->Status}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    @endsection
