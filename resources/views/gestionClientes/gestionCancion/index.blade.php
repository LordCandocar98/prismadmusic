@extends('layouts.master')

@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-music" aria-hidden="true"></i>
        Información sobre la pista
    </h1>
@endsection

@section('css')
<style>
    .parrafo{
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="/cancion" method="post" id="formRegistro" name="formRegistro" enctype="multipart/form-data">
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
                            <div class="col-sm-6">
                                <label for="titulo">Tipo secundario</label>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_secundario" id="tipo_secundario" value="original">
                                    <label class="form-check-label" for="tipo_secundario">
                                        Original
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_secundario" id="tipo_secundario" value="karaoke">
                                    <label class="form-check-label" for="tipo_secundario">
                                        Karaoke
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_secundario" id="tipo_secundario" value="medley">
                                    <label class="form-check-label" for="tipo_secundario">
                                        Medley
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_secundario" id="tipo_secundario" value="cover">
                                    <label class="form-check-label" for="tipo_secundario">
                                        Cover
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_secundario" id="tipo_secundario" value="otrogrupo">
                                    <label class="form-check-label" for="tipo_secundario">
                                        Versión por otro grupo
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="version">Instrumental</label>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="instrumental" id="instrumental" value="si">
                                    <label class="form-check-label" for="tipo_secundario">
                                        Sí
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="instrumental" id="instrumental" value="no">
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
                                <label for="cliente_id">Artista principal</label>
                                <br>
                                <select class="cliente_id col-md-12" name="cliente_id" id="cliente_id"
                                    value="{{ old('cliente_id') }}">
                                    @foreach ($clientes as $clientes)
                                        <option value="{{ $clientes->id }}">{{ $clientes->nombre_artistico }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="featuring">Featuring</label>
                                <br>
                                <select class="featuring col-md-12" name="featuring" id="featuring"
                                    value="{{ old('featuring') }}">
                                    @foreach ($clientes2 as $clientes2)
                                        <option value="{{ $clientes2->id }}">{{ $clientes2->nombre_artistico }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="formato">Remixer</label>
                                <br>
                                <select class="remixer col-md-12" name="remixer" id="remixer"
                                    value="{{ old('remixer') }}">
                                    @foreach ($clientes3 as $clientes3)
                                        <option value="{{ $clientes3->id }}">{{ $clientes3->nombre_artistico }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="autor">Autor</label>
                                <br>
                                <input type="text" class="form-control" id="autor" name="autor"
                                    value="{{ old('autor') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="productor">Compositor</label>
                                <br>
                                <input type="text" class="form-control" id="compositor" name="compositor" placeholder="..."
                                    value="{{ old('compositor') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="copyright">Arreglista</label>
                                <br>
                                <input type="text" class="form-control" id="arreglista" name="arreglista" placeholder="..."
                                    value="{{ old('arreglista') }}">
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
                                <input type="number" step="1" value="2022" class="form-control" id="annio_produccion" name="annio_produccion"
                                    value="{{ old('annio_produccion') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="genero">Selecciona una fecha principal de salida al mercado (*para vídeo horarios CET)</label>
                                <br>
                                <input type="date" class="form-control" id="fecha_principal_salida" name="fecha_principal_salida"
                                    value="{{ old('fecha_principal_salida') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="genero">Género</label>
                                <br>
                                <select class="genero col-md-12" name="genero" id="genero"
                                    value="{{ old('genero') }}">
                                    <option value="g1">Afoxé</option>
                                    <option value="g2">Alternative</option>
                                    <option value="g3">Alternative & Rock in Spanish</option>
                                    <option value="g4">Ambient</option>
                                    <option value="g5">Americana</option>
                                    <option value="g6">Anime</option>
                                    <option value="g7">Arabesk</option>
                                    <option value="g8">Avant-garde</option>
                                    <option value="g9">Axé</option>
                                    <option value="g10">Baião</option>
                                    <option value="g11">Baile Funk</option>
                                    <option value="g12">Bluegrass</option>
                                    <option value="g13">Blues</option>
                                    <option value="g14">Bossa nova</option>
                                    <option value="g15">Breakbeat</option>
                                    <option value="g16">Britpop</option>
                                    <option value="g17">Bugio</option>
                                    <option value="g18">C-Pop</option>
                                    <option value="g19">Cajun</option>
                                    <option value="g20">Canção</option>
                                    <option value="g21">Cantopop/HK-Pop 1</option>
                                    <option value="g22">Celtic</option>
                                    <option value="g23">Celtic Folk</option>
                                    <option value="g24">Chamamé</option>
                                    <option value="g25">Chamarra</option>
                                    <option value="g26">Chamber music</option>
                                    <option value="g27">Children's music</option>
                                    <option value="g28">Chill-Out</option>
                                    <option value="g29">Chinese</option>
                                    <option value="g30">Chorinho</option>
                                    <option value="g31">Choro</option>
                                    <option value="g32">Christian</option>
                                    <option value="g33">Classical</option>
                                    <option value="g34">Classical Crossover</option>
                                    <option value="g35">Comedy</option>
                                    <option value="g36">Country</option>
                                    <option value="g37">Cumbia</option>
                                    <option value="g38">Dance</option>
                                    <option value="g39">Dancehall</option>
                                    <option value="g40">Delta blues</option>
                                    <option value="g41">Disco</option>
                                    <option value="g42">Dixieland</option>
                                    <option value="g43">Downtempo</option>
                                    <option value="g44">Drum and bass</option>
                                    <option value="g45">Dub</option>
                                    <option value="g46">Easy listening</option>
                                    <option value="g47">Electronic</option>
                                    <option value="g48">Electronica</option>
                                    <option value="g49">Emo</option>
                                    <option value="g50">Enka</option>
                                    <option value="g51">Folk</option>
                                    <option value="g52">Forró</option>
                                    <option value="g53">French Pop</option>
                                    <option value="g54">Frevo</option>
                                    <option value="g55">Funk</option>
                                    <option value="g56">Gangsta rap</option>
                                    <option value="g57">German Folk</option>
                                    <option value="g58">German Pop</option>
                                    <option value="g59">Gospel</option>
                                    <option value="g60">Grunge</option>
                                    <option value="g61">Guitarra baiana</option>
                                    <option value="g62">Hard bop</option>
                                    <option value="g63">Hardcore</option>
                                    <option value="g64">Heavy Metal</option>
                                    <option value="g65">Hip Hop/Rap</option>
                                    <option value="g66">Holiday Music</option>
                                    <option value="g67">House</option>
                                    <option value="g68">Indo Pop</option>
                                    <option value="g69">Industrial</option>
                                    <option value="g70">Jazz</option>
                                    <option value="g71">Karaoke</option>
                                    <option value="g72">Kayokyuoku</option>
                                    <option value="g73">Kizomba</option>
                                    <option value="g74">Latin Jazz</option>
                                    <option value="g75">Latin Rap</option>
                                    <option value="g76">Lounge</option>
                                    <option value="g77">Milonga</option>
                                    <option value="g78">Motown</option>
                                    <option value="g79">MPB</option>
                                    <option value="g80">New Age</option>
                                    <option value="g81">New Wave</option>
                                    <option value="g82">Opera</option>
                                    <option value="g83">Pagode</option>
                                    <option value="g84">Pop</option>
                                    <option value="g85">Pop in Spanish</option>
                                    <option value="g86">Psychedelic</option>
                                    <option value="g87">Punk</option>
                                    <option value="g88">Ragtime</option>
                                    <option value="g89">Rancheira</option>
                                    <option value="g90">Rap</option>
                                    <option value="g91">Reggae</option>
                                    <option value="g92">Reggaeton</option>
                                    <option value="g93">Regional Mexicano</option>
                                    <option value="g94">Rhythm & Blues</option>
                                    <option value="g95">Rock</option>
                                    <option value="g96">Rap</option>
                                    <option value="g97">Rockabilly</option>
                                    <option value="g98">Russian Chanson</option>
                                    <option value="g99">Salsa</option>
                                    <option value="g100">Salsa Choke</option>
                                    <option value="g101">Samba</option>
                                    <option value="g102">Samba-canção</option>
                                    <option value="g103">Samba-reggae</option>
                                    <option value="g104">Sertaneja</option>
                                    <option value="g105">Singer-songwriter</option>
                                    <option value="g106">Ska</option>
                                    <option value="g107">Smooth jazz</option>
                                    <option value="g108">Soca</option>
                                    <option value="g109">Soul</option>
                                    <option value="g110">Soundtrack</option>
                                    <option value="g111">Spoken Word</option>
                                    <option value="g112">Surf</option>
                                    <option value="g113">Techno</option>
                                    <option value="g114">Teen Pop</option>
                                    <option value="g115">Thai Pop</option>
                                    <option value="g116">Trance</option>
                                    <option value="g117">Trap</option>
                                    <option value="g118">Trip Rock</option>
                                    <option value="g119">Turkish</option>
                                    <option value="g120">Underground</option>
                                    <option value="g121">Urban Cowboy</option>
                                    <option value="g122">Vallenato</option>
                                    <option value="g123">Valsa</option>
                                    <option value="g124">Vanera</option>
                                    <option value="g125">Vocal</option>
                                    <option value="g126">World</option>
                                    <option value="g127">Worldbeat</option>
                                    <option value="g128">Xote</option>
                                    <option value="g129">Zydeco</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="subgenero">Sub-género</label>
                                <br>
                                <select class="subgenero col-md-12" name="subgenero" id="subgenero"
                                    value="{{ old('genero') }}">
                                    <option value="sg1">Acid</option>
                                    <option value="sg2">Acid house</option>
                                    <option value="sg3">Acid Jazz</option>
                                    <option value="sg4">Acid Punk</option>
                                    <option value="sg5">Acid rap</option>
                                    <option value="sg6">Acid rock</option>
                                    <option value="sg7">Acid techno</option>
                                    <option value="sg8">Afoxé</option>
                                    <option value="sg9">Afro</option>
                                    <option value="sg10">Afro-Cuban Jazz</option>
                                    <option value="sg11">Afro-Juju</option>
                                    <option value="sg12">Afro-Punk</option>
                                    <option value="sg13">Afrobeat</option>
                                    <option value="sg14">Aggrotech</option>
                                    <option value="sg15">Air</option>
                                    <option value="sg16">Alternative</option>
                                    <option value="sg17">Alternative & Rock in Spanish</option>
                                    <option value="sg18">Ambient</option>
                                    <option value="sg19">Americana</option>
                                    <option value="sg20">Anadolu rock</option>
                                    <option value="sg21">Anarcho-punk</option>
                                    <option value="sg22">Andean New Age</option>
                                    <option value="sg23">Anime</option>
                                    <option value="sg24">Anti-folk</option>
                                    <option value="sg25">Arabesk</option>
                                    <option value="sg26">Art</option>
                                    <option value="sg27">Asian</option>
                                    <option value="sg28">Audio Book</option>
                                    <option value="sg29">Avant-garde</option>
                                    <option value="sg30">Axé</option>
                                    <option value="sg31">Bachata</option>
                                    <option value="sg32">Baião</option>
                                    <option value="sg33">Baile Exótico</option>
                                    <option value="sg34">Baile Funk</option>
                                    <option value="sg35">Banda</option>
                                    <option value="sg36">Bass</option>
                                    <option value="sg37">Bastard Pop</option>
                                    <option value="sg38">Batá</option>
                                    <option value="sg39">Batucada</option>
                                    <option value="sg40">Batuco</option>
                                    <option value="sg41">Beat</option>
                                    <option value="sg42">Beatboxing</option>
                                    <option value="sg43">Bebop</option>
                                    <option value="sg44">Big band music</option>
                                    <option value="sg45">Big Beat</option>
                                    <option value="sg46">Bloco afro</option>
                                    <option value="sg47">Bluegrass</option>
                                    <option value="sg48">Blues</option>
                                    <option value="sg49">Bohemian Dub</option>
                                    <option value="sg50">Boi</option>
                                    <option value="sg51">Bolero</option>
                                    <option value="sg52">Bombay pop</option>
                                    <option value="sg53">Bossa nova</option>
                                    <option value="sg54">Boy band</option>
                                    <option value="sg55">Brass</option>
                                    <option value="sg56">Brazilian</option>
                                    <option value="sg57">Breakbeat</option>
                                    <option value="sg58">Brega</option>
                                    <option value="sg59">Bregafunk</option>
                                    <option value="sg60">Britpop</option>
                                    <option value="sg61">Broken beat</option>
                                    <option value="sg62">Bubblegum pop</option>
                                    <option value="sg63">Bugio</option>
                                    <option value="sg64">Bulerias</option>
                                    <option value="sg65">C-Pop</option>
                                    <option value="sg66">Cabaret</option>
                                    <option value="sg67">Cadence</option>
                                    <option value="sg68">Cajun</option>
                                    <option value="sg69">Calypso</option>
                                    <option value="sg70">Cancão</option>
                                    <option value="sg71">Canto livre</option>
                                    <option value="sg72">Canto nuevo</option>
                                    <option value="sg73">Canto popular</option>
                                    <option value="sg74">Cantopop/HK-Pop</option>
                                    <option value="sg75">Caopeira music</option>
                                    <option value="sg76">Carimbó</option>
                                    <option value="sg77">Catalogue</option>
                                    <option value="sg78">Celtic</option>
                                    <option value="sg79">Celtic Folk</option>
                                    <option value="sg80">Celtic Pop</option>
                                    <option value="sg81">Celtic Rock</option>
                                    <option value="sg82">Chamamé</option>
                                    <option value="sg83">Chamarra</option>
                                    <option value="sg84">Chamber music</option>
                                    <option value="sg85">Champeta</option>
                                    <option value="sg86">Chemical breaks</option>
                                    <option value="sg87">Children's Music</option>
                                    <option value="sg88">Chill-Out</option>
                                    <option value="sg89">Chinese</option>
                                    <option value="sg90">Chorinho</option>
                                    <option value="sg91">Choro</option>
                                    <option value="sg92">Christian</option>
                                    <option value="sg93">Chumba</option>
                                    <option value="sg94">Classical</option>
                                    <option value="sg95">Classical Crossover</option>
                                    <option value="sg96">Club</option>
                                    <option value="sg97">Coldwave</option>
                                    <option value="sg98">Comedy</option>
                                    <option value="sg99">Cool Jazz</option>
                                    <option value="sg100">Country</option>
                                    <option value="sg101">Creole</option>
                                    <option value="sg102">Crunk</option>
                                    <option value="sg103">Cumbia</option>
                                    <option value="sg104">Chorinho</option>
                                    <option value="sg105">Currulao</option>
                                    <option value="sg106">Dance</option>
                                    <option value="sg107">Dancehall</option>
                                    <option value="sg108">Dark</option>
                                    <option value="sg109">Death Industrial</option>
                                    <option value="sg110">Death Metal</option>
                                    <option value="sg111">Deathcore</option>
                                    <option value="sg112">Deathgrind</option>
                                    <option value="sg113">Deboche</option>
                                    <option value="sg114">Deep house</option>
                                    <option value="sg115">Deep soul</option>
                                    <option value="sg116">Delta blues</option>
                                    <option value="sg117">Dembow</option>
                                    <option value="sg118">Dini</option>
                                    <option value="sg119">Disco</option>
                                    <option value="sg120">Dixieland</option>
                                    <option value="sg121">Dopé</option>
                                    <option value="sg122">Downtempo</option>
                                    <option value="sg123">Dream pop</option>
                                    <option value="sg124">Drill and bass</option>
                                    <option value="sg125">Drone</option>
                                    <option value="sg126">Drum and bass</option>
                                    <option value="sg127">Dub</option>
                                    <option value="sg128">Dubstep</option>
                                    <option value="sg129">Easy Listening</option>
                                    <option value="sg130">Electro</option>
                                    <option value="sg131">Electro Backbeat</option>
                                    <option value="sg132">Electro hop</option>
                                    <option value="sg133">Electronic</option>
                                    <option value="sg134">Electronica</option>
                                    <option value="sg135">Electropop</option>
                                    <option value="sg136">Emo</option>
                                    <option value="sg137">Electronic</option>
                                    <option value="sg138">Electronica</option>
                                    <option value="sg139">Electropop</option>
                                    <option value="sg140">Emo</option>
                                    <option value="sg141">Enka</option>
                                    <option value="sg142">Europop</option>
                                    <option value="sg143">Experimental</option>
                                    <option value="sg144">F-Step</option>
                                    <option value="sg145">Fado</option>
                                    <option value="sg146">Fantezi</option>
                                    <option value="sg147">Filk</option>
                                    <option value="sg148">Flamenco</option>
                                    <option value="sg149">Folk</option>
                                    <option value="sg150">Folktronica</option>
                                    <option value="sg151">Forró</option>
                                    <option value="sg152">Free improvisation</option>
                                    <option value="sg153">Free Jazz</option>
                                    <option value="sg154">Freestyle</option>
                                    <option value="sg155">French pop</option>
                                    <option value="sg156">Frevo</option>
                                    <option value="sg157">Fricote</option>
                                    <option value="sg158">Funk</option>
                                    <option value="sg159">Gangsta rap</option>
                                    <option value="sg160">Garage</option>
                                    <option value="sg161">German Folk</option>
                                    <option value="sg162">German Pop</option>
                                    <option value="sg163">Go go</option>
                                    <option value="sg164">Gospel</option>
                                    <option value="sg165">Gothic</option>
                                    <option value="sg166">Grime</option>
                                    <option value="sg167">Grindcore</option>
                                    <option value="sg168">Groove metal</option>
                                    <option value="sg169">Grunge</option>
                                    <option value="sg170">Grupera</option>
                                    <option value="sg171">Guaracha</option>
                                    <option value="sg172">Guitarra baiana</option>
                                    <option value="sg173">Gypsy</option>
                                    <option value="sg174">Halk</option>
                                    <option value="sg175">Hard bop</option>
                                    <option value="sg176">Hardcore</option>
                                    <option value="sg177">Heavy metal</option>
                                    <option value="sg178">Hip Hop</option>
                                    <option value="sg179">Hip Hop/Rap</option>
                                    <option value="sg180">Holiday Music</option>
                                    <option value="sg181">House</option>
                                    <option value="sg182">Hyphy</option>
                                    <option value="sg183">Indian Classical</option>
                                    <option value="sg184">Indie</option>
                                    <option value="sg185">Indie Pop</option>
                                    <option value="sg186">Indo Pop</option>
                                    <option value="sg187">Industrial</option>
                                    <option value="sg188">Infantil</option>
                                    <option value="sg189">Instrumental</option>
                                    <option value="sg190">Jam</option>
                                    <option value="sg191">Jazz</option>
                                    <option value="sg192">Juju</option>
                                    <option value="sg193">Jungle</option>
                                    <option value="sg194">K-Pop</option>
                                    <option value="sg195">Karaoke</option>
                                    <option value="sg196">Kayokyoku</option>
                                    <option value="sg197">Kizomba</option>
                                    <option value="sg198">Latin</option>
                                    <option value="sg199">Latin Jazz</option>
                                    <option value="sg200">Latin Rap</option>
                                    <option value="sg201">Lo-Pop</option>
                                    <option value="sg202">Lounge</option>
                                    <option value="sg203">Mambo</option>
                                    <option value="sg204">Mangue Beat</option>
                                    <option value="sg205">Maracatu</option>
                                    <option value="sg206">Mariachi</option>
                                    <option value="sg207">Marimba</option>
                                    <option value="sg208">Maxixe</option>
                                    <option value="sg209">Mento</option>
                                    <option value="sg210">Merengue</option>
                                    <option value="sg211">Metal</option>
                                    <option value="sg212">Mexican</option>
                                    <option value="sg213">Miami bass</option>
                                    <option value="sg214">Microhouse</option>
                                    <option value="sg215">Milonga</option>
                                    <option value="sg216">Minimalist</option>
                                    <option value="sg217">Modinha</option>
                                    <option value="sg218">Motown</option>
                                    <option value="sg219">MPB</option>
                                    <option value="sg220">Neo Soul</option>
                                    <option value="sg221">Neofolk</option>
                                    <option value="sg222">New Age</option>
                                    <option value="sg223">New Wave</option>
                                    <option value="sg224">Noise pop</option>
                                    <option value="sg225">Norteño</option>
                                    <option value="sg226">Nova Canção</option>
                                    <option value="sg227">Oi!</option>
                                    <option value="sg228">Old school</option>
                                    <option value="sg229">Old time</option>
                                    <option value="sg230">Oldies</option>
                                    <option value="sg231">Opera</option>
                                    <option value="sg232">Orchesta</option>
                                    <option value="sg233">Outlaw</option>
                                    <option value="sg234">Özgün</option>
                                    <option value="sg235">Pagode</option>
                                    <option value="sg236">Pixiefunk</option>
                                    <option value="sg237">Plena</option>
                                    <option value="sg238">Pop</option>
                                    <option value="sg239">Pop in Spanish</option>
                                    <option value="sg240">Popular Colombiana</option>
                                    <option value="sg241">Porngroove</option>
                                    <option value="sg242">Post-hardcore</option>
                                    <option value="sg243">Progressive</option>
                                    <option value="sg244">Psychedelic</option>
                                    <option value="sg245">Psychobilly</option>
                                    <option value="sg246">Punk</option>
                                    <option value="sg247">Quadrille</option>
                                    <option value="sg248">Ragas</option>
                                    <option value="sg249">Raggamuffin</option>
                                    <option value="sg250">Ragtime</option>
                                    <option value="sg251">Rancheira</option>
                                    <option value="sg252">Rap</option>
                                    <option value="sg253">Rave</option>
                                    <option value="sg254">Reggae</option>
                                    <option value="sg255">Reggaeton</option>
                                    <option value="sg256">Regional Mexicano</option>
                                    <option value="sg257">Retro</option>
                                    <option value="sg258">Rhytm & Blues</option>
                                    <option value="sg259">Rock</option>
                                    <option value="sg260">Rock opera</option>
                                    <option value="sg261">Rockabilly</option>
                                    <option value="sg262">Roots</option>
                                    <option value="sg263">Ruissian Chanson</option>
                                    <option value="sg264">Salsa</option>
                                    <option value="sg265">Salsa Choke</option>
                                    <option value="sg266">Samba</option>
                                    <option value="sg267">Samba-canção</option>
                                    <option value="sg268">Samba-reggae</option>
                                    <option value="sg269">Sanat</option>
                                    <option value="sg270">Sertaneja</option>
                                    <option value="sg271">Singer-songwriter</option>
                                    <option value="sg272">Ska</option>
                                    <option value="sg273">Skate</option>
                                    <option value="sg274">Sludge metal</option>
                                    <option value="sg275">Smooth jazz</option>
                                    <option value="sg276">Soca</option>
                                    <option value="sg277">Soldier</option>
                                    <option value="sg278">Son montuno</option>
                                    <option value="sg279">Sonata</option>
                                    <option value="sg280">Soul</option>
                                    <option value="sg281">Soundtrack</option>
                                    <option value="sg282">Southern</option>
                                    <option value="sg283">Space</option>
                                    <option value="sg284">Speed metal</option>
                                    <option value="sg285">Spiritual</option>
                                    <option value="sg286">Spirituals</option>
                                    <option value="sg287">Spoken Word</option>
                                    <option value="sg288">Story</option>
                                    <option value="sg289">Surf</option>
                                    <option value="sg290">Swing music</option>
                                    <option value="sg291">Swingbeat</option>
                                    <option value="sg292">Symphony</option>
                                    <option value="sg293">Tango</option>
                                    <option value="sg294">Techno</option>
                                    <option value="sg295">Teen pop</option>
                                    <option value="sg296">Thai pop</option>
                                    <option value="sg297">Thrash metal</option>
                                    <option value="sg298">Tradicional colombiana</option>
                                    <option value="sg299">Trance</option>
                                    <option value="sg300">Trap</option>
                                    <option value="sg301">Tribal house</option>
                                    <option value="sg302">Trip rock</option>
                                    <option value="sg303">Trip-hop</option>
                                    <option value="sg304">Tropical</option>
                                    <option value="sg305">Tropical Salsa</option>
                                    <option value="sg306">Tropicalia</option>
                                    <option value="sg307">Turkish</option>
                                    <option value="sg308">Turkish Alternative</option>
                                    <option value="sg309">Turkish Hip-Hop/Rap</option>
                                    <option value="sg310">Turkish Pop</option>
                                    <option value="sg311">Turkish Rock</option>
                                    <option value="sg312">Unnasigned</option>
                                    <option value="sg313">Undergound</option>
                                    <option value="sg314">Unplugged</option>
                                    <option value="sg315">Urban</option>
                                    <option value="sg316">Urban Cowboy</option>
                                    <option value="sg317">Urban Folk</option>
                                    <option value="sg318">Urban Jazz</option>
                                    <option value="sg319">Vallenato</option>
                                    <option value="sg320">Valsa</option>
                                    <option value="sg321">Vanera</option>
                                    <option value="sg322">Video game</option>
                                    <option value="sg323">Vocal</option>
                                    <option value="sg324">Waltz</option>
                                    <option value="sg325">West Coas hip hop</option>
                                    <option value="sg326">World</option>
                                    <option value="sg327">Worldbeat</option>
                                    <option value="sg328">Xote</option>
                                    <option value="sg329">Yo-pop</option>
                                    <option value="sg330">Zouk</option>
                                    <option value="sg331">Zulu</option>
                                    <option value="sg332">Zydeco</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="genero_secundario">Género secundario</label>
                                <br>
                                <select class="genero_secundario col-md-12" name="genero_secundario" id="genero_secundario"
                                    value="{{ old('genero') }}">
                                    <option value="g1">Afoxé</option>
                                    <option value="g2">Alternative</option>
                                    <option value="g3">Alternative & Rock in Spanish</option>
                                    <option value="g4">Ambient</option>
                                    <option value="g5">Americana</option>
                                    <option value="g6">Anime</option>
                                    <option value="g7">Arabesk</option>
                                    <option value="g8">Avant-garde</option>
                                    <option value="g9">Axé</option>
                                    <option value="g10">Baião</option>
                                    <option value="g11">Baile Funk</option>
                                    <option value="g12">Bluegrass</option>
                                    <option value="g13">Blues</option>
                                    <option value="g14">Bossa nova</option>
                                    <option value="g15">Breakbeat</option>
                                    <option value="g16">Britpop</option>
                                    <option value="g17">Bugio</option>
                                    <option value="g18">C-Pop</option>
                                    <option value="g19">Cajun</option>
                                    <option value="g20">Canção</option>
                                    <option value="g21">Cantopop/HK-Pop 1</option>
                                    <option value="g22">Celtic</option>
                                    <option value="g23">Celtic Folk</option>
                                    <option value="g24">Chamamé</option>
                                    <option value="g25">Chamarra</option>
                                    <option value="g26">Chamber music</option>
                                    <option value="g27">Children's music</option>
                                    <option value="g28">Chill-Out</option>
                                    <option value="g29">Chinese</option>
                                    <option value="g30">Chorinho</option>
                                    <option value="g31">Choro</option>
                                    <option value="g32">Christian</option>
                                    <option value="g33">Classical</option>
                                    <option value="g34">Classical Crossover</option>
                                    <option value="g35">Comedy</option>
                                    <option value="g36">Country</option>
                                    <option value="g37">Cumbia</option>
                                    <option value="g38">Dance</option>
                                    <option value="g39">Dancehall</option>
                                    <option value="g40">Delta blues</option>
                                    <option value="g41">Disco</option>
                                    <option value="g42">Dixieland</option>
                                    <option value="g43">Downtempo</option>
                                    <option value="g44">Drum and bass</option>
                                    <option value="g45">Dub</option>
                                    <option value="g46">Easy listening</option>
                                    <option value="g47">Electronic</option>
                                    <option value="g48">Electronica</option>
                                    <option value="g49">Emo</option>
                                    <option value="g50">Enka</option>
                                    <option value="g51">Folk</option>
                                    <option value="g52">Forró</option>
                                    <option value="g53">French Pop</option>
                                    <option value="g54">Frevo</option>
                                    <option value="g55">Funk</option>
                                    <option value="g56">Gangsta rap</option>
                                    <option value="g57">German Folk</option>
                                    <option value="g58">German Pop</option>
                                    <option value="g59">Gospel</option>
                                    <option value="g60">Grunge</option>
                                    <option value="g61">Guitarra baiana</option>
                                    <option value="g62">Hard bop</option>
                                    <option value="g63">Hardcore</option>
                                    <option value="g64">Heavy Metal</option>
                                    <option value="g65">Hip Hop/Rap</option>
                                    <option value="g66">Holiday Music</option>
                                    <option value="g67">House</option>
                                    <option value="g68">Indo Pop</option>
                                    <option value="g69">Industrial</option>
                                    <option value="g70">Jazz</option>
                                    <option value="g71">Karaoke</option>
                                    <option value="g72">Kayokyuoku</option>
                                    <option value="g73">Kizomba</option>
                                    <option value="g74">Latin Jazz</option>
                                    <option value="g75">Latin Rap</option>
                                    <option value="g76">Lounge</option>
                                    <option value="g77">Milonga</option>
                                    <option value="g78">Motown</option>
                                    <option value="g79">MPB</option>
                                    <option value="g80">New Age</option>
                                    <option value="g81">New Wave</option>
                                    <option value="g82">Opera</option>
                                    <option value="g83">Pagode</option>
                                    <option value="g84">Pop</option>
                                    <option value="g85">Pop in Spanish</option>
                                    <option value="g86">Psychedelic</option>
                                    <option value="g87">Punk</option>
                                    <option value="g88">Ragtime</option>
                                    <option value="g89">Rancheira</option>
                                    <option value="g90">Rap</option>
                                    <option value="g91">Reggae</option>
                                    <option value="g92">Reggaeton</option>
                                    <option value="g93">Regional Mexicano</option>
                                    <option value="g94">Rhythm & Blues</option>
                                    <option value="g95">Rock</option>
                                    <option value="g96">Rap</option>
                                    <option value="g97">Rockabilly</option>
                                    <option value="g98">Russian Chanson</option>
                                    <option value="g99">Salsa</option>
                                    <option value="g100">Salsa Choke</option>
                                    <option value="g101">Samba</option>
                                    <option value="g102">Samba-canção</option>
                                    <option value="g103">Samba-reggae</option>
                                    <option value="g104">Sertaneja</option>
                                    <option value="g105">Singer-songwriter</option>
                                    <option value="g106">Ska</option>
                                    <option value="g107">Smooth jazz</option>
                                    <option value="g108">Soca</option>
                                    <option value="g109">Soul</option>
                                    <option value="g110">Soundtrack</option>
                                    <option value="g111">Spoken Word</option>
                                    <option value="g112">Surf</option>
                                    <option value="g113">Techno</option>
                                    <option value="g114">Teen Pop</option>
                                    <option value="g115">Thai Pop</option>
                                    <option value="g116">Trance</option>
                                    <option value="g117">Trap</option>
                                    <option value="g118">Trip Rock</option>
                                    <option value="g119">Turkish</option>
                                    <option value="g120">Underground</option>
                                    <option value="g121">Urban Cowboy</option>
                                    <option value="g122">Vallenato</option>
                                    <option value="g123">Valsa</option>
                                    <option value="g124">Vanera</option>
                                    <option value="g125">Vocal</option>
                                    <option value="g126">World</option>
                                    <option value="g127">Worldbeat</option>
                                    <option value="g128">Xote</option>
                                    <option value="g129">Zydeco</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="subgenero_secundario">Sub-género secundario</label>
                                <br>
                                <select class="subgenero_secundario col-md-12" name="subgenero_secundario" id="subgenero_secundario"
                                    value="{{ old('genero') }}">
                                    <option value="sg1">Acid</option>
                                    <option value="sg2">Acid house</option>
                                    <option value="sg3">Acid Jazz</option>
                                    <option value="sg4">Acid Punk</option>
                                    <option value="sg5">Acid rap</option>
                                    <option value="sg6">Acid rock</option>
                                    <option value="sg7">Acid techno</option>
                                    <option value="sg8">Afoxé</option>
                                    <option value="sg9">Afro</option>
                                    <option value="sg10">Afro-Cuban Jazz</option>
                                    <option value="sg11">Afro-Juju</option>
                                    <option value="sg12">Afro-Punk</option>
                                    <option value="sg13">Afrobeat</option>
                                    <option value="sg14">Aggrotech</option>
                                    <option value="sg15">Air</option>
                                    <option value="sg16">Alternative</option>
                                    <option value="sg17">Alternative & Rock in Spanish</option>
                                    <option value="sg18">Ambient</option>
                                    <option value="sg19">Americana</option>
                                    <option value="sg20">Anadolu rock</option>
                                    <option value="sg21">Anarcho-punk</option>
                                    <option value="sg22">Andean New Age</option>
                                    <option value="sg23">Anime</option>
                                    <option value="sg24">Anti-folk</option>
                                    <option value="sg25">Arabesk</option>
                                    <option value="sg26">Art</option>
                                    <option value="sg27">Asian</option>
                                    <option value="sg28">Audio Book</option>
                                    <option value="sg29">Avant-garde</option>
                                    <option value="sg30">Axé</option>
                                    <option value="sg31">Bachata</option>
                                    <option value="sg32">Baião</option>
                                    <option value="sg33">Baile Exótico</option>
                                    <option value="sg34">Baile Funk</option>
                                    <option value="sg35">Banda</option>
                                    <option value="sg36">Bass</option>
                                    <option value="sg37">Bastard Pop</option>
                                    <option value="sg38">Batá</option>
                                    <option value="sg39">Batucada</option>
                                    <option value="sg40">Batuco</option>
                                    <option value="sg41">Beat</option>
                                    <option value="sg42">Beatboxing</option>
                                    <option value="sg43">Bebop</option>
                                    <option value="sg44">Big band music</option>
                                    <option value="sg45">Big Beat</option>
                                    <option value="sg46">Bloco afro</option>
                                    <option value="sg47">Bluegrass</option>
                                    <option value="sg48">Blues</option>
                                    <option value="sg49">Bohemian Dub</option>
                                    <option value="sg50">Boi</option>
                                    <option value="sg51">Bolero</option>
                                    <option value="sg52">Bombay pop</option>
                                    <option value="sg53">Bossa nova</option>
                                    <option value="sg54">Boy band</option>
                                    <option value="sg55">Brass</option>
                                    <option value="sg56">Brazilian</option>
                                    <option value="sg57">Breakbeat</option>
                                    <option value="sg58">Brega</option>
                                    <option value="sg59">Bregafunk</option>
                                    <option value="sg60">Britpop</option>
                                    <option value="sg61">Broken beat</option>
                                    <option value="sg62">Bubblegum pop</option>
                                    <option value="sg63">Bugio</option>
                                    <option value="sg64">Bulerias</option>
                                    <option value="sg65">C-Pop</option>
                                    <option value="sg66">Cabaret</option>
                                    <option value="sg67">Cadence</option>
                                    <option value="sg68">Cajun</option>
                                    <option value="sg69">Calypso</option>
                                    <option value="sg70">Cancão</option>
                                    <option value="sg71">Canto livre</option>
                                    <option value="sg72">Canto nuevo</option>
                                    <option value="sg73">Canto popular</option>
                                    <option value="sg74">Cantopop/HK-Pop</option>
                                    <option value="sg75">Caopeira music</option>
                                    <option value="sg76">Carimbó</option>
                                    <option value="sg77">Catalogue</option>
                                    <option value="sg78">Celtic</option>
                                    <option value="sg79">Celtic Folk</option>
                                    <option value="sg80">Celtic Pop</option>
                                    <option value="sg81">Celtic Rock</option>
                                    <option value="sg82">Chamamé</option>
                                    <option value="sg83">Chamarra</option>
                                    <option value="sg84">Chamber music</option>
                                    <option value="sg85">Champeta</option>
                                    <option value="sg86">Chemical breaks</option>
                                    <option value="sg87">Children's Music</option>
                                    <option value="sg88">Chill-Out</option>
                                    <option value="sg89">Chinese</option>
                                    <option value="sg90">Chorinho</option>
                                    <option value="sg91">Choro</option>
                                    <option value="sg92">Christian</option>
                                    <option value="sg93">Chumba</option>
                                    <option value="sg94">Classical</option>
                                    <option value="sg95">Classical Crossover</option>
                                    <option value="sg96">Club</option>
                                    <option value="sg97">Coldwave</option>
                                    <option value="sg98">Comedy</option>
                                    <option value="sg99">Cool Jazz</option>
                                    <option value="sg100">Country</option>
                                    <option value="sg101">Creole</option>
                                    <option value="sg102">Crunk</option>
                                    <option value="sg103">Cumbia</option>
                                    <option value="sg104">Chorinho</option>
                                    <option value="sg105">Currulao</option>
                                    <option value="sg106">Dance</option>
                                    <option value="sg107">Dancehall</option>
                                    <option value="sg108">Dark</option>
                                    <option value="sg109">Death Industrial</option>
                                    <option value="sg110">Death Metal</option>
                                    <option value="sg111">Deathcore</option>
                                    <option value="sg112">Deathgrind</option>
                                    <option value="sg113">Deboche</option>
                                    <option value="sg114">Deep house</option>
                                    <option value="sg115">Deep soul</option>
                                    <option value="sg116">Delta blues</option>
                                    <option value="sg117">Dembow</option>
                                    <option value="sg118">Dini</option>
                                    <option value="sg119">Disco</option>
                                    <option value="sg120">Dixieland</option>
                                    <option value="sg121">Dopé</option>
                                    <option value="sg122">Downtempo</option>
                                    <option value="sg123">Dream pop</option>
                                    <option value="sg124">Drill and bass</option>
                                    <option value="sg125">Drone</option>
                                    <option value="sg126">Drum and bass</option>
                                    <option value="sg127">Dub</option>
                                    <option value="sg128">Dubstep</option>
                                    <option value="sg129">Easy Listening</option>
                                    <option value="sg130">Electro</option>
                                    <option value="sg131">Electro Backbeat</option>
                                    <option value="sg132">Electro hop</option>
                                    <option value="sg133">Electronic</option>
                                    <option value="sg134">Electronica</option>
                                    <option value="sg135">Electropop</option>
                                    <option value="sg136">Emo</option>
                                    <option value="sg137">Electronic</option>
                                    <option value="sg138">Electronica</option>
                                    <option value="sg139">Electropop</option>
                                    <option value="sg140">Emo</option>
                                    <option value="sg141">Enka</option>
                                    <option value="sg142">Europop</option>
                                    <option value="sg143">Experimental</option>
                                    <option value="sg144">F-Step</option>
                                    <option value="sg145">Fado</option>
                                    <option value="sg146">Fantezi</option>
                                    <option value="sg147">Filk</option>
                                    <option value="sg148">Flamenco</option>
                                    <option value="sg149">Folk</option>
                                    <option value="sg150">Folktronica</option>
                                    <option value="sg151">Forró</option>
                                    <option value="sg152">Free improvisation</option>
                                    <option value="sg153">Free Jazz</option>
                                    <option value="sg154">Freestyle</option>
                                    <option value="sg155">French pop</option>
                                    <option value="sg156">Frevo</option>
                                    <option value="sg157">Fricote</option>
                                    <option value="sg158">Funk</option>
                                    <option value="sg159">Gangsta rap</option>
                                    <option value="sg160">Garage</option>
                                    <option value="sg161">German Folk</option>
                                    <option value="sg162">German Pop</option>
                                    <option value="sg163">Go go</option>
                                    <option value="sg164">Gospel</option>
                                    <option value="sg165">Gothic</option>
                                    <option value="sg166">Grime</option>
                                    <option value="sg167">Grindcore</option>
                                    <option value="sg168">Groove metal</option>
                                    <option value="sg169">Grunge</option>
                                    <option value="sg170">Grupera</option>
                                    <option value="sg171">Guaracha</option>
                                    <option value="sg172">Guitarra baiana</option>
                                    <option value="sg173">Gypsy</option>
                                    <option value="sg174">Halk</option>
                                    <option value="sg175">Hard bop</option>
                                    <option value="sg176">Hardcore</option>
                                    <option value="sg177">Heavy metal</option>
                                    <option value="sg178">Hip Hop</option>
                                    <option value="sg179">Hip Hop/Rap</option>
                                    <option value="sg180">Holiday Music</option>
                                    <option value="sg181">House</option>
                                    <option value="sg182">Hyphy</option>
                                    <option value="sg183">Indian Classical</option>
                                    <option value="sg184">Indie</option>
                                    <option value="sg185">Indie Pop</option>
                                    <option value="sg186">Indo Pop</option>
                                    <option value="sg187">Industrial</option>
                                    <option value="sg188">Infantil</option>
                                    <option value="sg189">Instrumental</option>
                                    <option value="sg190">Jam</option>
                                    <option value="sg191">Jazz</option>
                                    <option value="sg192">Juju</option>
                                    <option value="sg193">Jungle</option>
                                    <option value="sg194">K-Pop</option>
                                    <option value="sg195">Karaoke</option>
                                    <option value="sg196">Kayokyoku</option>
                                    <option value="sg197">Kizomba</option>
                                    <option value="sg198">Latin</option>
                                    <option value="sg199">Latin Jazz</option>
                                    <option value="sg200">Latin Rap</option>
                                    <option value="sg201">Lo-Pop</option>
                                    <option value="sg202">Lounge</option>
                                    <option value="sg203">Mambo</option>
                                    <option value="sg204">Mangue Beat</option>
                                    <option value="sg205">Maracatu</option>
                                    <option value="sg206">Mariachi</option>
                                    <option value="sg207">Marimba</option>
                                    <option value="sg208">Maxixe</option>
                                    <option value="sg209">Mento</option>
                                    <option value="sg210">Merengue</option>
                                    <option value="sg211">Metal</option>
                                    <option value="sg212">Mexican</option>
                                    <option value="sg213">Miami bass</option>
                                    <option value="sg214">Microhouse</option>
                                    <option value="sg215">Milonga</option>
                                    <option value="sg216">Minimalist</option>
                                    <option value="sg217">Modinha</option>
                                    <option value="sg218">Motown</option>
                                    <option value="sg219">MPB</option>
                                    <option value="sg220">Neo Soul</option>
                                    <option value="sg221">Neofolk</option>
                                    <option value="sg222">New Age</option>
                                    <option value="sg223">New Wave</option>
                                    <option value="sg224">Noise pop</option>
                                    <option value="sg225">Norteño</option>
                                    <option value="sg226">Nova Canção</option>
                                    <option value="sg227">Oi!</option>
                                    <option value="sg228">Old school</option>
                                    <option value="sg229">Old time</option>
                                    <option value="sg230">Oldies</option>
                                    <option value="sg231">Opera</option>
                                    <option value="sg232">Orchesta</option>
                                    <option value="sg233">Outlaw</option>
                                    <option value="sg234">Özgün</option>
                                    <option value="sg235">Pagode</option>
                                    <option value="sg236">Pixiefunk</option>
                                    <option value="sg237">Plena</option>
                                    <option value="sg238">Pop</option>
                                    <option value="sg239">Pop in Spanish</option>
                                    <option value="sg240">Popular Colombiana</option>
                                    <option value="sg241">Porngroove</option>
                                    <option value="sg242">Post-hardcore</option>
                                    <option value="sg243">Progressive</option>
                                    <option value="sg244">Psychedelic</option>
                                    <option value="sg245">Psychobilly</option>
                                    <option value="sg246">Punk</option>
                                    <option value="sg247">Quadrille</option>
                                    <option value="sg248">Ragas</option>
                                    <option value="sg249">Raggamuffin</option>
                                    <option value="sg250">Ragtime</option>
                                    <option value="sg251">Rancheira</option>
                                    <option value="sg252">Rap</option>
                                    <option value="sg253">Rave</option>
                                    <option value="sg254">Reggae</option>
                                    <option value="sg255">Reggaeton</option>
                                    <option value="sg256">Regional Mexicano</option>
                                    <option value="sg257">Retro</option>
                                    <option value="sg258">Rhytm & Blues</option>
                                    <option value="sg259">Rock</option>
                                    <option value="sg260">Rock opera</option>
                                    <option value="sg261">Rockabilly</option>
                                    <option value="sg262">Roots</option>
                                    <option value="sg263">Ruissian Chanson</option>
                                    <option value="sg264">Salsa</option>
                                    <option value="sg265">Salsa Choke</option>
                                    <option value="sg266">Samba</option>
                                    <option value="sg267">Samba-canção</option>
                                    <option value="sg268">Samba-reggae</option>
                                    <option value="sg269">Sanat</option>
                                    <option value="sg270">Sertaneja</option>
                                    <option value="sg271">Singer-songwriter</option>
                                    <option value="sg272">Ska</option>
                                    <option value="sg273">Skate</option>
                                    <option value="sg274">Sludge metal</option>
                                    <option value="sg275">Smooth jazz</option>
                                    <option value="sg276">Soca</option>
                                    <option value="sg277">Soldier</option>
                                    <option value="sg278">Son montuno</option>
                                    <option value="sg279">Sonata</option>
                                    <option value="sg280">Soul</option>
                                    <option value="sg281">Soundtrack</option>
                                    <option value="sg282">Southern</option>
                                    <option value="sg283">Space</option>
                                    <option value="sg284">Speed metal</option>
                                    <option value="sg285">Spiritual</option>
                                    <option value="sg286">Spirituals</option>
                                    <option value="sg287">Spoken Word</option>
                                    <option value="sg288">Story</option>
                                    <option value="sg289">Surf</option>
                                    <option value="sg290">Swing music</option>
                                    <option value="sg291">Swingbeat</option>
                                    <option value="sg292">Symphony</option>
                                    <option value="sg293">Tango</option>
                                    <option value="sg294">Techno</option>
                                    <option value="sg295">Teen pop</option>
                                    <option value="sg296">Thai pop</option>
                                    <option value="sg297">Thrash metal</option>
                                    <option value="sg298">Tradicional colombiana</option>
                                    <option value="sg299">Trance</option>
                                    <option value="sg300">Trap</option>
                                    <option value="sg301">Tribal house</option>
                                    <option value="sg302">Trip rock</option>
                                    <option value="sg303">Trip-hop</option>
                                    <option value="sg304">Tropical</option>
                                    <option value="sg305">Tropical Salsa</option>
                                    <option value="sg306">Tropicalia</option>
                                    <option value="sg307">Turkish</option>
                                    <option value="sg308">Turkish Alternative</option>
                                    <option value="sg309">Turkish Hip-Hop/Rap</option>
                                    <option value="sg310">Turkish Pop</option>
                                    <option value="sg311">Turkish Rock</option>
                                    <option value="sg312">Unnasigned</option>
                                    <option value="sg313">Undergound</option>
                                    <option value="sg314">Unplugged</option>
                                    <option value="sg315">Urban</option>
                                    <option value="sg316">Urban Cowboy</option>
                                    <option value="sg317">Urban Folk</option>
                                    <option value="sg318">Urban Jazz</option>
                                    <option value="sg319">Vallenato</option>
                                    <option value="sg320">Valsa</option>
                                    <option value="sg321">Vanera</option>
                                    <option value="sg322">Video game</option>
                                    <option value="sg323">Vocal</option>
                                    <option value="sg324">Waltz</option>
                                    <option value="sg325">West Coas hip hop</option>
                                    <option value="sg326">World</option>
                                    <option value="sg327">Worldbeat</option>
                                    <option value="sg328">Xote</option>
                                    <option value="sg329">Yo-pop</option>
                                    <option value="sg330">Zouk</option>
                                    <option value="sg331">Zulu</option>
                                    <option value="sg332">Zydeco</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="genero">Letra chocante o vulgar</label>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="letra_chocante_vulgar" id="letra_chocante_vulgar" value="si">
                                    <label class="form-check-label" for="letra_chocante_vulgar">
                                        Sí
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="letra_chocante_vulgar" id="letra_chocante_vulgar" value="no">
                                    <label class="form-check-label" for="no">
                                        No
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="letra_chocante_vulgar" id="letra_chocante_vulgar" value="cleaned_version">
                                    <label class="form-check-label" for="no">
                                        Cleaned Version
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="subgenero">Inicio de la previsualización</label>
                                <br>
                                <input type="text" class="form-control" id="inicio_previsualizacion" name="inicio_previsualizacion" placeholder="..."
                                    value="{{ old('inicio_previsualizacion') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="idioma_titulo">Idioma del título</label>
                                <br>
                                <select class="idioma_titulo col-md-12" name="idioma_titulo" id="idioma_titulo"
                                    value="{{ old('idioma_titulo') }}">
                                    <option value="it1">Español</option>
                                    <option value="it2">Inglés</option>
                                    <option value="it3">Portugués</option>
                                    <option value="it4">Italiano</option>
                                    <option value="it5">Francés</option>
                                    <option value="it6">Chino</option>
                                    <option value="it7">Japonés</option>
                                    <option value="it8">Coreano</option>
                                    <option value="it9">Alemán</option>
                                    <option value="it10">Árabe</option>
                                    <option value="it11">Hindi</option>
                                    <option value="it12">Ruso</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="idioma_letra">Idioma de la letra</label>
                                <br>
                                <select class="idioma_letra col-md-12" name="idioma_letra" id="idioma_letra"
                                    value="{{ old('idioma_letra') }}">
                                    <option value="il1">Español</option>
                                    <option value="il2">Inglés</option>
                                    <option value="il3">Portugués</option>
                                    <option value="il4">Italiano</option>
                                    <option value="il5">Francés</option>
                                    <option value="il6">Chino</option>
                                    <option value="il7">Japonés</option>
                                    <option value="il8">Coreano</option>
                                    <option value="il9">Alemán</option>
                                    <option value="il10">Árabe</option>
                                    <option value="il11">Hindi</option>
                                    <option value="il12">Ruso</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group-text">
                            <input type="checkbox" id="acepta_riesgo" name="acepta_riesgo" data-toggle="modal" data-target="#modalContrato" value="1"/>
                            <label for="Contrato" data-toggle="modal" data-target="#modalContrato"><a class="font-weight-bold">Soy consciente de que una vez añadida la canción al Repertorio no podré hacer modificaciones a la misma.</a></label>
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
    <div class="modal fade" id="modalContrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    ¿Estás seguro de que quieres añadir ésta canción al Repertorio?, recuerda que una vez hecho no puedes hacer cambios.
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
