<div class="card">
    <div class="card-header">
        <label>{{__('Negara Bawah Liputan')}} ({{auth()->user()->Kod_Negara}})</label>
    </div>
    <div class="card-body">
        <div class="form-group row">
            {{-- <label for="no_kpPelajar" class="col-sm-3 col-form-label">NAMA NEGARA</label> --}}
            <div class="col-sm-12">
                <select class="form-control negara">
                    <option selected disabled></option>
                    @foreach($liputan as $negara)
                    <option value="{{$negara->Negara->Kod_Negara}}">{{$negara->Negara->Keterangan}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <label>{{__('State Bawah Negara Liputan')}} ({{auth()->user()->Kod_Negara}})</label>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Kod State</th>
                        <th>State</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody class="trState">
                    {{-- <tr> --}}
                        {{-- <td>asdas</td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="#" title="Lihat"><i class="fas fa-eye fa-lg"></i></a>
                            <i class="fas fa-pencil-alt fa-lg" style="color:grey"></i>
                            <i class="fas fa-trash fa-lg" style="color:red"></i>
                        </td> --}}
                    {{-- </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $('.negara').on('change', function()
    {
        $('.trState').empty();
        // console.log($('.negara').val());
        var kodNegara = $('.negara').val();
        $.get('{{Route("EMPopulateState")}}', {'kodNegara':kodNegara}, function(state)
        {
            // console.log(state);
            $.each(state, function()
            {
                // console.log(this.NamaState);
                var id = this.Id;
                var namaState = this.NamaState;
                var kodState = this.Kod_State;
                // console.log(namaState);

                var tr = '<tr><td>'+kodState+'</td><td>'+namaState+'</td><td><a href="#" title="Lihat"><i class="fas fa-eye fa-lg"></i></a><i class="fas fa-pencil-alt fa-lg" style="color:grey"></i><i class="fas fa-trash fa-lg" style="color:red"></i></td></tr>';
                $('.trState').append(tr);
                
                // for (var i = 1; i <= namaState.length; i++)
                // {
                //     var tr = '<tr><td>'+i+'</td><td>'+kodState+'</td><td>'+namaState+'</td><td><a href="#" title="Lihat"><i class="fas fa-eye fa-lg"></i></a><i class="fas fa-pencil-alt fa-lg" style="color:grey"></i><i class="fas fa-trash fa-lg" style="color:red"></i></td></tr>';
                //     $('.trState').append(tr);
                // }
                
            });
        });
    });
</script>