@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('cancion.index') }}"><i class="fa fa-music" aria-hidden="true"></i> Gestion de Canciones</a>
    </li>
    <li class="active">
        <a href="{{ route('cancion.create') }}"><i class="voyager-plus" aria-hidden="true"></i> Crear</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-plus" aria-hidden="true"></i>
        Cargar canción
    </h1>
@endsection

@section('css')
    <style>
        .parrafo {
            font-size: 80%;
            text-align: justify;
            text-justify: inter-word;
            color: gray;
        }

        .identado {
            text-indent: 10px;
        }

    </style>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <form action="{{ route('cancion.store') }}" method="post" id="formRegistro" name="formRegistro"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all('<li>:message</li>') as $message)
                                        {!! $message !!}
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    @csrf

                    <div class="modal-body">
                        @if ($message = Session::get('ErrorInsert'))
                            <div class="col-12 alert-danger alert-dissmissable fade show" role="alert">
                                <h5>Errores:</h5>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    <li>
                                </ul>
                            </div>
                        @endif

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="repertorio_id">Repertorio</label>
                                <br>
                                <select class="repertorio_id col-md-12" name="repertorio_id" id="repertorio_id">
                                    <option value="null" selected disabled hidden>Seleccione una opción</option>
                                    @foreach ($repertorios as $repertorio)
                                        <option value="{{ $repertorio->id }}" {{ old('repertorio_id') == $repertorio->id ? 'selected' : '' }}>{{ $repertorio->titulo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="titulo">Tipo secundario</label>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_secundario" id="tipo_secundario" 
                                        value="original" {{old('tipo_secundario') == 'original' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="tipo_secundario">
                                        Original
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_secundario" id="tipo_secundario"
                                        value="karaoke" {{old('tipo_secundario') == 'karaoke' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="tipo_secundario">
                                        Karaoke
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_secundario" id="tipo_secundario"
                                        value="medley" {{old('tipo_secundario') == 'medley' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="tipo_secundario">
                                        Medley
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_secundario" id="tipo_secundario"
                                        value="cover" {{old('tipo_secundario') == 'cover' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="tipo_secundario">
                                        Cover
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_secundario" id="tipo_secundario"
                                        value="otrogrupo" {{old('tipo_secundario') == 'otrogrupo' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="tipo_secundario">
                                        Versión por otro grupo
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="version">Instrumental</label>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="instrumental" id="instrumental"
                                        value="si" {{old('instrumental') == 'si' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="tipo_secundario">
                                        Sí
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="instrumental" id="instrumental"
                                        value="no" {{old('instrumental') == 'no' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="instrumental">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="titulo">Título</label>
                                <br>
                                <input type="text" class="form-control" id="titulo" name="titulo"
                                    value="{{ old('titulo') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="version_subtitulo">Versión/Subtítulo</label>
                                <br>
                                <input type="text" class="form-control" id="version_subtitulo" name="version_subtitulo"
                                    value="{{ old('version_subtitulo') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="autor">Autor</label>
                                <br>
                                <input type="text" class="form-control" id="autor" name="autor"
                                    value="{{ old('autor') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="nombre_colaboracion">Nombre de la Colaboración</label>
                                <br>
                                <input type="text" class="form-control" id="nombre_colaboracion"
                                    name="nombre_colaboracion" value="{{ old('nombre_colaboracion') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="productor">Compositor</label>
                                <br>
                                <input type="text" class="form-control" id="compositor" name="compositor"
                                    placeholder="Ejemplo: Wolfgang Amadeus Mozart " value="{{ old('compositor') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="copyright">Arreglista</label>
                                <br>
                                <input type="text" class="form-control" id="arreglista" name="arreglista"
                                    placeholder="Ejemplo: Cyro Pereira" value="{{ old('arreglista') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="productor">Productor musical</label>
                                <br>
                                <input type="text" class="form-control" id="productor" name="productor"
                                    placeholder="George Martin" value="{{ old('productor') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="pline">Pline</label>
                                <br>
                                <input type="text" class="form-control" id="pline" name="pline" placeholder="..."
                                    value="{{ old('pline') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="productor">Año de producción</label>
                                <br>
                                <input type="number" step="1" value="2022" class="form-control" id="annio_produccion"
                                    name="annio_produccion" value="{{ old('annio_produccion') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="genero">Selecciona una fecha principal de salida al mercado (*para vídeo
                                    horarios CET)</label>
                                <br>
                                <input type="date" class="form-control" id="fecha_principal_salida"
                                    name="fecha_principal_salida" value="{{ old('fecha_principal_salida') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="genero">Género</label>
                                <br>
                                <select class="genero col-md-12" name="genero" id="genero">
                                    <option value="-1" selected disabled hidden>Seleccione una opción</option>
                                    <option value="Afoxé" {{ old('genero') == "Afoxé" ? 'selected' : '' }}>Afoxé</option>
                                    <option value="Alternative" {{ old('genero') == "Alternative" ? 'selected' : '' }}>Alternative</option>
                                    <option value="Ambient" {{ old('genero') == "Ambient" ? 'selected' : '' }}>Ambient</option>
                                    <option value="Americana" {{ old('genero') == "Americana" ? 'selected' : '' }}>Americana</option>
                                    <option value="Anime" {{ old('genero') == "Anime" ? 'selected' : '' }}>Anime</option>
                                    <option value="Arabesk" {{ old('genero') == "Arabesk" ? 'selected' : '' }}>Arabesk</option>
                                    <option value="Avant-garde" {{ old('genero') == "Avant-garde" ? 'selected' : '' }}>Avant-garde</option>
                                    <option value="Axé" {{ old('genero') == "Axé" ? 'selected' : '' }}>Axé</option>
                                    <option value="Baile Funk" {{ old('genero') == "Baile Funk" ? 'selected' : '' }}>Baile Funk</option>
                                    <option value="Bluegrass" {{ old('genero') == "Bluegrass" ? 'selected' : '' }}>Bluegrass</option>
                                    <option value="Blues" {{ old('genero') == "Blues" ? 'selected' : '' }}>Blues</option>
                                    <option value="Bossa nova" {{ old('genero') == "Bossa nova" ? 'selected' : '' }}>Bossa nova</option>
                                    <option value="Breakbeat" {{ old('genero') == "Breakbeat" ? 'selected' : '' }}>Breakbeat</option>
                                    <option value="Britpop" {{ old('genero') == "Britpop" ? 'selected' : '' }}>Britpop</option>
                                    <option value="Bugio" {{ old('genero') == "Bugio" ? 'selected' : '' }}>Bugio</option>
                                    <option value="C-Pop" {{ old('genero') == "C-Pop" ? 'selected' : '' }}>C-Pop</option>
                                    <option value="Cajun" {{ old('genero') == "Cajun" ? 'selected' : '' }}>Cajun</option>
                                    <option value="Canção" {{ old('genero') == "Canção" ? 'selected' : '' }}>Canção</option>
                                    <option value="Cantopop/HK-Pop 1" {{ old('genero') == "Cantopop/HK-Pop 1" ? 'selected' : '' }}>Cantopop/HK-Pop 1</option>
                                    <option value="Celtic" {{ old('genero') == "Celtic" ? 'selected' : '' }}>Celtic</option>
                                    <option value="Celtic Folk" {{ old('genero') == "Celtic Folk" ? 'selected' : '' }}>Celtic Folk</option>
                                    <option value="Chamamé" {{ old('genero') == "Chamamé" ? 'selected' : '' }}>Chamamé</option>
                                    <option value="Chamarra" {{ old('genero') == "Chamarra" ? 'selected' : '' }}>Chamarra</option>
                                    <option value="Chamber music" {{ old('genero') == "Chamber music" ? 'selected' : '' }}>Chamber music</option>
                                    <option value="Children's music" {{ old('genero') == "Children's music" ? 'selected' : '' }}>Children's music</option>
                                    <option value="Chill-Out" {{ old('genero') == "Chill-Out" ? 'selected' : '' }}>Chill-Out</option>
                                    <option value="Chinese" {{ old('genero') == "Chinese" ? 'selected' : '' }}>Chinese</option>
                                    <option value="Chorinho" {{ old('genero') == "Chorinho" ? 'selected' : '' }}>Chorinho</option>
                                    <option value="Choro" {{ old('genero') == "Choro" ? 'selected' : '' }}>Choro</option>
                                    <option value="Christian" {{ old('genero') == "Christian" ? 'selected' : '' }}>Christian</option>
                                    <option value="Classical" {{ old('genero') == "Classical" ? 'selected' : '' }}>Classical</option>
                                    <option value="Classical Crossover" {{ old('genero') == "Classical Crossover" ? 'selected' : '' }}>Classical Crossover</option>
                                    <option value="Comedy" {{ old('genero') == "Comedy" ? 'selected' : '' }}>Comedy</option>
                                    <option value="Country" {{ old('genero') == "Country" ? 'selected' : '' }}>Country</option>
                                    <option value="Cumbia" {{ old('genero') == "Cumbia" ? 'selected' : '' }}>Cumbia</option>
                                    <option value="Dance" {{ old('genero') == "Dance" ? 'selected' : '' }}>Dance</option>
                                    <option value="Dancehall" {{ old('genero') == "Dancehall" ? 'selected' : '' }}>Dancehall</option>
                                    <option value="Delta blues" {{ old('genero') == "Delta blues" ? 'selected' : '' }}>Delta blues</option>
                                    <option value="Disco" {{ old('genero') == "Disco" ? 'selected' : '' }}>Disco</option>
                                    <option value="Dixieland" {{ old('genero') == "Dixieland" ? 'selected' : '' }}>Dixieland</option>
                                    <option value="Downtempo" {{ old('genero') == "Downtempo" ? 'selected' : '' }}>Downtempo</option>
                                    <option value="Drum and bass" {{ old('genero') == "Drum and bass" ? 'selected' : '' }}>Drum and bass</option>
                                    <option value="Dub" {{ old('genero') == "Dub" ? 'selected' : '' }}>Dub</option>
                                    <option value="Easy listening" {{ old('genero') == "Easy listening" ? 'selected' : '' }}>Easy listening</option>
                                    <option value="Electronic" {{ old('genero') == "Electronic" ? 'selected' : '' }}>Electronic</option>
                                    <option value="Electronica" {{ old('genero') == "Electronica" ? 'selected' : '' }}>Electronica</option>
                                    <option value="Emo" {{ old('genero') == "Emo" ? 'selected' : '' }}>Emo</option>
                                    <option value="Enka" {{ old('genero') == "Enka" ? 'selected' : '' }}>Enka</option>
                                    <option value="Folk" {{ old('genero') == "Folk" ? 'selected' : '' }}>Folk</option>
                                    <option value="Forró" {{ old('genero') == "Forró" ? 'selected' : '' }}>Forró</option>
                                    <option value="French Pop" {{ old('genero') == "French Pop" ? 'selected' : '' }}>French Pop</option>
                                    <option value="Frevo" {{ old('genero') == "Frevo" ? 'selected' : '' }}>Frevo</option>
                                    <option value="Funk" {{ old('genero') == "Funk" ? 'selected' : '' }}>Funk</option>
                                    <option value="Gangsta rap" {{ old('genero') == "Gangsta rap" ? 'selected' : '' }}>Gangsta rap</option>
                                    <option value="German Folk" {{ old('genero') == "German Folk" ? 'selected' : '' }}>German Folk</option>
                                    <option value="German Pop" {{ old('genero') == "German Pop" ? 'selected' : '' }}>German Pop</option>
                                    <option value="Gospel" {{ old('genero') == "Gospel" ? 'selected' : '' }}>Gospel</option>
                                    <option value="Grunge" {{ old('genero') == "Grunge" ? 'selected' : '' }}>Grunge</option>
                                    <option value="Guitarra baiana" {{ old('genero') == "Guitarra baiana" ? 'selected' : '' }}>Guitarra baiana</option>
                                    <option value="Hard bop" {{ old('genero') == "Hard bop" ? 'selected' : '' }}>Hard bop</option>
                                    <option value="Hardcore" {{ old('genero') == "Hardcore" ? 'selected' : '' }}>Hardcore</option>
                                    <option value="Heavy Metal" {{ old('genero') == "Heavy Metal" ? 'selected' : '' }}>Heavy Metal</option>
                                    <option value="Hip Hop/Rap" {{ old('genero') == "Hip Hop/Rap" ? 'selected' : '' }}>Hip Hop/Rap</option>
                                    <option value="Holiday Music" {{ old('genero') == "Holiday Music" ? 'selected' : '' }}>Holiday Music</option>
                                    <option value="House" {{ old('genero') == "House" ? 'selected' : '' }}>House</option>
                                    <option value="Indo Pop" {{ old('genero') == "Indo Pop" ? 'selected' : '' }}>Indo Pop</option>
                                    <option value="Industrial" {{ old('genero') == "Industrial" ? 'selected' : '' }}>Industrial</option>
                                    <option value="Jazz" {{ old('genero') == "Jazz" ? 'selected' : '' }}>Jazz</option>
                                    <option value="Karaoke" {{ old('genero') == "Karaoke" ? 'selected' : '' }}>Karaoke</option>
                                    <option value="Kayokyuoku" {{ old('genero') == "Kayokyuoku" ? 'selected' : '' }}>Kayokyuoku</option>
                                    <option value="Kizomba" {{ old('genero') == "Kizomba" ? 'selected' : '' }}>Kizomba</option>
                                    <option value="Latin Jazz" {{ old('genero') == "Latin Jazz" ? 'selected' : '' }}>Latin Jazz</option>
                                    <option value="Latin Rap" {{ old('genero') == "Latin Rap" ? 'selected' : '' }}>Latin Rap</option>
                                    <option value="Lounge" {{ old('genero') == "Lounge" ? 'selected' : '' }}>Lounge</option>
                                    <option value="Milonga" {{ old('genero') == "Milonga" ? 'selected' : '' }}>Milonga</option>
                                    <option value="Motown" {{ old('genero') == "Motown" ? 'selected' : '' }}>Motown</option>
                                    <option value="MPB" {{ old('genero') == "MPB" ? 'selected' : '' }}>MPB</option>
                                    <option value="New Age" {{ old('genero') == "New Age" ? 'selected' : '' }}>New Age</option>
                                    <option value="New Wave" {{ old('genero') == "New Wave" ? 'selected' : '' }}>New Wave</option>
                                    <option value="Opera" {{ old('genero') == "Opera" ? 'selected' : '' }}>Opera</option>
                                    <option value="Pagode" {{ old('genero') == "Pagode" ? 'selected' : '' }}>Pagode</option>
                                    <option value="Pop" {{ old('genero') == "Pop" ? 'selected' : '' }}>Pop</option>
                                    <option value="Pop in Spanish" {{ old('genero') == "Pop in Spanish" ? 'selected' : '' }}>Pop in Spanish</option>
                                    <option value="Psychedelic" {{ old('genero') == "Psychedelic" ? 'selected' : '' }}>Psychedelic</option>
                                    <option value="Punk" {{ old('genero') == "Punk" ? 'selected' : '' }}>Punk</option>
                                    <option value="Ragtime" {{ old('genero') == "Ragtime" ? 'selected' : '' }}>Ragtime</option>
                                    <option value="Rancheira" {{ old('genero') == "Rancheira" ? 'selected' : '' }}>Rancheira</option>
                                    <option value="Rap" {{ old('genero') == "Rap" ? 'selected' : '' }}>Rap</option>
                                    <option value="Reggae" {{ old('genero') == "Reggae" ? 'selected' : '' }}>Reggae</option>
                                    <option value="Reggaeton" {{ old('genero') == "Reggaeton" ? 'selected' : '' }}>Reggaeton</option>
                                    <option value="Regional Mexicano" {{ old('genero') == "Regional Mexicano" ? 'selected' : '' }}>Regional Mexicano</option>
                                    <option value="Rhythm & Blues" {{ old('genero') == "Rhythm & Blues" ? 'selected' : '' }}>Rhythm & Blues</option>
                                    <option value="Rock" {{ old('genero') == "Rock" ? 'selected' : '' }}>Rock</option>
                                    <option value="Rap" {{ old('genero') == "Rap" ? 'selected' : '' }}>Rap</option>
                                    <option value="Rockabilly" {{ old('genero') == "Rockabilly" ? 'selected' : '' }}>Rockabilly</option>
                                    <option value="Russian Chanson" {{ old('genero') == "Russian Chanson" ? 'selected' : '' }}>Russian Chanson</option>
                                    <option value="Salsa" {{ old('genero') == "Salsa" ? 'selected' : '' }}>Salsa</option>
                                    <option value="Salsa Choke" {{ old('genero') == "Salsa Choke" ? 'selected' : '' }}>Salsa Choke</option>
                                    <option value="Samba" {{ old('genero') == "Samba" ? 'selected' : '' }}>Samba</option>
                                    <option value="Samba-canção" {{ old('genero') == "Samba-canção" ? 'selected' : '' }}>Samba-canção</option>
                                    <option value="Samba-reggae" {{ old('genero') == "Samba-reggae" ? 'selected' : '' }}>Samba-reggae</option>
                                    <option value="Sertaneja" {{ old('genero') == "Sertaneja" ? 'selected' : '' }}>Sertaneja</option>
                                    <option value="Singer-songwrite" {{ old('genero') == "Singer-songwrite" ? 'selected' : '' }}>Singer-songwriter</option>
                                    <option value="Ska" {{ old('genero') == "Ska" ? 'selected' : '' }}>Ska</option>
                                    <option value="Smooth" {{ old('genero') == "Smooth" ? 'selected' : '' }}>Smooth jazz</option>
                                    <option value="Soca" {{ old('genero') == "Soca" ? 'selected' : '' }}>Soca</option>
                                    <option value="Soul" {{ old('genero') == "Soul" ? 'selected' : '' }}>Soul</option>
                                    <option value="Soundtrack" {{ old('genero') == "Soundtrack" ? 'selected' : '' }}>Soundtrack</option>
                                    <option value="Spoken Word" {{ old('genero') == "Spoken Word" ? 'selected' : '' }}>Spoken Word</option>
                                    <option value="Surf" {{ old('genero') == "Surf" ? 'selected' : '' }}>Surf</option>
                                    <option value="Techno" {{ old('genero') == "Techno" ? 'selected' : '' }}>Techno</option>
                                    <option value="Teen Pop" {{ old('genero') == "Teen Pop" ? 'selected' : '' }}>Teen Pop</option>
                                    <option value="Thai Pop" {{ old('genero') == "Thai Pop" ? 'selected' : '' }}>Thai Pop</option>
                                    <option value="Trance" {{ old('genero') == "Trance" ? 'selected' : '' }}>Trance</option>
                                    <option value="Trap" {{ old('genero') == "Trap" ? 'selected' : '' }}>Trap</option>
                                    <option value="Trip Rock" {{ old('genero') == "Trip Rock" ? 'selected' : '' }}>Trip Rock</option>
                                    <option value="Turkish" {{ old('genero') == "Turkish" ? 'selected' : '' }}>Turkish</option>
                                    <option value="Underground" {{ old('genero') == "Underground" ? 'selected' : '' }}>Underground</option>
                                    <option value="Urban Cowboy" {{ old('genero') == "Urban Cowboy" ? 'selected' : '' }}>Urban Cowboy</option>
                                    <option value="Vallenato" {{ old('genero') == "Vallenato" ? 'selected' : '' }}>Vallenato</option>
                                    <option value="Valsa" {{ old('genero') == "Valsa" ? 'selected' : '' }}>Valsa</option>
                                    <option value="Vanera" {{ old('genero') == "Vanera" ? 'selected' : '' }}>Vanera</option>
                                    <option value="Vocal" {{ old('genero') == "Vocal" ? 'selected' : '' }}>Vocal</option>
                                    <option value="World" {{ old('genero') == "World" ? 'selected' : '' }}>World</option>
                                    <option value="Worldbeat" {{ old('genero') == "Worldbeat" ? 'selected' : '' }}>Worldbeat</option>
                                    <option value="Xote" {{ old('genero') == "Xote" ? 'selected' : '' }}>Xote</option>
                                    <option value="Zydeco" {{ old('genero') == "Zydeco" ? 'selected' : '' }}>Zydeco</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="subgenero">Sub-género</label>
                                <br>
                                <select class="subgenero col-md-12" name="subgenero" id="subgenero">
                                    <option value="none" selected disabled hidden>Seleccione una opción</option>
                                        <option value="Acid" {{ old('subgenero') == "Acid" ? 'selected' : '' }}>Acid</option>
                                        <option value="Acid house" {{ old('subgenero') == "Acid house" ? 'selected' : '' }}>Acid house</option>
                                        <option value="Acid Jazz" {{ old('subgenero') == "Acid Jazz" ? 'selected' : '' }}>Acid Jazz</option>
                                        <option value="Acid Punk" {{ old('subgenero') == "Acid Punk" ? 'selected' : '' }}>Acid Punk</option>
                                        <option value="Acid rap" {{ old('subgenero') == "Acid rap" ? 'selected' : '' }}>Acid rap</option>
                                        <option value="Acid rocK" {{ old('subgenero') == "Acid rocK" ? 'selected' : '' }}>Acid rock</option>
                                        <option value="Acid techno" {{ old('subgenero') == "Acid techno" ? 'selected' : '' }}>Acid techno</option>
                                        <option value="Afoxé" {{ old('subgenero') == "Afoxé" ? 'selected' : '' }}>Afoxé</option>
                                        <option value="Afro" {{ old('subgenero') == "Afro" ? 'selected' : '' }}>Afro</option>
                                        <option value="Afro-Cuban Jazz" {{ old('subgenero') == "Afro-Cuban Jazz" ? 'selected' : '' }}>Afro-Cuban Jazz</option>
                                        <option value="Afro-Juju" {{ old('subgenero') == "Afro-Juju" ? 'selected' : '' }}>Afro-Juju</option>
                                        <option value="Afro-Punk" {{ old('subgenero') == "Afro-Punk" ? 'selected' : '' }}>Afro-Punk</option>
                                        <option value="Afrobeat" {{ old('subgenero') == "Afrobeat" ? 'selected' : '' }}>Afrobeat</option>
                                        <option value="Aggrotech" {{ old('subgenero') == "Aggrotech" ? 'selected' : '' }}>Aggrotech</option>
                                        <option value="Air" {{ old('subgenero') == "Air" ? 'selected' : '' }}>Air</option>
                                        <option value="Alternative" {{ old('subgenero') == "Alternative" ? 'selected' : '' }}>Alternative</option>
                                        <option value="Alternative & Rock in Spanish" {{ old('subgenero') == "Alternative & Rock in Spanish" ? 'selected' : '' }}>Alternative & Rock in Spanish</option>
                                        <option value="Ambient" {{ old('subgenero') == "Ambient" ? 'selected' : '' }}>Ambient</option>
                                        <option value="Americana" {{ old('subgenero') == "Americana" ? 'selected' : '' }}>Americana</option>
                                        <option value="Anadolu rock" {{ old('subgenero') == "Anadolu rock" ? 'selected' : '' }}>Anadolu rock</option>
                                        <option value="Anarcho-punk" {{ old('subgenero') == "Anarcho-punk" ? 'selected' : '' }}>Anarcho-punk</option>
                                        <option value="Andean New Age" {{ old('subgenero') == "Andean New Age" ? 'selected' : '' }}>Andean New Age</option>
                                        <option value="Anime" {{ old('subgenero') == "Anime" ? 'selected' : '' }}>Anime</option>
                                        <option value="nti-folk" {{ old('subgenero') == "nti-folk" ? 'selected' : '' }}>Anti-folk</option>
                                        <option value="Arabesk" {{ old('subgenero') == "Arabesk" ? 'selected' : '' }}>Arabesk</option>
                                        <option value="Art" {{ old('subgenero') == "Art" ? 'selected' : '' }}>Art</option>
                                        <option value="Asian" {{ old('subgenero') == "Asian" ? 'selected' : '' }}>Asian</option>
                                        <option value="Audio Book" {{ old('subgenero') == "Audio Book" ? 'selected' : '' }}>Audio Book</option>
                                        <option value="Avant-garde" {{ old('subgenero') == "Avant-garde" ? 'selected' : '' }}>Avant-garde</option>
                                        <option value="Axé" {{ old('subgenero') == "Axé" ? 'selected' : '' }}>Axé</option>
                                        <option value="Bachata" {{ old('subgenero') == "Bachata" ? 'selected' : '' }}>Bachata</option>
                                        <option value="Baião" {{ old('subgenero') == "Baião" ? 'selected' : '' }}>Baião</option>
                                        <option value="Baile Exótico" {{ old('subgenero') == "Baile Exótico" ? 'selected' : '' }}>Baile Exótico</option>
                                        <option value="Baile Funk" {{ old('subgenero') == "Baile Funk" ? 'selected' : '' }}>Baile Funk</option>
                                        <option value="Banda" {{ old('subgenero') == "Banda" ? 'selected' : '' }}>Banda</option>
                                        <option value="Bass" {{ old('subgenero') == "Bass" ? 'selected' : '' }}>Bass</option>
                                        <option value="Bastard Pop" {{ old('subgenero') == "Bastard Pop" ? 'selected' : '' }}>Bastard Pop</option>
                                        <option value="Batá" {{ old('subgenero') == "Batá" ? 'selected' : '' }}>Batá</option>
                                        <option value="sBatucadag39" {{ old('subgenero') == "sBatucadag39" ? 'selected' : '' }}>Batucada</option>
                                        <option value="Batuco" {{ old('subgenero') == "Batuco" ? 'selected' : '' }}>Batuco</option>
                                        <option value="Beat" {{ old('subgenero') == "Beat" ? 'selected' : '' }}>Beat</option>
                                        <option value="Beatboxing" {{ old('subgenero') == "Beatboxing" ? 'selected' : '' }}>Beatboxing</option>
                                        <option value="Bebop" {{ old('subgenero') == "Bebop" ? 'selected' : '' }}>Bebop</option>
                                        <option value="Big band music" {{ old('subgenero') == "Big band music" ? 'selected' : '' }}>Big band music</option>
                                        <option value="Big Bea" {{ old('subgenero') == "Big Bea" ? 'selected' : '' }}>Big Beat</option>
                                        <option value="Bloco afro" {{ old('subgenero') == "Bloco afro" ? 'selected' : '' }}>Bloco afro</option>
                                        <option value="Bluegrass" {{ old('subgenero') == "Bluegrass" ? 'selected' : '' }}>Bluegrass</option>
                                        <option value="Blues" {{ old('subgenero') == "Blues" ? 'selected' : '' }}>Blues</option>
                                        <option value="Bohemian Dub" {{ old('subgenero') == "Bohemian Dub" ? 'selected' : '' }}>Bohemian Dub</option>
                                        <option value="Boi" {{ old('subgenero') == "Boi" ? 'selected' : '' }}>Boi</option>
                                        <option value="Bolero" {{ old('subgenero') == "Bolero" ? 'selected' : '' }}>Bolero</option>
                                        <option value="Bombay po" {{ old('subgenero') == "Bombay po" ? 'selected' : '' }}>Bombay pop</option>
                                        <option value="Bossa nova" {{ old('subgenero') == "Bossa nova" ? 'selected' : '' }}>Bossa nova</option>
                                        <option value="Boy band" {{ old('subgenero') == "Boy band" ? 'selected' : '' }}>Boy band</option>
                                        <option value="Brass" {{ old('subgenero') == "Brass" ? 'selected' : '' }}>Brass</option>
                                        <option value="Brazilian" {{ old('subgenero') == "Brazilian" ? 'selected' : '' }}>Brazilian</option>
                                        <option value="Breakbeat" {{ old('subgenero') == "Breakbeat" ? 'selected' : '' }}>Breakbeat</option>
                                        <option value="Brega" {{ old('subgenero') == "Brega" ? 'selected' : '' }}>Brega</option>
                                        <option value="Bregafunk" {{ old('subgenero') == "Bregafunk" ? 'selected' : '' }}>Bregafunk</option>
                                        <option value="Britpop" {{ old('subgenero') == "Britpop" ? 'selected' : '' }}>Britpop</option>
                                        <option value="Broken beat" {{ old('subgenero') == "Broken beat" ? 'selected' : '' }}>Broken beat</option>
                                        <option value="Bubblegum pop" {{ old('subgenero') == "Bubblegum pop" ? 'selected' : '' }}>Bubblegum pop</option>
                                        <option value="Bugio" {{ old('subgenero') == "Bugio" ? 'selected' : '' }}>Bugio</option>
                                        <option value="Bulerias" {{ old('subgenero') == "Bulerias" ? 'selected' : '' }}>Bulerias</option>
                                        <option value="C-Pop" {{ old('subgenero') == "C-Pop" ? 'selected' : '' }}>C-Pop</option>
                                        <option value="Cabaret" {{ old('subgenero') == "Cabaret" ? 'selected' : '' }}>Cabaret</option>
                                        <option value="Cadence" {{ old('subgenero') == "Cadence" ? 'selected' : '' }}>Cadence</option>
                                        <option value="Cajun" {{ old('subgenero') == "Cajun" ? 'selected' : '' }}>Cajun</option>
                                        <option value="Calypso" {{ old('subgenero') == "Calypso" ? 'selected' : '' }}>Calypso</option>
                                        <option value="Cancão" {{ old('subgenero') == "Cancão" ? 'selected' : '' }}>Cancão</option>
                                        <option value="Canto livre" {{ old('subgenero') == "Canto livre" ? 'selected' : '' }}>Canto livre</option>
                                        <option value="Canto nuevo" {{ old('subgenero') == "Canto nuevo" ? 'selected' : '' }}>Canto nuevo</option>
                                        <option value="Canto popular" {{ old('subgenero') == "Canto popular" ? 'selected' : '' }}>Canto popular</option>
                                        <option value="Cantopop/HK-Pop" {{ old('subgenero') == "Cantopop/HK-Pop" ? 'selected' : '' }}>Cantopop/HK-Pop</option>
                                        <option value="Caopeira music" {{ old('subgenero') == "Caopeira music" ? 'selected' : '' }}>Caopeira music</option>
                                        <option value="Carimbó" {{ old('subgenero') == "Carimbó" ? 'selected' : '' }}>Carimbó</option>
                                        <option value="Catalogue" {{ old('subgenero') == "Catalogue" ? 'selected' : '' }}>Catalogue</option>
                                        <option value="Celtic" {{ old('subgenero') == "Celtic" ? 'selected' : '' }}>Celtic</option>
                                        <option value="Celtic Folk" {{ old('subgenero') == "Celtic Folk" ? 'selected' : '' }}>Celtic Folk</option>
                                        <option value="Celtic Pop" {{ old('subgenero') == "Celtic Pop" ? 'selected' : '' }}>Celtic Pop</option>
                                        <option value="Celtic Rock" {{ old('subgenero') == "Celtic Rock" ? 'selected' : '' }}>Celtic Rock</option>
                                        <option value="Chamamé" {{ old('subgenero') == "Chamamé" ? 'selected' : '' }}>Chamamé</option>
                                        <option value="Chamarra" {{ old('subgenero') == "Chamarra" ? 'selected' : '' }}>Chamarra</option>
                                        <option value="Chamber music" {{ old('subgenero') == "Chamber music" ? 'selected' : '' }}>Chamber music</option>
                                        <option value="Champeta" {{ old('subgenero') == "Champeta" ? 'selected' : '' }}>Champeta</option>
                                        <option value="Chemical breaks" {{ old('subgenero') == "Chemical breaks" ? 'selected' : '' }}>Chemical breaks</option>
                                        <option value="Children's Music" {{ old('subgenero') == "Children's Music" ? 'selected' : '' }}>Children's Music</option>
                                        <option value="Chill-Out" {{ old('subgenero') == "Chill-Out" ? 'selected' : '' }}>Chill-Out</option>
                                        <option value="Chinese" {{ old('subgenero') == "Chinese" ? 'selected' : '' }}>Chinese</option>
                                        <option value="Chorinho" {{ old('subgenero') == "Chorinho" ? 'selected' : '' }}>Chorinho</option>
                                        <option value="Choro" {{ old('subgenero') == "Choro" ? 'selected' : '' }}>Choro</option>
                                        <option value="Christian" {{ old('subgenero') == "Christian" ? 'selected' : '' }}>Christian</option>
                                        <option value="Chumba" {{ old('subgenero') == "Chumba" ? 'selected' : '' }}>Chumba</option>
                                        <option value="Classical" {{ old('subgenero') == "Classical" ? 'selected' : '' }}>Classical</option>
                                        <option value="Classical Crossover" {{ old('subgenero') == "Classical Crossover" ? 'selected' : '' }}>Classical Crossover</option>
                                        <option value="Club" {{ old('subgenero') == "Club" ? 'selected' : '' }}>Club</option>
                                        <option value="Coldwave" {{ old('subgenero') == "Coldwave" ? 'selected' : '' }}>Coldwave</option>
                                        <option value="Comedy" {{ old('subgenero') == "Comedy" ? 'selected' : '' }}>Comedy</option>
                                        <option value="Cool Jazz" {{ old('subgenero') == "Cool Jazz" ? 'selected' : '' }}>Cool Jazz</option>
                                        <option value="Country" {{ old('subgenero') == "Country" ? 'selected' : '' }}>Country</option>
                                        <option value="Creole" {{ old('subgenero') == "Creole" ? 'selected' : '' }}>Creole</option>
                                        <option value="Crunk" {{ old('subgenero') == "Crunk" ? 'selected' : '' }}>Crunk</option>
                                        <option value="Cumbia" {{ old('subgenero') == "Cumbia" ? 'selected' : '' }}>Cumbia</option>
                                        <option value="Currulao" {{ old('subgenero') == "Currulao" ? 'selected' : '' }}>Currulao</option>
                                        <option value="Dance" {{ old('subgenero') == "Dance" ? 'selected' : '' }}>Dance</option>
                                        <option value="Dancehall" {{ old('subgenero') == "Dancehall" ? 'selected' : '' }}>Dancehall</option>
                                        <option value="Dark" {{ old('subgenero') == "Dark" ? 'selected' : '' }}>Dark</option>
                                        <option value="Death Industrial" {{ old('subgenero') == "Death Industrial" ? 'selected' : '' }}>Death Industrial</option>
                                        <option value="Death Metal" {{ old('subgenero') == "Death Metal" ? 'selected' : '' }}>Death Metal</option>
                                        <option value="Deathcore" {{ old('subgenero') == "Deathcore" ? 'selected' : '' }}>Deathcore</option>
                                        <option value="Deathgrind" {{ old('subgenero') == "Deathgrind" ? 'selected' : '' }}>Deathgrind</option>
                                        <option value="Deboche" {{ old('subgenero') == "Deboche" ? 'selected' : '' }}>Deboche</option>
                                        <option value="Deep house" {{ old('subgenero') == "Deep house" ? 'selected' : '' }}>Deep house</option>
                                        <option value="Deep soul" {{ old('subgenero') == "Deep soul" ? 'selected' : '' }}>Deep soul</option>
                                        <option value="Delta blues" {{ old('subgenero') == "Delta blues" ? 'selected' : '' }}>Delta blues</option>
                                        <option value="Dembow" {{ old('subgenero') == "Dembow" ? 'selected' : '' }}>Dembow</option>
                                        <option value="Dini" {{ old('subgenero') == "Dini" ? 'selected' : '' }}>Dini</option>
                                        <option value="Disco" {{ old('subgenero') == "Disco" ? 'selected' : '' }}>Disco</option>
                                        <option value="Dixieland" {{ old('subgenero') == "Dixieland" ? 'selected' : '' }}>Dixieland</option>
                                        <option value="Dopé" {{ old('subgenero') == "Dopé" ? 'selected' : '' }}>Dopé</option>
                                        <option value="Downtempo" {{ old('subgenero') == "owntempo" ? 'selected' : '' }}>Downtempo</option>
                                        <option value="Dream pop" {{ old('subgenero') == "Dream pop" ? 'selected' : '' }}>Dream pop</option>
                                        <option value="Drill and bass" {{ old('subgenero') == "Drill and bass" ? 'selected' : '' }}>Drill and bass</option>
                                        <option value="Drone" {{ old('subgenero') == "Drone" ? 'selected' : '' }}>Drone</option>
                                        <option value="Drum and bass" {{ old('subgenero') == "Drum and bass" ? 'selected' : '' }}>Drum and bass</option>
                                        <option value="Dub" {{ old('subgenero') == "Dub" ? 'selected' : '' }}>Dub</option>
                                        <option value="Dubstep" {{ old('subgenero') == "Dubstep" ? 'selected' : '' }}>Dubstep</option>
                                        <option value="Easy Listening" {{ old('subgenero') == "Easy Listening" ? 'selected' : '' }}>Easy Listening</option>
                                        <option value="Electro" {{ old('subgenero') == "Electro" ? 'selected' : '' }}>Electro</option>
                                        <option value="Electro Backbeat" {{ old('subgenero') == "Electro Backbeat" ? 'selected' : '' }}>Electro Backbeat</option>
                                        <option value="Electro hop" {{ old('subgenero') == "Electro hop" ? 'selected' : '' }}>Electro hop</option>
                                        <option value="Electronic" {{ old('subgenero') == "Electronic" ? 'selected' : '' }}>Electronic</option>
                                        <option value="Electronica" {{ old('subgenero') == "Electronica" ? 'selected' : '' }}>Electronica</option>
                                        <option value="Electropop" {{ old('subgenero') == "Electropop" ? 'selected' : '' }}>Electropop</option>
                                        <option value="Emo" {{ old('subgenero') == "emo" ? 'selected' : '' }}>Emo</option>
                                        <option value="Electronic" {{ old('subgenero') == "Electronic" ? 'selected' : '' }}>Electronic</option>
                                        <option value="Enka" {{ old('subgenero') == "Enka" ? 'selected' : '' }}>Enka</option>
                                        <option value="Europop" {{ old('subgenero') == "Europop" ? 'selected' : '' }}>Europop</option>
                                        <option value="Experimental" {{ old('subgenero') == "Experimental" ? 'selected' : '' }}>Experimental</option>
                                        <option value="F-Step" {{ old('subgenero') == "F-Step" ? 'selected' : '' }}>F-Step</option>
                                        <option value="Fado" {{ old('subgenero') == "Fado" ? 'selected' : '' }}>Fado</option>
                                        <option value="Fantezi" {{ old('subgenero') == "Fantezi" ? 'selected' : '' }}>Fantezi</option>
                                        <option value="Filk" {{ old('subgenero') == "Filk" ? 'selected' : '' }}>Filk</option>
                                        <option value="Flamenco" {{ old('subgenero') == "Flamenco" ? 'selected' : '' }}>Flamenco</option>
                                        <option value="Folk" {{ old('subgenero') == "Folk" ? 'selected' : '' }}>Folk</option>
                                        <option value="Folktronica" {{ old('subgenero') == "Folktronica" ? 'selected' : '' }}>Folktronica</option>
                                        <option value="Forró" {{ old('subgenero') == "Forró" ? 'selected' : '' }}>Forró</option>
                                        <option value="Free improvisation" {{ old('subgenero') == "Free improvisation" ? 'selected' : '' }}>Free improvisation</option>
                                        <option value="Free Jazz" {{ old('subgenero') == "Free Jazz" ? 'selected' : '' }}>Free Jazz</option>
                                        <option value="Freestyle" {{ old('subgenero') == "Freestyle" ? 'selected' : '' }}>Freestyle</option>
                                        <option value="French pop" {{ old('subgenero') == "French pop" ? 'selected' : '' }}>French pop</option>
                                        <option value="Frevo" {{ old('subgenero') == "Frevo" ? 'selected' : '' }}>Frevo</option>
                                        <option value="Fricote" {{ old('subgenero') == "Fricote" ? 'selected' : '' }}>Fricote</option>
                                        <option value="Funk" {{ old('subgenero') == "Funk" ? 'selected' : '' }}>Funk</option>
                                        <option value="Gangsta rap" {{ old('subgenero') == "Gangsta rap" ? 'selected' : '' }}>Gangsta rap</option>
                                        <option value="Garage" {{ old('subgenero') == "Garage" ? 'selected' : '' }}>Garage</option>
                                        <option value="German Folk" {{ old('subgenero') == "German Folk" ? 'selected' : '' }}>German Folk</option>
                                        <option value="German Pop" {{ old('subgenero') == "German Pop" ? 'selected' : '' }}>German Pop</option>
                                        <option value="Go go" {{ old('subgenero') == "Go go" ? 'selected' : '' }}>Go go</option>
                                        <option value="Gospel" {{ old('subgenero') == "Gospel" ? 'selected' : '' }}>Gospel</option>
                                        <option value="Gothic" {{ old('subgenero') == "Gothic" ? 'selected' : '' }}>Gothic</option>
                                        <option value="Grime" {{ old('subgenero') == "Grime" ? 'selected' : '' }}>Grime</option>
                                        <option value="Grindcore" {{ old('subgenero') == "Grindcore" ? 'selected' : '' }}>Grindcore</option>
                                        <option value="Groove metal" {{ old('subgenero') == "Groove metal" ? 'selected' : '' }}>Groove metal</option>
                                        <option value="Grunge" {{ old('subgenero') == "Grunge" ? 'selected' : '' }}>Grunge</option>
                                        <option value="Grupera" {{ old('subgenero') == "Grupera" ? 'selected' : '' }}>Grupera</option>
                                        <option value="Guaracha" {{ old('subgenero') == "Guaracha" ? 'selected' : '' }}>Guaracha</option>
                                        <option value="Guitarra baiana" {{ old('subgenero') == "Guitarra baiana" ? 'selected' : '' }}>Guitarra baiana</option>
                                        <option value="Gypsy" {{ old('subgenero') == "Gypsy" ? 'selected' : '' }}>Gypsy</option>
                                        <option value="Halk" {{ old('subgenero') == "Halk" ? 'selected' : '' }}>Halk</option>
                                        <option value="Hard bop" {{ old('subgenero') == "Hard bop" ? 'selected' : '' }}>Hard bop</option>
                                        <option value="Hardcore" {{ old('subgenero') == "Hardcore" ? 'selected' : '' }}>Hardcore</option>
                                        <option value="Heavy metal" {{ old('subgenero') == "Heavy metal" ? 'selected' : '' }}>Heavy metal</option>
                                        <option value="Hip Ho" {{ old('subgenero') == "Hip Ho" ? 'selected' : '' }}>Hip Hop</option>
                                        <option value="Hip Hop/Rap" {{ old('subgenero') == "Hip Hop/Rap" ? 'selected' : '' }}>Hip Hop/Rap</option>
                                        <option value="Holiday Music" {{ old('subgenero') == "Holiday Music" ? 'selected' : '' }}>Holiday Music</option>
                                        <option value="House" {{ old('subgenero') == "House" ? 'selected' : '' }}>House</option>
                                        <option value="Hyphy" {{ old('subgenero') == "Hyphy" ? 'selected' : '' }}>Hyphy</option>
                                        <option value="Indian Classical" {{ old('subgenero') == "Indian Classical" ? 'selected' : '' }}>Indian Classical</option>
                                        <option value="Indie" {{ old('subgenero') == "Indie" ? 'selected' : '' }}>Indie</option>
                                        <option value="Indie Pop" {{ old('subgenero') == "Indie Pop" ? 'selected' : '' }}>Indie Pop</option>
                                        <option value="Indo Pop" {{ old('subgenero') == "Indo Pop" ? 'selected' : '' }}>Indo Pop</option>
                                        <option value="Industrial" {{ old('subgenero') == "Industrial" ? 'selected' : '' }}>Industrial</option>
                                        <option value="Infantil" {{ old('subgenero') == "Infantil" ? 'selected' : '' }}>Infantil</option>
                                        <option value="Instrumental" {{ old('subgenero') == "Instrumental" ? 'selected' : '' }}>Instrumental</option>
                                        <option value="Jam" {{ old('subgenero') == "Jam" ? 'selected' : '' }}>Jam</option>
                                        <option value="Jazz" {{ old('subgenero') == "Jazz" ? 'selected' : '' }}>Jazz</option>
                                        <option value="Juju" {{ old('subgenero') == "Juju" ? 'selected' : '' }}>Juju</option>
                                        <option value="Jungle" {{ old('subgenero') == "Jungle" ? 'selected' : '' }}>Jungle</option>
                                        <option value="K-Pop" {{ old('subgenero') == "K-Pop" ? 'selected' : '' }}>K-Pop</option>
                                        <option value="Karaoke" {{ old('subgenero') == "Karaoke" ? 'selected' : '' }}>Karaoke</option>
                                        <option value="Kayokyoku" {{ old('subgenero') == "Kayokyoku" ? 'selected' : '' }}>Kayokyoku</option>
                                        <option value="Kizomba" {{ old('subgenero') == "Kizomba" ? 'selected' : '' }}>Kizomba</option>
                                        <option value="Latin" {{ old('subgenero') == "Latin" ? 'selected' : '' }}>Latin</option>
                                        <option value="Latin Jazz" {{ old('subgenero') == "Latin Jazz" ? 'selected' : '' }}>Latin Jazz</option>
                                        <option value="Latin Rap" {{ old('subgenero') == "Latin Rap" ? 'selected' : '' }}>Latin Rap</option>
                                        <option value="Lo-Pop" {{ old('subgenero') == "Lo-Pop" ? 'selected' : '' }}>Lo-Pop</option>
                                        <option value="Lounge" {{ old('subgenero') == "Lounge" ? 'selected' : '' }}>Lounge</option>
                                        <option value="Mambo" {{ old('subgenero') == "Mambo" ? 'selected' : '' }}>Mambo</option>
                                        <option value="Mangue Beat" {{ old('subgenero') == "Mangue Beat" ? 'selected' : '' }}>Mangue Beat</option>
                                        <option value="Maracatu" {{ old('subgenero') == "Maracatu" ? 'selected' : '' }}>Maracatu</option>
                                        <option value="Mariachi" {{ old('subgenero') == "Mariachi" ? 'selected' : '' }}>Mariachi</option>
                                        <option value="Marimba" {{ old('subgenero') == "Marimba" ? 'selected' : '' }}>Marimba</option>
                                        <option value="Maxixe" {{ old('subgenero') == "Maxixe" ? 'selected' : '' }}>Maxixe</option>
                                        <option value="Mento" {{ old('subgenero') == "Mento" ? 'selected' : '' }}>Mento</option>
                                        <option value="Merengue" {{ old('subgenero') == "Merengue" ? 'selected' : '' }}>Merengue</option>
                                        <option value="Metal" {{ old('subgenero') == "Metal" ? 'selected' : '' }}>Metal</option>
                                        <option value="Mexican" {{ old('subgenero') == "Mexican" ? 'selected' : '' }}>Mexican</option>
                                        <option value="Miami bass" {{ old('subgenero') == "Miami bass" ? 'selected' : '' }}>Miami bass</option>
                                        <option value="Microhouse" {{ old('subgenero') == "Microhouse" ? 'selected' : '' }}>Microhouse</option>
                                        <option value="Milonga" {{ old('subgenero') == "Milonga" ? 'selected' : '' }}>Milonga</option>
                                        <option value="Minimalist" {{ old('subgenero') == "Minimalist" ? 'selected' : '' }}>Minimalist</option>
                                        <option value="Modinha" {{ old('subgenero') == "Modinha" ? 'selected' : '' }}>Modinha</option>
                                        <option value="Motown" {{ old('subgenero') == "Motown" ? 'selected' : '' }}>Motown</option>
                                        <option value="MPB" {{ old('subgenero') == "MPB" ? 'selected' : '' }}>MPB</option>
                                        <option value="Neo Soul" {{ old('subgenero') == "Neo Soul" ? 'selected' : '' }}>Neo Soul</option>
                                        <option value="Neofolk" {{ old('subgenero') == "Neofolk" ? 'selected' : '' }}>Neofolk</option>
                                        <option value="New Age" {{ old('subgenero') == "New Age" ? 'selected' : '' }}>New Age</option>
                                        <option value="New Wave" {{ old('subgenero') == "New Wave" ? 'selected' : '' }}>New Wave</option>
                                        <option value="Noise pop" {{ old('subgenero') == "Noise pop" ? 'selected' : '' }}>Noise pop</option>
                                        <option value="Norteño" {{ old('subgenero') == "Norteño" ? 'selected' : '' }}>Norteño</option>
                                        <option value="Nova Canção" {{ old('subgenero') == "Nova Canção" ? 'selected' : '' }}>Nova Canção</option>
                                        <option value="Oi!" {{ old('subgenero') == "Oi!" ? 'selected' : '' }}>Oi!</option>
                                        <option value="Old school" {{ old('subgenero') == "Old school" ? 'selected' : '' }}>Old school</option>
                                        <option value="Old time" {{ old('subgenero') == "Old time" ? 'selected' : '' }}>Old time</option>
                                        <option value="Oldies" {{ old('subgenero') == "Oldies" ? 'selected' : '' }}>Oldies</option>
                                        <option value="Opera" {{ old('subgenero') == "Opera" ? 'selected' : '' }}>Opera</option>
                                        <option value="Orchesta" {{ old('subgenero') == "Orchesta" ? 'selected' : '' }}>Orchesta</option>
                                        <option value="Outlaw" {{ old('subgenero') == "Outlaw" ? 'selected' : '' }}>Outlaw</option>
                                        <option value="Özgün" {{ old('subgenero') == "Özgün" ? 'selected' : '' }}>Özgün</option>
                                        <option value="Pagode" {{ old('subgenero') == "Pagode" ? 'selected' : '' }}>Pagode</option>
                                        <option value="Pixiefunk" {{ old('subgenero') == "Pixiefunk" ? 'selected' : '' }}>Pixiefunk</option>
                                        <option value="Plena" {{ old('subgenero') == "Plena" ? 'selected' : '' }}>Plena</option>
                                        <option value="Pop" {{ old('subgenero') == "Pop" ? 'selected' : '' }}>Pop</option>
                                        <option value="Pop in Spanish" {{ old('subgenero') == "Pop in Spanish" ? 'selected' : '' }}>Pop in Spanish</option>
                                        <option value="Popular Colombiana" {{ old('subgenero') == "Popular Colombiana" ? 'selected' : '' }}>Popular Colombiana</option>
                                        <option value="Porngroove" {{ old('subgenero') == "Porngroove" ? 'selected' : '' }}>Porngroove</option>
                                        <option value="Post-hardcore" {{ old('subgenero') == "Post-hardcore" ? 'selected' : '' }}>Post-hardcore</option>
                                        <option value="Progressive" {{ old('subgenero') == "Progressive" ? 'selected' : '' }}>Progressive</option>
                                        <option value="Psychedelic" {{ old('subgenero') == "Psychedelic" ? 'selected' : '' }}>Psychedelic</option>
                                        <option value="Psychobilly" {{ old('subgenero') == "Psychobilly" ? 'selected' : '' }}>Psychobilly</option>
                                        <option value="Punk" {{ old('subgenero') == "Punk" ? 'selected' : '' }}>Punk</option>
                                        <option value="Quadrille" {{ old('subgenero') == "Quadrille" ? 'selected' : '' }}>Quadrille</option>
                                        <option value="Ragas" {{ old('subgenero') == "Ragas" ? 'selected' : '' }}>Ragas</option>
                                        <option value="Raggamuffin" {{ old('subgenero') == "Raggamuffin" ? 'selected' : '' }}>Raggamuffin</option>
                                        <option value="Ragtime" {{ old('subgenero') == "Ragtime" ? 'selected' : '' }}>Ragtime</option>
                                        <option value="Rancheira" {{ old('subgenero') == "Rancheira" ? 'selected' : '' }}>Rancheira</option>
                                        <option value="Rap" {{ old('subgenero') == "Rap" ? 'selected' : '' }}>Rap</option>
                                        <option value="Rave" {{ old('subgenero') == "Rave" ? 'selected' : '' }}>Rave</option>
                                        <option value="Reggae" {{ old('subgenero') == "Reggae" ? 'selected' : '' }}>Reggae</option>
                                        <option value="Reggaeton" {{ old('subgenero') == "Reggaeton" ? 'selected' : '' }}>Reggaeton</option>
                                        <option value="Regional Mexicano" {{ old('subgenero') == "Regional Mexicano" ? 'selected' : '' }}>Regional Mexicano</option>
                                        <option value="Retro" {{ old('subgenero') == "Retro" ? 'selected' : '' }}>Retro</option>
                                        <option value="Rhytm & Blues" {{ old('subgenero') == "Rhytm & Blues" ? 'selected' : '' }}>Rhytm & Blues</option>
                                        <option value="Rock" {{ old('subgenero') == "Rock" ? 'selected' : '' }}>Rock</option>
                                        <option value="Rock opera" {{ old('subgenero') == "Rock opera" ? 'selected' : '' }}>Rock opera</option>
                                        <option value="Rockabilly" {{ old('subgenero') == "Rockabilly" ? 'selected' : '' }}>Rockabilly</option>
                                        <option value="Roots" {{ old('subgenero') == "Roots" ? 'selected' : '' }}>Roots</option>
                                        <option value="Ruissian Chanson" {{ old('subgenero') == "Ruissian Chanson" ? 'selected' : '' }}>Ruissian Chanson</option>
                                        <option value="Salsa" {{ old('subgenero') == "Salsa" ? 'selected' : '' }}>Salsa</option>
                                        <option value="Salsa Chok" {{ old('subgenero') == "Salsa Chok" ? 'selected' : '' }}>Salsa Choke</option>
                                        <option value="Samba" {{ old('subgenero') == "Samba" ? 'selected' : '' }}>Samba</option>
                                        <option value="Samba-canção" {{ old('subgenero') == "Samba-canção" ? 'selected' : '' }}>Samba-canção</option>
                                        <option value="Samba-reggae" {{ old('subgenero') == "Samba-reggae" ? 'selected' : '' }}>Samba-reggae</option>
                                        <option value="Sanat" {{ old('subgenero') == "Sanat" ? 'selected' : '' }}>Sanat</option>
                                        <option value="Sertaneja" {{ old('subgenero') == "Sertaneja" ? 'selected' : '' }}>Sertaneja</option>
                                        <option value="Singer-songwriter" {{ old('subgenero') == "Singer-songwriter" ? 'selected' : '' }}>Singer-songwriter</option>
                                        <option value="Ska" {{ old('subgenero') == "Ska" ? 'selected' : '' }}>Ska</option>
                                        <option value="Skate" {{ old('subgenero') == "Skate" ? 'selected' : '' }}>Skate</option>
                                        <option value="Sludge metal" {{ old('subgenero') == "Sludge metal" ? 'selected' : '' }}>Sludge metal</option>
                                        <option value="Smooth jazz" {{ old('subgenero') == "Smooth jazz" ? 'selected' : '' }}>Smooth jazz</option>
                                        <option value="Soca" {{ old('subgenero') == "Soca" ? 'selected' : '' }}>Soca</option>
                                        <option value="Soldier" {{ old('subgenero') == "Soldier" ? 'selected' : '' }}>Soldier</option>
                                        <option value="Son montuno" {{ old('subgenero') == "Son montuno" ? 'selected' : '' }}>Son montuno</option>
                                        <option value="Sonata" {{ old('subgenero') == "Sonata" ? 'selected' : '' }}>Sonata</option>
                                        <option value="Soul" {{ old('subgenero') == "Soul" ? 'selected' : '' }}>Soul</option>
                                        <option value="Soundtrack" {{ old('subgenero') == "Soundtrack" ? 'selected' : '' }}>Soundtrack</option>
                                        <option value="Southern" {{ old('subgenero') == "Southern" ? 'selected' : '' }}>Southern</option>
                                        <option value="Space" {{ old('subgenero') == "Space" ? 'selected' : '' }}>Space</option>
                                        <option value="Speed metal" {{ old('subgenero') == "Speed metal" ? 'selected' : '' }}>Speed metal</option>
                                        <option value="Spiritual" {{ old('subgenero') == "Spiritual" ? 'selected' : '' }}>Spiritual</option>
                                        <option value="Spirituals" {{ old('subgenero') == "Spirituals" ? 'selected' : '' }}>Spirituals</option>
                                        <option value="Spoken Word" {{ old('subgenero') == "Spoken Word" ? 'selected' : '' }}>Spoken Word</option>
                                        <option value="Story" {{ old('subgenero') == "Story" ? 'selected' : '' }}>Story</option>
                                        <option value="Surf" {{ old('subgenero') == "Surf" ? 'selected' : '' }}>Surf</option>
                                        <option value="Swing music" {{ old('subgenero') == "Swing music" ? 'selected' : '' }}>Swing music</option>
                                        <option value="Swingbeat" {{ old('subgenero') == "Swingbeat" ? 'selected' : '' }}>Swingbeat</option>
                                        <option value="Symphony" {{ old('subgenero') == "Symphony" ? 'selected' : '' }}>Symphony</option>
                                        <option value="Tango" {{ old('subgenero') == "Tango" ? 'selected' : '' }}>Tango</option>
                                        <option value="Techno" {{ old('subgenero') == "Techno" ? 'selected' : '' }}>Techno</option>
                                        <option value="Teen pop" {{ old('subgenero') == "Teen pop" ? 'selected' : '' }}>Teen pop</option>
                                        <option value="Thai pop" {{ old('subgenero') == "Thai pop" ? 'selected' : '' }}>Thai pop</option>
                                        <option value="Thrash metal" {{ old('subgenero') == "Thrash metal" ? 'selected' : '' }}>Thrash metal</option>
                                        <option value="Tradicional colombiana" {{ old('subgenero') == "Tradicional colombiana" ? 'selected' : '' }}>Tradicional colombiana</option>
                                        <option value="Trance" {{ old('subgenero') == "Trance" ? 'selected' : '' }}>Trance</option>
                                        <option value="Trap" {{ old('subgenero') == "Trap" ? 'selected' : '' }}>Trap</option>
                                        <option value="Tribal house" {{ old('subgenero') == "Tribal house" ? 'selected' : '' }}>Tribal house</option>
                                        <option value="Trip rock" {{ old('subgenero') == "Trip rock" ? 'selected' : '' }}>Trip rock</option>
                                        <option value="Trip-hop" {{ old('subgenero') == "Trip-hop" ? 'selected' : '' }}>Trip-hop</option>
                                        <option value="Tropical" {{ old('subgenero') == "Tropical" ? 'selected' : '' }}>Tropical</option>
                                        <option value="Tropical Salsa" {{ old('subgenero') == "Tropical Salsa" ? 'selected' : '' }}>Tropical Salsa</option>
                                        <option value="Tropicalia" {{ old('subgenero') == "Tropicalia" ? 'selected' : '' }}>Tropicalia</option>
                                        <option value="Turkish" {{ old('subgenero') == "Turkish" ? 'selected' : '' }}>Turkish</option>
                                        <option value="Turkish Alternative" {{ old('subgenero') == "Turkish Alternative" ? 'selected' : '' }}>Turkish Alternative</option>
                                        <option value="Turkish Hip-Hop/Rap" {{ old('subgenero') == "Turkish Hip-Hop/Rap" ? 'selected' : '' }}>Turkish Hip-Hop/Rap</option>
                                        <option value="Turkish Pop" {{ old('subgenero') == "Turkish Pop" ? 'selected' : '' }}>Turkish Pop</option>
                                        <option value="Turkish RocK" {{ old('subgenero') == "Turkish RocK" ? 'selected' : '' }}>Turkish Rock</option>
                                        <option value="Unnasigned" {{ old('subgenero') == "Unnasigned" ? 'selected' : '' }}>Unnasigned</option>
                                        <option value="Undergound" {{ old('subgenero') == "Undergound" ? 'selected' : '' }}>Undergound</option>
                                        <option value="Unplugged" {{ old('subgenero') == "Unplugged" ? 'selected' : '' }}>Unplugged</option>
                                        <option value="Urban" {{ old('subgenero') == "Urban" ? 'selected' : '' }}>Urban</option>
                                        <option value="Urban Cowboy" {{ old('subgenero') == "Urban Cowboy" ? 'selected' : '' }}>Urban Cowboy</option>
                                        <option value="Urban Folk" {{ old('subgenero') == "Urban Folk" ? 'selected' : '' }}>Urban Folk</option>
                                        <option value="Urban Jazz" {{ old('subgenero') == "Urban Jazz" ? 'selected' : '' }}>Urban Jazz</option>
                                        <option value="Vallenato" {{ old('subgenero') == "Vallenato" ? 'selected' : '' }}>Vallenato</option>
                                        <option value="Valsa" {{ old('subgenero') == "Valsa" ? 'selected' : '' }}>Valsa</option>
                                        <option value="Vanera" {{ old('subgenero') == "Vanera" ? 'selected' : '' }}>Vanera</option>
                                        <option value="Video game" {{ old('subgenero') == "Video game" ? 'selected' : '' }}>Video game</option>
                                        <option value="Vocal" {{ old('subgenero') == "Vocal" ? 'selected' : '' }}>Vocal</option>
                                        <option value="Waltz" {{ old('subgenero') == "Waltz" ? 'selected' : '' }}>Waltz</option>
                                        <option value="West Coas hip hop" {{ old('subgenero') == "West Coas hip hop" ? 'selected' : '' }}>West Coas hip hop</option>
                                        <option value="World" {{ old('subgenero') == "World" ? 'selected' : '' }}>World</option>
                                        <option value="Worldbeat" {{ old('subgenero') == "Worldbeat" ? 'selected' : '' }}>Worldbeat</option>
                                        <option value="Xote" {{ old('subgenero') == "Xote" ? 'selected' : '' }}>Xote</option>
                                        <option value="Yo-pop" {{ old('subgenero') == "Yo-pop" ? 'selected' : '' }}>Yo-pop</option>
                                        <option value="Zouk" {{ old('subgenero') == "Zouk" ? 'selected' : '' }}>Zouk</option>
                                        <option value="Zulu" {{ old('subgenero') == "Zulu" ? 'selected' : '' }}>Zulu</option>
                                        <option value="Zydeco" {{ old('subgenero') == "Zydeco" ? 'selected' : '' }}>Zydeco</option>
                                    </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="genero_secundario">Género secundario</label>
                                <br>
                                <select class="genero_secundario col-md-12" name="genero_secundario" id="genero_secundario"
                                    value="{{ old('genero_secundario') }}">
                                    <option value="Afoxé">Afoxé</option>
                                    <option value="Alternative">Alternative</option>
                                    <option value="Alternative & Rock in Spanish">Alternative & Rock in Spanish</option>
                                    <option value="Ambient">Ambient</option>
                                    <option value="Americana">Americana</option>
                                    <option value="Anime">Anime</option>
                                    <option value="Arabesk">Arabesk</option>
                                    <option value="Avant-garde">Avant-garde</option>
                                    <option value="Axé">Axé</option>
                                    <option value="Baião">Baião</option>
                                    <option value="Baile Funk">Baile Funk</option>
                                    <option value="Bluegrass">Bluegrass</option>
                                    <option value="Blues">Blues</option>
                                    <option value="Bossa nova">Bossa nova</option>
                                    <option value="Breakbeat">Breakbeat</option>
                                    <option value="Britpop">Britpop</option>
                                    <option value="Bugio">Bugio</option>
                                    <option value="C-Pop">C-Pop</option>
                                    <option value="Cajun">Cajun</option>
                                    <option value="Canção">Canção</option>
                                    <option value="Cantopop/HK-Pop 1">Cantopop/HK-Pop 1</option>
                                    <option value="Celtic">Celtic</option>
                                    <option value="Celtic Folk">Celtic Folk</option>
                                    <option value="Chamamé">Chamamé</option>
                                    <option value="Chamarra">Chamarra</option>
                                    <option value="Chamber music">Chamber music</option>
                                    <option value="Children's music">Children's music</option>
                                    <option value="Chill-Out">Chill-Out</option>
                                    <option value="Chinese">Chinese</option>
                                    <option value="Chorinho">Chorinho</option>
                                    <option value="Choro">Choro</option>
                                    <option value="Christian">Christian</option>
                                    <option value="Classical">Classical</option>
                                    <option value="Classical Crossove">Classical Crossover</option>
                                    <option value="Comedy">Comedy</option>
                                    <option value="Country">Country</option>
                                    <option value="Cumbia">Cumbia</option>
                                    <option value="Dance">Dance</option>
                                    <option value="Dancehall">Dancehall</option>
                                    <option value="Delta blues">Delta blues</option>
                                    <option value="Disco">Disco</option>
                                    <option value="Dixieland">Dixieland</option>
                                    <option value="Downtempo">Downtempo</option>
                                    <option value="Drum and bass">Drum and bass</option>
                                    <option value="Dub">Dub</option>
                                    <option value="Easy listening">Easy listening</option>
                                    <option value="Electronicg47">Electronic</option>
                                    <option value="Electronica">Electronica</option>
                                    <option value="Emo">Emo</option>
                                    <option value="Enka">Enka</option>
                                    <option value="Folk">Folk</option>
                                    <option value="Forró">Forró</option>
                                    <option value="French Pop">French Pop</option>
                                    <option value="Frevo">Frevo</option>
                                    <option value="Funk">Funk</option>
                                    <option value="Gangsta rap">Gangsta rap</option>
                                    <option value="German Folk">German Folk</option>
                                    <option value="German Pop">German Pop</option>
                                    <option value="Gospel">Gospel</option>
                                    <option value="Grunge">Grunge</option>
                                    <option value="Guitarra baiana">Guitarra baiana</option>
                                    <option value="Hard bop">Hard bop</option>
                                    <option value="Hardcore">Hardcore</option>
                                    <option value="Heavy Metal">Heavy Metal</option>
                                    <option value="Hip Hop/Ra">Hip Hop/Rap</option>
                                    <option value="Holiday Musi">Holiday Music</option>
                                    <option value="House">House</option>
                                    <option value="Indo Pop">Indo Pop</option>
                                    <option value="Industrial">Industrial</option>
                                    <option value="Jazz">Jazz</option>
                                    <option value="Karaoke">Karaoke</option>
                                    <option value="Kayokyuoku">Kayokyuoku</option>
                                    <option value="Kizomba">Kizomba</option>
                                    <option value="Latin Jazz">Latin Jazz</option>
                                    <option value="Latin Rap">Latin Rap</option>
                                    <option value="Lounge">Lounge</option>
                                    <option value="Milonga">Milonga</option>
                                    <option value="Motown">Motown</option>
                                    <option value="MPB">MPB</option>
                                    <option value="New Age">New Age</option>
                                    <option value="New Wave">New Wave</option>
                                    <option value="Opera">Opera</option>
                                    <option value="Pagode">Pagode</option>
                                    <option value="Pop">Pop</option>
                                    <option value="Pop in Spanish">Pop in Spanish</option>
                                    <option value="Psychedelic">Psychedelic</option>
                                    <option value="Punk">Punk</option>
                                    <option value="Ragtime">Ragtime</option>
                                    <option value="Rancheira">Rancheira</option>
                                    <option value="Rap">Rap</option>
                                    <option value="Reggae">Reggae</option>
                                    <option value="Reggaeton">Reggaeton</option>
                                    <option value="Regional Mexicano">Regional Mexicano</option>
                                    <option value="Rhythm & Blues">Rhythm & Blues</option>
                                    <option value="Rock">Rock</option>
                                    <option value="Rap">Rap</option>
                                    <option value="Rockabilly">Rockabilly</option>
                                    <option value="Russian Chanson">Russian Chanson</option>
                                    <option value="Salsa">Salsa</option>
                                    <option value="Salsa Choke">Salsa Choke</option>
                                    <option value="Samba">Samba</option>
                                    <option value="Samba-canção">Samba-canção</option>
                                    <option value="Samba-reggae">Samba-reggae</option>
                                    <option value="Sertaneja">Sertaneja</option>
                                    <option value="Singer-songwriter">Singer-songwriter</option>
                                    <option value="Ska">Ska</option>
                                    <option value="Smooth jazz">Smooth jazz</option>
                                    <option value="Soca">Soca</option>
                                    <option value="Soul">Soul</option>
                                    <option value="Soundtrack">Soundtrack</option>
                                    <option value="Spoken Word">Spoken Word</option>
                                    <option value="Surf">Surf</option>
                                    <option value="Techno">Techno</option>
                                    <option value="Teen Pop">Teen Pop</option>
                                    <option value="Thai Pop">Thai Pop</option>
                                    <option value="Trance">Trance</option>
                                    <option value="Trap">Trap</option>
                                    <option value="Trip Rock">Trip Rock</option>
                                    <option value="Turkish">Turkish</option>
                                    <option value="Underground">Underground</option>
                                    <option value="Urban Cowboy">Urban Cowboy</option>
                                    <option value="Vallenato">Vallenato</option>
                                    <option value="Valsa">Valsa</option>
                                    <option value="Vanera">Vanera</option>
                                    <option value="Vocal">Vocal</option>
                                    <option value="World">World</option>
                                    <option value="Worldbeat">Worldbeat</option>
                                    <option value="Xote">Xote</option>
                                    <option value="Zydeco">Zydeco</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="subgenero_secundario">Sub-género secundario</label>
                                <br>
                                <select class="subgenero_secundario col-md-12" name="subgenero_secundario"
                                    id="subgenero_secundario" value="{{ old('subgenero_secundario') }}">
                                    <option value="Acid">Acid</option>
                                    <option value="Acid house">Acid house</option>
                                    <option value="Acid Jazz">Acid Jazz</option>
                                    <option value="Acid Punk">Acid Punk</option>
                                    <option value="Acid rap">Acid rap</option>
                                    <option value="Acid rock">Acid rock</option>
                                    <option value="Acid techno">Acid techno</option>
                                    <option value="Afoxé">Afoxé</option>
                                    <option value="Afro">Afro</option>
                                    <option value="Afro-Cuban Jazz">Afro-Cuban Jazz</option>
                                    <option value="Afro-Juju">Afro-Juju</option>
                                    <option value="Afro-Punk">Afro-Punk</option>
                                    <option value="Afrobeat">Afrobeat</option>
                                    <option value="Aggrotech">Aggrotech</option>
                                    <option value="Air">Air</option>
                                    <option value="Alternative">Alternative</option>
                                    <option value="Alternative & Rock in Spanish">Alternative & Rock in Spanish</option>
                                    <option value="Ambient">Ambient</option>
                                    <option value="Americana">Americana</option>
                                    <option value="Anadolu rock">Anadolu rock</option>
                                    <option value="Anarcho-punk">Anarcho-punk</option>
                                    <option value="Andean New Age">Andean New Age</option>
                                    <option value="Anime">Anime</option>
                                    <option value="Anti-folk">Anti-folk</option>
                                    <option value="Arabesk">Arabesk</option>
                                    <option value="Art">Art</option>
                                    <option value="Asian">Asian</option>
                                    <option value="Audio Book">Audio Book</option>
                                    <option value="Avant-garde">Avant-garde</option>
                                    <option value="Axé">Axé</option>
                                    <option value="Bachata">Bachata</option>
                                    <option value="Baião">Baião</option>
                                    <option value="Baile Exótico">Baile Exótico</option>
                                    <option value="Baile Funk">Baile Funk</option>
                                    <option value="Banda">Banda</option>
                                    <option value="Bass">Bass</option>
                                    <option value="Bastard Pop">Bastard Pop</option>
                                    <option value="Batá">Batá</option>
                                    <option value="Batucada">Batucada</option>
                                    <option value="Batuco">Batuco</option>
                                    <option value="Beat">Beat</option>
                                    <option value="Beatboxing">Beatboxing</option>
                                    <option value="Bebop">Bebop</option>
                                    <option value="Big band music">Big band music</option>
                                    <option value="Big Beat">Big Beat</option>
                                    <option value="Bloco afro">Bloco afro</option>
                                    <option value="Bluegrass">Bluegrass</option>
                                    <option value="Blues">Blues</option>
                                    <option value="Bohemian Dub">Bohemian Dub</option>
                                    <option value="Boi">Boi</option>
                                    <option value="Bolero">Bolero</option>
                                    <option value="Bombay pop">Bombay pop</option>
                                    <option value="Bossa nova">Bossa nova</option>
                                    <option value="Boy band">Boy band</option>
                                    <option value="Brass">Brass</option>
                                    <option value="Brazilian">Brazilian</option>
                                    <option value="Breakbeat">Breakbeat</option>
                                    <option value="Brega">Brega</option>
                                    <option value="Bregafunk">Bregafunk</option>
                                    <option value="Britpop">Britpop</option>
                                    <option value="Broken beat">Broken beat</option>
                                    <option value="Bubblegum pop">Bubblegum pop</option>
                                    <option value="Bugio">Bugio</option>
                                    <option value="Bulerias">Bulerias</option>
                                    <option value="C-Pop">C-Pop</option>
                                    <option value="Cabaret">Cabaret</option>
                                    <option value="Cadence">Cadence</option>
                                    <option value="Cajun">Cajun</option>
                                    <option value="Calypso">Calypso</option>
                                    <option value="Cancão">Cancão</option>
                                    <option value="Canto livre">Canto livre</option>
                                    <option value="Canto nuevo">Canto nuevo</option>
                                    <option value="Canto popular">Canto popular</option>
                                    <option value="Cantopop/HK-Pop">Cantopop/HK-Pop</option>
                                    <option value="Caopeira music">Caopeira music</option>
                                    <option value="Carimbó">Carimbó</option>
                                    <option value="Catalogue">Catalogue</option>
                                    <option value="Celtic">Celtic</option>
                                    <option value="Celtic Folk">Celtic Folk</option>
                                    <option value="Celtic Pop">Celtic Pop</option>
                                    <option value="Celtic Rock">Celtic Rock</option>
                                    <option value="Chamamé">Chamamé</option>
                                    <option value="Chamarra">Chamarra</option>
                                    <option value="Chamber music">Chamber music</option>
                                    <option value="Champeta">Champeta</option>
                                    <option value="Chemical breaks">Chemical breaks</option>
                                    <option value="Children's Music">Children's Music</option>
                                    <option value="Chill-Out">Chill-Out</option>
                                    <option value="Chinese">Chinese</option>
                                    <option value="Chorinho">Chorinho</option>
                                    <option value="Choro">Choro</option>
                                    <option value="Christian">Christian</option>
                                    <option value="Chumba">Chumba</option>
                                    <option value="Classical">Classical</option>
                                    <option value="Classical Crossover">Classical Crossover</option>
                                    <option value="Club">Club</option>
                                    <option value="Coldwave">Coldwave</option>
                                    <option value="Comedy">Comedy</option>
                                    <option value="Cool Jazz">Cool Jazz</option>
                                    <option value="Country">Country</option>
                                    <option value="Creole">Creole</option>
                                    <option value="Crunk">Crunk</option>
                                    <option value="Cumbia">Cumbia</option>
                                    <option value="Chorinho">Chorinho</option>
                                    <option value="Currulao">Currulao</option>
                                    <option value="Dance">Dance</option>
                                    <option value="Dancehall">Dancehall</option>
                                    <option value="Dark">Dark</option>
                                    <option value="Death Industrial">Death Industrial</option>
                                    <option value="Death Metal">Death Metal</option>
                                    <option value="Deathcore">Deathcore</option>
                                    <option value="Deathgrind">Deathgrind</option>
                                    <option value="Deboche">Deboche</option>
                                    <option value="Deep house">Deep house</option>
                                    <option value="Deep souL">Deep soul</option>
                                    <option value="Delta blues">Delta blues</option>
                                    <option value="Dembow">Dembow</option>
                                    <option value="Dini">Dini</option>
                                    <option value="Disco">Disco</option>
                                    <option value="Dixieland">Dixieland</option>
                                    <option value="Dopé">Dopé</option>
                                    <option value="Downtempo">Downtempo</option>
                                    <option value="Dream pop">Dream pop</option>
                                    <option value="Drill and bas">Drill and bass</option>
                                    <option value="Drone">Drone</option>
                                    <option value="Drum and bass">Drum and bass</option>
                                    <option value="Dub">Dub</option>
                                    <option value="Dubstep">Dubstep</option>
                                    <option value="Easy Listening">Easy Listening</option>
                                    <option value="Electro">Electro</option>
                                    <option value="Electro Backbeat">Electro Backbeat</option>
                                    <option value="Electro hop">Electro hop</option>
                                    <option value="Electropop">Electropop</option>
                                    <option value="Emo">Emo</option>
                                    <option value="Electronic">Electronic</option>
                                    <option value="Electronica">Electronica</option>
                                    <option value="Emo">Emo</option>
                                    <option value="Enka">Enka</option>
                                    <option value="Europop">Europop</option>
                                    <option value="Experimental">Experimental</option>
                                    <option value="F-Step">F-Step</option>
                                    <option value="Fado">Fado</option>
                                    <option value="Fantezi">Fantezi</option>
                                    <option value="Filk">Filk</option>
                                    <option value="Flamenco">Flamenco</option>
                                    <option value="Folk">Folk</option>
                                    <option value="Folktronica">Folktronica</option>
                                    <option value="Forró">Forró</option>
                                    <option value="Free improvisation">Free improvisation</option>
                                    <option value="Free Jazz">Free Jazz</option>
                                    <option value="Freestyle">Freestyle</option>
                                    <option value="French pop">French pop</option>
                                    <option value="Frevo">Frevo</option>
                                    <option value="Fricote">Fricote</option>
                                    <option value="Funk">Funk</option>
                                    <option value="Gangsta rap">Gangsta rap</option>
                                    <option value="Garage">Garage</option>
                                    <option value="German Folk">German Folk</option>
                                    <option value="German Pop">German Pop</option>
                                    <option value="Go go">Go go</option>
                                    <option value="Gospel">Gospel</option>
                                    <option value="Gothic">Gothic</option>
                                    <option value="Grime">Grime</option>
                                    <option value="Grindcore">Grindcore</option>
                                    <option value="Groove metal">Groove metal</option>
                                    <option value="Grunge">Grunge</option>
                                    <option value="Grupera">Grupera</option>
                                    <option value="Guaracha">Guaracha</option>
                                    <option value="Guitarra baiana">Guitarra baiana</option>
                                    <option value="Gypsy">Gypsy</option>
                                    <option value="Halk">Halk</option>
                                    <option value="sg1Hard bop75">Hard bop</option>
                                    <option value="Hardcore">Hardcore</option>
                                    <option value="Heavy metal">Heavy metal</option>
                                    <option value="Hip Hop">Hip Hop</option>
                                    <option value="Hip Hop/Rap">Hip Hop/Rap</option>
                                    <option value="Holiday Music">Holiday Music</option>
                                    <option value="House">House</option>
                                    <option value="Hyphy">Hyphy</option>
                                    <option value="Indian Classical">Indian Classical</option>
                                    <option value="Indie">Indie</option>
                                    <option value="Indie Pop">Indie Pop</option>
                                    <option value="Indo Pop">Indo Pop</option>
                                    <option value="Industrial">Industrial</option>
                                    <option value="Infantil">Infantil</option>
                                    <option value="Instrumental">Instrumental</option>
                                    <option value="Jam">Jam</option>
                                    <option value="Jazz">Jazz</option>
                                    <option value="Juju">Juju</option>
                                    <option value="Jungle">Jungle</option>
                                    <option value="K-Pop">K-Pop</option>
                                    <option value="Karaoke">Karaoke</option>
                                    <option value="Kayokyoku">Kayokyoku</option>
                                    <option value="Kizomba">Kizomba</option>
                                    <option value="Latin">Latin</option>
                                    <option value="Latin Jazz">Latin Jazz</option>
                                    <option value="Latin Rap">Latin Rap</option>
                                    <option value="Lo-Pop">Lo-Pop</option>
                                    <option value="Lounge">Lounge</option>
                                    <option value="Mambo">Mambo</option>
                                    <option value="Mangue Beat">Mangue Beat</option>
                                    <option value="Maracatu">Maracatu</option>
                                    <option value="Mariachi">Mariachi</option>
                                    <option value="Marimba">Marimba</option>
                                    <option value="Maxixe">Maxixe</option>
                                    <option value="Mento">Mento</option>
                                    <option value="Merengue">Merengue</option>
                                    <option value="Metal">Metal</option>
                                    <option value="Mexican">Mexican</option>
                                    <option value="Miami bass">Miami bass</option>
                                    <option value="Microhouse">Microhouse</option>
                                    <option value="Milonga">Milonga</option>
                                    <option value="Minimalist">Minimalist</option>
                                    <option value="Modinha">Modinha</option>
                                    <option value="Motown">Motown</option>
                                    <option value="MPB">MPB</option>
                                    <option value="Neo Soul">Neo Soul</option>
                                    <option value="Neofolk">Neofolk</option>
                                    <option value="New Age">New Age</option>
                                    <option value="New Wave">New Wave</option>
                                    <option value="Noise pop">Noise pop</option>
                                    <option value="Norteño">Norteño</option>
                                    <option value="Nova Canção">Nova Canção</option>
                                    <option value="Oi!">Oi!</option>
                                    <option value="Old school">Old school</option>
                                    <option value="Old time">Old time</option>
                                    <option value="Oldies">Oldies</option>
                                    <option value="Opera">Opera</option>
                                    <option value="Orchesta">Orchesta</option>
                                    <option value="Outlaw">Outlaw</option>
                                    <option value="Özgün">Özgün</option>
                                    <option value="Pagode">Pagode</option>
                                    <option value="Pixiefunk">Pixiefunk</option>
                                    <option value="Plena">Plena</option>
                                    <option value="Pop">Pop</option>
                                    <option value="Pop in Spanish">Pop in Spanish</option>
                                    <option value="Popular Colombiana">Popular Colombiana</option>
                                    <option value="Porngroove">Porngroove</option>
                                    <option value="Post-hardcore">Post-hardcore</option>
                                    <option value="Progressive">Progressive</option>
                                    <option value="Psychedelic">Psychedelic</option>
                                    <option value="Psychobilly">Psychobilly</option>
                                    <option value="Punk">Punk</option>
                                    <option value="Quadrille">Quadrille</option>
                                    <option value="Ragas">Ragas</option>
                                    <option value="Raggamuffin">Raggamuffin</option>
                                    <option value="Ragtime">Ragtime</option>
                                    <option value="Rancheira">Rancheira</option>
                                    <option value="Rap">Rap</option>
                                    <option value="Rave">Rave</option>
                                    <option value="Reggae">Reggae</option>
                                    <option value="Reggaeton">Reggaeton</option>
                                    <option value="Regional Mexicano">Regional Mexicano</option>
                                    <option value="Retro">Retro</option>
                                    <option value="Rhytm & Blues">Rhytm & Blues</option>
                                    <option value="Rock">Rock</option>
                                    <option value="Rock opera">Rock opera</option>
                                    <option value="Rockabilly">Rockabilly</option>
                                    <option value="Roots">Roots</option>
                                    <option value="Ruissian Chanson">Ruissian Chanson</option>
                                    <option value="Salsa">Salsa</option>
                                    <option value="Salsa Choke">Salsa Choke</option>
                                    <option value="Samba">Samba</option>
                                    <option value="Samba-canção<">Samba-canção</option>
                                    <option value="Samba-reggae">Samba-reggae</option>
                                    <option value="Sanat">Sanat</option>
                                    <option value="Sertaneja">Sertaneja</option>
                                    <option value="Singer-songwriter">Singer-songwriter</option>
                                    <option value="Ska">Ska</option>
                                    <option value="Skate">Skate</option>
                                    <option value="Sludge metal">Sludge metal</option>
                                    <option value="Smooth jazz">Smooth jazz</option>
                                    <option value="Soca">Soca</option>
                                    <option value="Soldier">Soldier</option>
                                    <option value="Son montuno">Son montuno</option>
                                    <option value="Sonata">Sonata</option>
                                    <option value="Soul">Soul</option>
                                    <option value="Soundtrack">Soundtrack</option>
                                    <option value="Southern">Southern</option>
                                    <option value="Space">Space</option>
                                    <option value="Speed metal">Speed metal</option>
                                    <option value="Spiritual">Spiritual</option>
                                    <option value="Spirituals">Spirituals</option>
                                    <option value="Spoken Word">Spoken Word</option>
                                    <option value="Story">Story</option>
                                    <option value="Surf">Surf</option>
                                    <option value="Swing music">Swing music</option>
                                    <option value="Swingbeat">Swingbeat</option>
                                    <option value="Symphony">Symphony</option>
                                    <option value="Tango">Tango</option>
                                    <option value="Techno">Techno</option>
                                    <option value="Teen pop">Teen pop</option>
                                    <option value="Thai pop">Thai pop</option>
                                    <option value="Thrash metal">Thrash metal</option>
                                    <option value="Tradicional colombiana">Tradicional colombiana</option>
                                    <option value="Trance">Trance</option>
                                    <option value="Trap">Trap</option>
                                    <option value="Tribal house">Tribal house</option>
                                    <option value="Trip rock">Trip rock</option>
                                    <option value="Trip-ho">Trip-hop</option>
                                    <option value="Tropical">Tropical</option>
                                    <option value="Tropical Salsa">Tropical Salsa</option>
                                    <option value="Tropicalia">Tropicalia</option>
                                    <option value="Turkish">Turkish</option>
                                    <option value="Turkish Alternative">Turkish Alternative</option>
                                    <option value="Turkish Hip-Hop/Rap">Turkish Hip-Hop/Rap</option>
                                    <option value="Turkish Pop">Turkish Pop</option>
                                    <option value="Turkish Rock">Turkish Rock</option>
                                    <option value="Unnasigned">Unnasigned</option>
                                    <option value="Undergound">Undergound</option>
                                    <option value="Unplugged">Unplugged</option>
                                    <option value="Urban">Urban</option>
                                    <option value="Urban Cowboy">Urban Cowboy</option>
                                    <option value="Urban Folk">Urban Folk</option>
                                    <option value="Urban Jazz">Urban Jazz</option>
                                    <option value="Vallenato">Vallenato</option>
                                    <option value="Valsa">Valsa</option>
                                    <option value="Vanera">Vanera</option>
                                    <option value="Video game">Video game</option>
                                    <option value="Vocal">Vocal</option>
                                    <option value="Waltz">Waltz</option>
                                    <option value="West Coas hip hop">West Coas hip hop</option>
                                    <option value="World">World</option>
                                    <option value="Worldbeat">Worldbeat</option>
                                    <option value="Xote">Xote</option>
                                    <option value="Yo-pop">Yo-pop</option>
                                    <option value="Zouk">Zouk</option>
                                    <option value="Zulu">Zulu</option>
                                    <option value="Zydeco">Zydeco</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="genero">Letra chocante o vulgar</label>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="letra_chocante_vulgar"
                                        id="letra_chocante_vulgar" value="si" {{old('letra_chocante_vulgar') == 'si' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="letra_chocante_vulgar">
                                        Sí
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="letra_chocante_vulgar"
                                        id="letra_chocante_vulgar" value="no" {{old('letra_chocante_vulgar') == 'no' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="no">
                                        No
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="letra_chocante_vulgar"
                                        id="letra_chocante_vulgar" value="cleaned_version" {{old('letra_chocante_vulgar') == 'cleaned_version' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="no">
                                        Cleaned Version
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="subgenero">Inicio de la previsualización</label>
                                <br>
                                <input type="number" class="form-control" id="inicio_previsualizacion"
                                    name="inicio_previsualizacion" placeholder="En segundos, ejemplo: 3"
                                    value="{{ old('inicio_previsualizacion') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="idioma_titulo">Idioma del título</label>
                                <br>
                                <select class="idioma_titulo col-md-12" name="idioma_titulo" id="idioma_titulo">
                                    <option value="Español" {{ old('idioma_titulo') == "Español" ? 'selected' : '' }}>Español</option>
                                    <option value="Inglés" {{ old('idioma_titulo') == "Inglés" ? 'selected' : '' }}>Inglés</option>
                                    <option value="Portugués" {{ old('idioma_titulo') == "Portugués" ? 'selected' : '' }}>Portugués</option>
                                    <option value="Italiano" {{ old('idioma_titulo') == "Italiano" ? 'selected' : '' }}>Italiano</option>
                                    <option value="Francés" {{ old('idioma_titulo') == "Francés" ? 'selected' : '' }}>Francés</option>
                                    <option value="Chino" {{ old('idioma_titulo') == "Chino" ? 'selected' : '' }}>Chino</option>
                                    <option value="Japonés" {{ old('idioma_titulo') == "Japonés" ? 'selected' : '' }}>Japonés</option>
                                    <option value="Coreano" {{ old('idioma_titulo') == "Coreano" ? 'selected' : '' }}>Coreano</option>
                                    <option value="Alemán" {{ old('idioma_titulo') == "Alemán" ? 'selected' : '' }}>Alemán</option>
                                    <option value="Árabe" {{ old('idioma_titulo') == "Árabe" ? 'selected' : '' }}>Árabe</option>
                                    <option value="Hindi" {{ old('idioma_titulo') == "Hindi" ? 'selected' : '' }}>Hindi</option>
                                    <option value="Ruso" {{ old('idioma_titulo') == "Ruso" ? 'selected' : '' }}>Ruso</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="idioma_letra">Idioma de la letra</label>
                                <br>
                                <select class="idioma_letra col-md-12" name="idioma_letra" id="idioma_letra">
                                    <option value="Español" {{ old('idioma_letra') == "Español" ? 'selected' : '' }}>Español</option>
                                    <option value="Inglés" {{ old('idioma_letra') == "Inglés" ? 'selected' : '' }}>Inglés</option>
                                    <option value="Portugués" {{ old('idioma_letra') == "Portugués" ? 'selected' : '' }}>Portugués</option>
                                    <option value="Italiano" {{ old('idioma_letra') == "Italiano" ? 'selected' : '' }}>Italiano</option>
                                    <option value="Francés" {{ old('idioma_letra') == "Francés" ? 'selected' : '' }}>Francés</option>
                                    <option value="Chino" {{ old('idioma_letra') == "Chino" ? 'selected' : '' }}>Chino</option>
                                    <option value="Japonés" {{ old('idioma_letra') == "Japonés" ? 'selected' : '' }}>Japonés</option>
                                    <option value="Coreano" {{ old('idioma_letra') == "Coreano" ? 'selected' : '' }}>Coreano</option>
                                    <option value="Alemán" {{ old('idioma_letra') == "Alemán" ? 'selected' : '' }}>Alemán</option>
                                    <option value="Árabe" {{ old('idioma_letra') == "Árabe" ? 'selected' : '' }}>Árabe</option>
                                    <option value="Hindi" {{ old('idioma_letra') == "Hindi" ? 'selected' : '' }}>Hindi</option>
                                    <option value="Ruso" {{ old('idioma_letra') == "Ruso" ? 'selected' : '' }}>Ruso</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="productor">¿De cuánto será TU porcentaje intelectual?</label>
                                <br>
                                <input type="text" class="form-control" id="porcentaje_intelectualCreador" name="porcentaje_intelectualCreador"
                                    placeholder="Numérico, ejemplo: 50 " value="{{ old('porcentaje_intelectualCreador') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="productor">¿Cuál será TU tipo de colaboración?</label>
                                <br>
                                <select class="idioma_titulo col-md-12" name="tipo_colaboracionCreador" id="tipo_colaboracionCreador"
                                    value="{{ old('tipo_colaboracionCreador') }}">
                                    <option value="Principal">Principal</option>
                                    <option value="Featuring">Featuring</option>
                                    <option value="Remixer">Remixer</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="alert alert-success" role="alert">
                                <p>**Recuerda que sólo debes registrar a los colaboradores <a class="alert-link">APARTE DE TI</a> para crear correctamente la canción**</p>
                                <p>¡Los colaboradores se registran diligenciando el <a class="alert-link">CORREO ELECTRÓNICO!</a></p>
                              </div>
                        </div>

                        <textarea class="form-control multi_existentes" name="colaboradores_existentes" data-name="colaboradores_existentes">
                            @if (old('colaboradores_existentes'))
                            {{ old('colaboradores_existentes') }}
                            @else
                            []
                            @endif
                            </textarea>
                        <script src="{{ asset('assets_reports/js/jquery.min.js') }}"></script>
                        <script src="{{ asset('multiinput/js/jq.multiinput.min.js') }}"></script>

                        <script>
                            $('.multi_existentes').multiInput({
                                json: true,
                                input: $(
                                    '<div class="row inputElement">\n' +
                                    '<div class="multiinput-title col-xs-12">Colaborador <span class="number">1</span></div>\n' +
                                    '<div class="form-group col-xs-6">\n' +
                                    '<input class="form-control" name="cliente_email" placeholder="EMAIL del artista colaborador ej: Alex@gmail.com" type="email">\n' +
                                    '</div>\n' +
                                    '<div class="form-group col-xs-6">\n' +
                                    '<input class="form-control" name="porcentaje_intelectual" placeholder="Porcentaje intelectual numérico, ejemplo: 70" type="number">\n' +
                                    '</div>\n' +
                                    '<div class="form-group col-xs-6">\n' +
                                    '<input class="form-control" name="spotify_colaboracion" placeholder="Link Spotify del artista, ejemplo: open.spotify/artist:xxxx" type="text">\n' +
                                    '</div>\n' +
                                    '<div class="form-group col-xs-6">\n' +
                                    '<label for="tipo_colaboracion">Tipo de colaboración</label>\n' +
                                    '<select name="tipo_colaboracion"><option value="Remixer">Remixer</option><option value="Featuring">Featuring</option><option value="Principal">Principal</option></select>\n' +
                                    '</div>\n' +
                                    '</div>\n'),
                                limit: 4,
                                onElementAdd: function(el, plugin) {
                                    console.log(plugin.elementCount);
                                },
                                onElementRemove: function(el, plugin) {
                                    console.log(plugin.elementCount);
                                }
                            });
                        </script>

                        <div class="form-group row">
                            <div class="alert alert-success" role="alert">
                                <p>¿No pertenece a Prismad? <a class="alert-link">¡INVÍTALO!</a>, añade el email en el campo correspondiente y le enviaremos un mensaje :)</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="alert alert-success text-start font-weight-bold" role="alert">
                                    <p>Puede importar los siguientes formatos:</p>
                                    <ul>
                                        <li>WAV</li>
                                        <li>FLAC</li>
                                        <li>AIFF</li>
                                    </ul>
                                    <p>No importe canciones con símbolos especiales como '/%#' y demás. Podría afectar la
                                        subida del archivo o directamente no ocurrir la misma.</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="pista_mp3">Carga la canción/pista</label>
                                <br>
                                <input type="file" class="form-control" id="pista_mp3" name="pista_mp3"
                                    value="{{ old('pista_mp3') }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="input-group-text">
                            <input type="checkbox" id="acepta_riesgo" name="acepta_riesgo" data-toggle="modal"
                                data-target="#modalAlerta" value="1" />
                            <label for="Contrato" data-toggle="modal" data-target="#modalAlerta"><a
                                    class="font-weight-bold">Soy consciente de que una vez añadida la canción al Repertorio
                                    no podré hacer modificaciones a la misma.</a></label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Añadir canción</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Estás Seguro de Crear la canción-->
    <div class="modal fade" id="modalAlerta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">¿YA TODO ESTÁ BIEN?</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- MENSAJE LARGO -->
                <form action="">
                    <div class="modal-body parrafo">
                        <h4>¿Estás seguro de que quieres añadir ésta canción al Repertorio?, recuerda que una vez hecho <a class="alert-link">NO
                        PODRÁS hacer cambios.</a></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">ACEPTAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('javascript')
    <script src="{{ asset('js/jsRegistroCanciones/scriptRegistro.js') }}"></script>
@endsection
