<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">Dashboard Fotogram </div>

                    <div class="card-body">


                        @foreach ($data as $key => $d)
                            <form method="post" action="{{  url('destroy', $d->id) }}" >  {{method_field('DELETE')}} {{ @csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            Apakah Anda yakin akan menghapus foto ini?


                            <br/><button type="submit" class="btn btn-danger">Hapus</button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
