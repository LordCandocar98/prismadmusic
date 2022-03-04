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
                                </ul>
                            </div>
                        @endif

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="repertorio_id">Repertorio</label>
                                <br>
                                <select class="remixer col-md-12" name="repertorio_id" id="repertorio_id"
                                    value="{{ old('repertorio_id') }}">
                                    @foreach ($repertorios as $repertorios)
                                        <option value="{{ $repertorios->id }}">{{ $repertorios->titulo }}</option>
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
                                        value="original">
                                    <label class="form-check-label" for="tipo_secundario">
                                        Original
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_secundario" id="tipo_secundario"
                                        value="karaoke">
                                    <label class="form-check-label" for="tipo_secundario">
                                        Karaoke
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_secundario" id="tipo_secundario"
                                        value="medley">
                                    <label class="form-check-label" for="tipo_secundario">
                                        Medley
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_secundario" id="tipo_secundario"
                                        value="cover">
                                    <label class="form-check-label" for="tipo_secundario">
                                        Cover
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_secundario" id="tipo_secundario"
                                        value="otrogrupo">
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
                                        value="si">
                                    <label class="form-check-label" for="tipo_secundario">
                                        Sí
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="instrumental" id="instrumental"
                                        value="no">
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
                                    placeholder="..." value="{{ old('compositor') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="copyright">Arreglista</label>
                                <br>
                                <input type="text" class="form-control" id="arreglista" name="arreglista"
                                    placeholder="..." value="{{ old('arreglista') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="productor">Productor musical</label>
                                <br>
                                <input type="text" class="form-control" id="productor" name="productor" placeholder="..."
                                    value="{{ old('productor') }}">
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
                                <select class="genero col-md-12" name="genero" id="genero" value="{{ old('genero') }}">
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
                                    <option value="Baile Fun">Baile Funk</option>
                                    <option value="Bluegrass">Bluegrass</option>
                                    <option value="Blues">Blues</option>
                                    <option value="Bossa nova">Bossa nova</option>
                                    <option value="Breakbeat">Breakbeat</option>
                                    <option value="Britpop">Britpop</option>
                                    <option value="Bugio">Bugio</option>
                                    <option value=">C-Pop">C-Pop</option>
                                    <option value="Cajun">Cajun</option>
                                    <option value="Canção">Canção</option>
                                    <option value="Cantopop/HK-Pop">Cantopop/HK-Pop</option>
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
                                    <option value="Classical Crossover">Classical Crossover</option>
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
                                    <option value="Electronic">Electronic</option>
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
                                    <option value="Hip Hop/Rap">Hip Hop/Rap</option>
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
                                    <option value="Pop in Spanis">Pop in Spanish</option>
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
                                    <option value="Samba-regga">Samba-reggae</option>
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
                                    <option value="g1Worldbeat27">Worldbeat</option>
                                    <option value="Xote">Xote</option>
                                    <option value="Zydeco">Zydeco</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="subgenero">Sub-género</label>
                                <br>
                                <select class="subgenero col-md-12" name="subgenero" id="subgenero"
                                    value="{{ old('genero') }}">
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
                                    <option value="sg1Afrobeat3">Afrobeat</option>
                                    <option value="Aggrotech">Aggrotech</option>
                                    <option value="Air">Air</option>
                                    <option value="Alternative">Alternative</option>
                                    <option value="Alternative & Rock in Spanish">Alternative & Rock in Spanish</option>
                                    <option value="Ambient">Ambient</option>
                                    <option value="Americana">Americana</option>
                                    <option value="Anadolu rock">Anadolu rock</option>
                                    <option value="Anarcho-pun">Anarcho-punk</option>
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
                                    <option value="sgBrega8">Brega</option>
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
                                    <option value="Cantopop/HK-Po">Cantopop/HK-Pop</option>
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
                                    <option value="Deep soul">Deep soul</option>
                                    <option value="Delta blues">Delta blues</option>
                                    <option value="Dembow">Dembow</option>
                                    <option value="Dini">Dini</option>
                                    <option value="Disco">Disco</option>
                                    <option value="Dixieland">Dixieland</option>
                                    <option value="Dopé">Dopé</option>
                                    <option value="Downtempo">Downtempo</option>
                                    <option value="Dream pop">Dream pop</option>
                                    <option value="Drill and bass">Drill and bass</option>
                                    <option value="Drone">Drone</option>
                                    <option value="Drum and bass">Drum and bass</option>
                                    <option value="Dub">Dub</option>
                                    <option value="Dubstep">Dubstep</option>
                                    <option value="Easy Listening">Easy Listening</option>
                                    <option value="Electro">Electro</option>
                                    <option value="Electro Backbeat">Electro Backbeat</option>
                                    <option value="Electro hop">Electro hop</option>
                                    <option value="Electronic">Electronic</option>
                                    <option value="Electronica">Electronica</option>
                                    <option value="Electropop">Electropop</option>
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
                                    <option value="Groove metal<">Groove metal</option>
                                    <option value="Grunge">Grunge</option>
                                    <option value="Grupera">Grupera</option>
                                    <option value="Guaracha">Guaracha</option>
                                    <option value="Guitarra baiana">Guitarra baiana</option>
                                    <option value="Gypsy">Gypsy</option>
                                    <option value="Halk">Halk</option>
                                    <option value="Hard bop">Hard bop</option>
                                    <option value="Hardcore">Hardcore</option>
                                    <option value="Heavy metal">Heavy metal</option>
                                    <option value="Hip Hop">Hip Hop</option>
                                    <option value=">Hip Hop/Rap">Hip Hop/Rap</option>
                                    <option value="Holiday Musi">Holiday Music</option>
                                    <option value="House">House</option>
                                    <option value="sg1Hyphy82">Hyphy</option>
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
                                    <option value="Mangue Bea">Mangue Beat</option>
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
                                    <option value="Raggtime">Raggtime</option>
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
                                    <option value="Ruissian Chanso">Ruissian Chanson</option>
                                    <option value="Salsa">Salsa</option>
                                    <option value="Salsa Chok">Salsa Choke</option>
                                    <option value="Samba">Samba</option>
                                    <option value="Samba-canção">Samba-canção</option>
                                    <option value="Samba-reggae">Samba-reggae</option>
                                    <option value="Sanat">Sanat</option>
                                    <option value="Sertaneja">Sertaneja</option>
                                    <option value="Singer-songwriter">Singer-songwriter</option>
                                    <option value="Ska">Ska</option>
                                    <option value="Skate">Skate</option>
                                    <option value="Sludge meta">Sludge metal</option>
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
                                    <option value="Thrash meta">Thrash metal</option>
                                    <option value="Tradicional colombiana">Tradicional colombiana</option>
                                    <option value="Trance">Trance</option>
                                    <option value="Trap">Trap</option>
                                    <option value="Tribal house">Tribal house</option>
                                    <option value="Trip rock">Trip rock</option>
                                    <option value="Trip-hop">Trip-hop</option>
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
                                <label for="genero_secundario">Género secundario</label>
                                <br>
                                <select class="genero_secundario col-md-12" name="genero_secundario" id="genero_secundario"
                                    value="{{ old('genero') }}">
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
                                    id="subgenero_secundario" value="{{ old('genero') }}">
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
                                        id="letra_chocante_vulgar" value="si">
                                    <label class="form-check-label" for="letra_chocante_vulgar">
                                        Sí
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="letra_chocante_vulgar"
                                        id="letra_chocante_vulgar" value="no">
                                    <label class="form-check-label" for="no">
                                        No
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="letra_chocante_vulgar"
                                        id="letra_chocante_vulgar" value="cleaned_version">
                                    <label class="form-check-label" for="no">
                                        Cleaned Version
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="subgenero">Inicio de la previsualización</label>
                                <br>
                                <input type="text" class="form-control" id="inicio_previsualizacion"
                                    name="inicio_previsualizacion" placeholder="..."
                                    value="{{ old('inicio_previsualizacion') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="idioma_titulo">Idioma del título</label>
                                <br>
                                <select class="idioma_titulo col-md-12" name="idioma_titulo" id="idioma_titulo"
                                    value="{{ old('idioma_titulo') }}">
                                    <option value="Español">Español</option>
                                    <option value="Inglés">Inglés</option>
                                    <option value="Portugués">Portugués</option>
                                    <option value="Italiano">Italiano</option>
                                    <option value="Francés">Francés</option>
                                    <option value="Chino">Chino</option>
                                    <option value="Japonés">Japonés</option>
                                    <option value="Coreano">Coreano</option>
                                    <option value="Alemán">Alemán</option>
                                    <option value="Árabe">Árabe</option>
                                    <option value="Hindi">Hindi</option>
                                    <option value="Ruso">Ruso</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="idioma_letra">Idioma de la letra</label>
                                <br>
                                <select class="idioma_letra col-md-12" name="idioma_letra" id="idioma_letra"
                                    value="{{ old('idioma_letra') }}">
                                    <option value="Español">Español</option>
                                    <option value="Inglés">Inglés</option>
                                    <option value="Portugués">Portugués</option>
                                    <option value="Italiano">Italiano</option>
                                    <option value="Francés">Francés</option>
                                    <option value="Chino">Chino</option>
                                    <option value="Japonés">Japonés</option>
                                    <option value="Coreano">Coreano</option>
                                    <option value="Alemán">Alemán</option>
                                    <option value="Árabe">Árabe</option>
                                    <option value="Hindi">Hindi</option>
                                    <option value="Ruso">Ruso</option>
                                </select>
                            </div>
                        </div>

                        <textarea class="form-control multi_existentes" name="colaboradores_existentes"
                            data-name="colaboradores_existentes">
                            []
                            </textarea>
                        <script src="{{ asset('assets_reports/js/jquery.min.js') }}"></script>
                        <script src="{{ asset('multiinput/js/jq.multiinput.min.js') }}"></script>

                        <script>
                            var clienteAux = <?php echo json_encode($clientes); ?>;
                            var auxiliar = '<select class="multiinput-title col-xs-12 cliente_id" name="cliente_id" id="cliente_id">';
                            for (var i = 0; i < clienteAux.length; i++) {
                                auxiliar += '<option value="' + clienteAux[i].id + '">' + clienteAux[i].nombre_artistico + '</option>'
                            }
                            auxiliar += '</select>\n';
                            $('.multi_existentes').multiInput({
                                json: true,
                                input: $(
                                    '<div class="row inputElement">\n' +
                                    '<div class="multiinput-title col-xs-12"> Colaborador <span class="number">1</span></div>\n' +
                                    '<div class="form-group col-xs-6">\n' +
                                    auxiliar +
                                    '</div>\n' +
                                    '<div class="form-group col-xs-6">\n' +
                                    '<input class="form-control" name="porcentaje_intelectual" placeholder="Porcentaje intelectual Ejemplo: 40" type="text">\n' +
                                    '</div>\n' +
                                    '<div class="form-group col-xs-6">\n' +
                                    '<label for="tipo_colaboracion">Tipo de Colaboración</label>\n' +
                                    '<select name="tipo_colaboracion"><option value="Remixer">Remixer</option><option value="Featuring">Featuring</option><option value="Principal">Principal</option></select>\n'+                                    '</div>\n' +
                                    '</div>\n'),
                                limit: 4,
                                onElementAdd: function(el, plugin) {
                                    console.log(plugin.elementCount);
                                    if ($(".cliente_id").length > 0) {
                                        $('.cliente_id').select2({
                                            allowClear: true,
                                            placeholder: {
                                                id: -1,
                                            },
                                        });
                                    }
                                },
                                onElementRemove: function(el, plugin) {
                                    console.log(plugin.elementCount);
                                    if ($(".cliente_id").length > 0) {
                                        $('.cliente_id').select2({
                                            allowClear: true,
                                            placeholder: {
                                                id: -1,
                                            },
                                        });
                                    }
                                }
                            });
                        </script>

                        <textarea class="form-control multi" name="colaboradores" data-name="colaboradores">
                            []
                            </textarea>
                        <script src="{{ asset('assets_reports/js/jquery.min.js') }}"></script>
                        <script src="{{ asset('multiinput/js/jq.multiinput.min.js') }}"></script>

                        <script>
                            $('.multi').multiInput({
                                json: true,
                                input: $(
                                    '<div class="row inputElement">\n' +
                                    '<div class="multiinput-title col-xs-12">Invitar Colaborador <span class="number">1</span></div>\n' +
                                    '<div class="form-group col-xs-6">\n' +
                                    '<input class="form-control" name="email" placeholder="Pepito@gmail.com" type="text">\n' +
                                    '</div>\n' +
                                    '<div class="form-group col-xs-6">\n' +
                                    '<input class="form-control" name="porcentaje_intelectual" placeholder="Porcentaje intelectual Ejemplo: 40" type="text">\n' +
                                    '</div>\n' +
                                    '<div class="form-group col-xs-6">\n' +
                                    '<label for="tipo_colaboracion">Tipo de Colaboración</label>\n' +
                                    '<select name="tipo_colaboracion"><option value="Remixer">Remixer</option><option value="Featuring">Featuring</option><option value="Principal">Principal</option></select>\n'+                                    '</div>\n' +
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
                            <div class="col-md-12">
                                <div class="alert alert-warning text-start font-weight-bold" role="alert">
                                    <p>Puede importar los siguientes formatos:</p>
                                    <ul>
                                        <li>WAV</li>
                                        <li>FLAC</li>
                                        <li>AIFF</li>
                                    </ul>
                                    <p>No importe canciones con símbolos especiales como &/%# y demás. Podría afectar la
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
                    <h5 class="modal-title" id="exampleModalLabel">¿YA TODO ESTÁ BIEN?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- MENSAJE LARGO -->
                <form action="">
                    <div class="modal-body parrafo">
                        ¿Estás seguro de que quieres añadir ésta canción al Repertorio?, recuerda que una vez hecho no
                        puedes hacer cambios.
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
