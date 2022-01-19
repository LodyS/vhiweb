

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">Dashboard Fotogram </div>

                <div class="card-body">

                    @foreach ($data as $key => $d)
                        <form method="post" action="{{ ($d->status == 'belum') ? url('like') : url('unlike') }}" >   {{ @csrf_field() }}
                            <input type="hidden" name="foto_id" value="{{ $d->id }}">
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Foto</label>
                                    <div class="col-sm-12">
                                    <img class="card-img-top" src="{{ url('foto/'.$d->nama)}}" width="300" height="300" alt="Card image cap">
                                </div>
                            </div>
                            <p>Dari : {{ $d->dari }}<br/>
                              Caption : {{ $d->caption }}
                            </p>
                            <p class="card-text"><button type="submit" class="{{ ($d->status == 'sudah')? 'btn btn-info' : 'btn btn-secondary'}}">{{ $d->total_like }} | {{ ($d->status == 'belum') ? 'Like' : 'Unlike' }}</button></p>
                            <p class="card-text"><small class="text-muted"></small></p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
