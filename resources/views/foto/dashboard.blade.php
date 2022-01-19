<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-7">
            <div class="card">
                <div class="card-header">Dashboard Fotogram {{ $pesan }}

                </div>
                <a href="{{ url('form/'. $token) }}" align="right">Tambah Foto</a>
                <form action="{{ url('logout') }}" method="post">
                <button type="submit" class="btn btn-danger" align="right">Logout</button></form><hr/>
                    <div class="card-body">
                        @foreach($foto as $key=> $data)
                            @foreach($data as $d)
                                @foreach($d as $a)
                                    <div class="card-group">
                                        <div class="card">
                                            <img class="card-img-top" src="{{ url('foto/'. $a->nama) }}" width="100" height="400" alt="Card image cap">
                                                <div class="card-body">
                                                <h5 class="card-title"></h5>
                                                <p class="card-text">
                                                    <a href="detail/{{$a->id}}/{{$token}}" class="btn btn-info">Info</a>
                                                    @if($user_id == $a->user_id)<a href="form/{{$a->id}}/{{$token}}" class="btn btn-warning">Edit</a>
                                                    <a href="delete/{{$a->id}}/{{$token}}" class="btn btn-danger">Hapus</a>@endif
                                                </p>
                                                <p class="card-text"><small class="text-muted">{{ $a->tanggal }}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
