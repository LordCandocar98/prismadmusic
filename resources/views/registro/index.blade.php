@extends('registro.master')

@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-id-card-o" aria-hidden="true"></i>
        ¡Completa tu registro!
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
                <form action="/registro" method="post" id="formRegistro" name="formRegistro">
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
                                <label for="tipoDoc">Nombre</label>
                                <br>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ejemplo: Pepito"
                                    value="{{ old('nombre') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="tipoDoc">Apellido</label>
                                <br>
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ejemplo: Pérez"
                                    value="{{ old('apellido') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="tipoDoc">País</label>
                                <br>
                                <select class="pais form-control" name="pais" id="pais">
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="tipoDoc">Departamento</label>
                                <br>
                                <select class="departamento form-control" name="departamento"></select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="tipoDoc">Ciudad</label>
                                <br>{{--
                                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Bogotá"
                                    value="{{ old('ciudad') }}"> --}}
                                    <select class="ciudad form-control" name="ciudad"></select>
                            </div>
                            <div class="col-sm-6">
                                <label for="tipoDoc">Tipo de documento de identificación</label>
                                <br>
                                <select class="tipoDNI col-md-12" name="tipo_documento" id="tipo_documento"
                                    value="{{ old('tipo_documento') }}">
                                    <option value="cc">CC</option>
                                    <option value="ti">TI</option>
                                    <option value="tp">TP</option>
                                    <option value="ce">CE</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="numIdent">Número de identificación</label>
                                <br>
                                <input type="text" class="form-control" id="numero_identificacion"
                                    name="numero_identificacion" placeholder="Ejemplo: 1121962355"
                                    value="{{ old('numero_identificacion') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="numCelular">Número de Celular</label>
                                <br>
                                <input type="text" class="form-control" id="telefono" name="telefono"
                                    placeholder="Ejemplo: 3123254607" value="{{ old('telefono') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="nombreArtistico">Nombre Artístico</label>
                                <br>
                                <input type="text" class="form-control" id="nombre_artistico" name="nombre_artistico"
                                    placeholder="Ejemplo: Maluma" value="{{ old('nombre_artistico') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="linkSpoty">Link de Spotify</label>
                                <br>
                                <input type="text" class="form-control" id="link_spoty" name="link_spoty"
                                    placeholder="Ejemplo: open.spotify.com/artist/XXX" value="{{ old('link_spoty') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="tipoCuenta">Tipo de cuenta bancaria</label>
                                <br>
                                <select class="tipoDeCuentaBanco form-select col-md-12" name="tipo_cuenta_bancaria"
                                    id="tipo_cuenta_bancaria" value="{{ old('tipo_cuenta_bancaria') }}">
                                    <option value="ahorros">Ahorros</option>
                                    <option value="corriente">Corriente</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="numeroCuenta">Número de cuenta bancaria</label>
                                <br>
                                <input type="text" class="form-control" id="numero_cuenta_bancaria"
                                    name="numero_cuenta_bancaria" placeholder="Ejemplo: 05700002715"
                                    value="{{ old('numero_cuenta_bancaria') }}">
                            </div>
                            <!-- Checkboxes of Privacidad y TérminosyCond, Contratos -->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="input-group-text">
                                        <input type="checkbox" id="acepta_TermsPrivCond" name="acepta_TermsPrivCond" value="1"/>
                                        <label for="PrivTerm">Tengo 18 años o más y <a class="font-weight-bold" data-toggle="modal" data-target="#modalTerminosyCondiciones">Acepto los términos y condiciones</a> junto con la <a class="font-weight-bold" data-toggle="modal" data-target="#modalPolitica">Política de Privacidad de Prismad Music</a></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group-text">
                                        <input type="checkbox" id="acepta_Contrato" name="acepta_Contrato" value="1"/>
                                        <label for="Contrato">Soy consciente y acepto el <a class="font-weight-bold" data-toggle="modal" data-target="#modalContrato">Acuerdo exclusivo de administración de derechos fonográficos</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Privacidad-->
    <div class="modal fade" id="modalPolitica" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Política de privacidad</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <!-- MENSAJE LARGO -->
            <div class="modal-body parrafo">
                <p class="fs-6">Lea atentamente la siguiente política de privacidad (la "Política de privacidad") antes de utilizar el sitio web www.prismadmusic.com  y cualquier sitio afiliado (individual y colectivamente, el "Sitio") para conocer cómo Prismad Music Sas. ("Prismad Music", "nosotros", "nuestro" o "nosotros") recopila y utiliza su información personal.</p>

                <p class="h6"><strong>Al acceder al Sitio y/o a los servicios ofrecidos por Prismad Music a través del Sitio (los "Servicios"), usted acepta y acepta los términos y prácticas referidos en esta Política de Privacidad, con sus modificaciones periódicas, y por la presente nos otorga su consentimiento previo e informado para el uso y tratamiento de su información como se describe en este documento. Si no está de acuerdo con esta Política de privacidad en su totalidad, no acceda ni utilice el Sitio o los Servicios. Si tiene alguna pregunta sobre la Política de privacidad, comuníquese con prismadmusic@gmail.com.</strong> Cuando lo exija la ley, Prismad Music Sas será considerado el controlador de datos o la persona responsable y encargada del tratamiento o uso de la Información.</p><br>

                <a class="font-weight-bold">1. Información recopilada<br></a>

                Recopilamos su información personal y no personal (la "Información") de dos maneras: (i) Información que usted proporciona; y (ii) Información que se recopila automáticamente. Su provisión de información personal es completamente voluntaria. No recopilamos información personal a menos que nos envíe esa información.<br>

                <br>Las categorías de información personal que podemos recopilar incluyen:
                <p class="identado">- Datos de Identidad, que incluye nombre u otras identificaciones similares.</p>
                <p class="identado">- Datos de contacto, que incluyen dirección, dirección de correo electrónico y números de teléfono.<br></p>

                Además, podemos recopilar otros tipos de información que, junto con la identidad y los datos de contacto, pueden considerarse y denominarse específicamente "datos personales" en ciertas jurisdicciones, incluida la Unión Europea ("UE"), como:
                <p class="identado">- Datos financieros, que incluyen tarjeta de crédito, tarjeta de débito, cuenta bancaria u otros detalles de pago.</p>
                <p class="identado">- Datos de transacciones , que incluyen detalles sobre pagos hacia y desde usted.</p>
                <p class="identado">- Datos técnicos, que incluyen la dirección del protocolo de Internet (IP), los datos de ubicación, sus datos de inicio de sesión y la información del navegador y del dispositivo;</p>
                <p class="identado">- Datos de perfil , que incluyen su nombre de usuario y contraseña, su álbum e información de publicación, estados contables y otros informes, y preferencias.</p>
                <p class="identado">- Datos de uso , que incluye información sobre cómo usa el Sitio y cualquier sitio de terceros vinculado desde el Sitio.</p>
                <p class="identado">- Datos de marketing y comunicaciones , que incluyen sus preferencias para recibir marketing nuestro.<br></p>

                <strong>SI SE ENCUENTRA EN LA UE, CONSULTE LA SECCIÓN "DIVULGACIONES ADICIONALES DE LA UE" QUE SE REFIERE A NUESTRA RECOPILACIÓN, USO Y DIVULGACIÓN DE SUS DATOS PERSONALES Y LOS DERECHOS ADICIONALES QUE TIENE BAJO LA LEY APLICABLE.</strong><br>

                <br><a class="font-weight-bold">1.1. Información que proporciona<br></a>

                Para registrarse en una cuenta en el Sitio y usar algunos de los Servicios, es posible que deba proporcionarnos cierta Información, como su nombre completo, edad, dirección de correo electrónico, dirección postal, número de teléfono, tarjeta de crédito u otro método de pago. información, información de facturación, URL, títulos de canciones y álbumes, nombres de artistas, créditos y otra información similar y metadatos relacionados con canciones y grabaciones de sonido, análisis e información biográfica. Proporcionarnos dicha Información es una decisión que usted toma de manera libre, voluntaria e independiente. Puede proporcionar su Información introduciéndola según las instrucciones del Sitio, o iniciando sesión en su cuenta en línea ("Cuenta SMSP") con un proveedor de servicios de redes sociales ("SMSP"), incluida, entre otras, su cuenta de Facebook. Usted acepta que al iniciar sesión en estas Cuentas SMSP nos autoriza a acceder a ellas y a la Información y los contenidos publicados en ellas, como fotografías, imágenes de perfil y nombre y ubicación de los contactos. Además, usted declara que dicha autorización (i) no viola los términos y condiciones o la política de privacidad que rigen los servicios que le proporciona el SMSP; y (ii) no nos obliga a pagar ninguna tarifa por dicho acceso.<br>

                <br><a class="font-weight-bold">1.2     Información recopilada automáticamente<br></a>

                Podemos recibir, recopilar y registrar automáticamente información como (i) acciones y búsquedas que realiza mientras interactúa con el Sitio o utiliza los Servicios; (ii) direcciones de Protocolo de Internet; (iii) sistemas operativos; (iv) el tiempo, frecuencia y duración de las acciones, visitas y usos del Sitio y los Servicios; y (v) análisis de los mismos. Algunas de las formas en que nosotros o el Sitio podemos recopilar información se describen a continuación:<br>
                -           Cookies y otras tecnologías : el Sitio puede usar cookies, un tipo de tecnología que instala un pequeño archivo de datos en la computadora de un usuario del sitio web u otro dispositivo para permitir que un sitio web, por ejemplo, reconozca futuras visitas desde esa computadora o dispositivo. Las cookies permiten que el Sitio lo reconozca y adapte el Sitio y los Servicios a sus preferencias rastreadas. Puede limitar o eliminar las cookies habilitadas por nosotros modificando la configuración de su navegador, y puede configurar su navegador para que le informe cuando las cookies están habilitadas.  
                <br>-           Publicidad basada en Internet : podemos contratar a proveedores externos para que utilicen su información en relación con su propia información para enviarle publicidad dirigida cuando visite el Sitio u otros sitios web. Las cookies, descritas anteriormente, se pueden utilizar en este proceso.
                <br>-           Datos de flujo de clics: A medida que utiliza Internet, queda un rastro de información electrónica en cada sitio web que visita. Esta información, a veces denominada "datos de flujo de clics", puede ser recopilada y almacenada por el servidor de un sitio web. Por ejemplo, los datos de seguimiento de clics pueden indicar el tipo de computadora y el software de navegación que utiliza y la dirección del sitio web desde el que se vinculó al Sitio. El Sitio puede recopilar y utilizar datos de flujo de clics como una forma de información agregada para determinar de forma anónima cuánto tiempo pasan los usuarios en cada página del Sitio, cómo navegan los usuarios por el Sitio y cómo podemos adaptar el Sitio para satisfacer mejor las necesidades de los usuarios. La información a menudo se utilizará para mejorar el Sitio y los Servicios. La recopilación o el uso de datos de seguimiento de clics será anónimo y agregado y no contendrá intencionalmente ninguna información personal.
                <br>-           Datos de ubicación : el Sitio puede ubicar información, incluida la proporcionada por un dispositivo móvil u otro dispositivo que interactúa con el Sitio (incluso a través de tecnologías de baliza) o asociada con su dirección IP, donde la ley nos permite procesar esta información.<br>

                <br><a class="font-weight-bold">2. Uso de la Información<br></a>

                <br>Sujeto a la sección titulada "Divulgaciones adicionales de la UE", utilizamos la información que tenemos sobre usted para realizar los Servicios y para otros fines que se describen a continuación. Específicamente, usamos su información para una variedad de propósitos (el "uso" o "tratamiento"), que incluyen: <br>
                <br>-           Para identificarlo cuando utiliza el Sitio y los Servicios;
                <br>-           Para proporcionar, operar, mejorar y optimizar el funcionamiento del Sitio y los Servicios;
                <br>-           Para personalizar el Sitio y los Servicios;
                <br>-           Para cumplir con el contrato que estamos a punto de celebrar o hemos celebrado con usted;
                <br>-           Para comunicarnos con usted, enviarle correos electrónicos, mensajes técnicos, mensajes de campañas de marketing, alertas de seguridad, actualizaciones. términos y condiciones y actualizaciones de políticas y avisos;
                <br>-           Para proporcionar soporte técnico; y
                <br>-           Para cumplir con una obligación legal o reglamentaria.<br>

                <br>Sujeto a la sección titulada "Divulgaciones adicionales de la UE", también podemos usar su Información compartiendo o divulgando toda o parte de ella con ciertos terceros:
                -           Si es necesario para proporcionar, operar, mejorar u optimizar el funcionamiento del Sitio o los Servicios;
                -           Si es requerido por la ley y los reglamentos aplicables o solicitado por una autoridad como un tribunal, el gobierno o los funcionarios encargados de hacer cumplir la ley;
                -           Para investigar sospechas de fraude u otras violaciones de cualquier ley, norma, reglamento o las políticas del Sitio.
                -           Según sea necesario para nuestras empresas afiliadas, cesionarios, funcionarios, empleados, contratistas, socios, accionistas o licenciatarios; o
                -           En relación con una fusión, adquisición o reestructuración societaria de Prismad Music.

                <br><a class="font-weight-bold">3. Enlaces de terceros y servicios de redes sociales<br></a>

                El Sitio puede incluir enlaces a sitios web, complementos y aplicaciones de terceros. Hacer clic en esos enlaces o habilitar esas conexiones puede permitir que terceros recopilen o compartan datos sobre usted. No controlamos estos sitios web de terceros y no somos responsables de sus declaraciones de privacidad. Cuando abandone nuestro “Sitio”, lo alentamos a que lea la política de privacidad de cada sitio web que visite.

                El Sitio puede integrarse con varios servicios de redes sociales. Usted comprende que no controlamos dichos servicios y no somos responsables de la forma en que operan. Si bien es posible que le brindemos la posibilidad de utilizar dichos servicios en relación con el Sitio, lo hacemos simplemente como una adaptación y, al igual que usted, dependemos de esos servicios de terceros para operar de manera adecuada y justa.

                Debe tener en cuenta que la información que incluye y transmite voluntariamente en línea en un blog, red social o de otro modo en línea de acceso público puede ser vista y utilizada por otros. No podemos controlar dichos usos de su información y, al usar dichos servicios, usted asume el riesgo de que terceros puedan ver y utilizar la información proporcionada por usted.

                <br><a class="font-weight-bold">4. Actualización y corrección de la Información<br></a>

                Usted acepta solicitar de inmediato que actualicemos o corrijamos la Información tan pronto como note que la Información proporcionada por usted o recopilada automáticamente es inexacta o necesita ser actualizada, rectificada o eliminada. Usted es responsable de cualquier Información inexacta o no actualizada. Puede solicitarnos en cualquier momento que eliminemos de nuestros registros y eliminemos del Sitio, toda o parte de la Información, siempre que podamos conservar copias de la Información según lo exija la ley, para nuestros fines internos de mantenimiento de registros, contabilidad e informes. , y según sea necesario para proporcionar el Sitio o los Servicios. Para realizar dicha corrección, envíe un correo electrónico a prismadmusic@gmail.com. Todos los avisos enviados a este correo electrónico se considerarán recibidos 24 horas después de que se envió el correo electrónico, si no se genera un "error del sistema" u otro aviso de no entrega. Si la ley aplicable requiere que una determinada comunicación sea "por escrito", usted acepta que la comunicación por correo electrónico satisfará este requisito.



                <br><a class="font-weight-bold">5. Acceso a la Información<br></a>

                Puede tener acceso a su información recopilada por nosotros mediante una solicitud por escrito a prismadmusic@gmail.com.  Puede acceder a sus datos personales (o ejercer cualquiera de los otros derechos) de forma gratuita. Sin embargo, podemos cobrar una tarifa razonable si su solicitud es claramente infundada, repetitiva o excesiva. Alternativamente, podemos negarnos a cumplir con su solicitud en estas circunstancias.

                <br><a class="font-weight-bold">6. Seguridad de los datos<br></a>

                Hemos implementado medidas de seguridad adecuadas para evitar que su información se pierda, use o acceda accidentalmente de forma no autorizada, se altere o se divulgue; sin embargo, debido a la naturaleza abierta inherente de Internet, no podemos asegurar ni garantizar la seguridad de la información proporcionada en línea. Hemos implementado procedimientos para hacer frente a cualquier sospecha de violación de datos que lo afecte y le notificaremos a usted y a cualquier regulador aplicable sobre una violación en la que estamos legalmente obligados a hacerlo.

                <br><a class="font-weight-bold">7. Retención de datos<br></a>

                Solo conservaremos su información durante el tiempo que sea necesario para cumplir con los fines para los que la recopilamos, incluso para cumplir con los requisitos legales, contables o de informes. Para determinar el período de retención apropiado para su Información, consideramos la cantidad, la naturaleza y la confidencialidad de la Información, el propósito para el cual procesamos su Información y si podemos lograr esos propósitos a través de otros medios, y los requisitos legales aplicables. En algunas circunstancias, puede solicitarnos que eliminemos sus datos (consulte Solicitud de eliminación a continuación para obtener más información). En algunas circunstancias, podemos anonimizar información sobre usted (para que ya no pueda asociarse con usted) con fines de investigación o estadísticos, en cuyo caso podemos usar y conservar esta información indefinidamente sin previo aviso.

                <br><a class="font-weight-bold">8. Opción de darse de baja<br></a>

                Puede optar por no recibir o darse de baja de nuestros correos electrónicos con actualizaciones, boletines, campañas de marketing y otras comunicaciones, puede optar por darse de baja siguiendo las instrucciones contenidas en dichos correos electrónicos o enviando una solicitud a prismadmusic@gmail.com. No puede darse de baja de los correos electrónicos relacionados con su cuenta con nosotros, transacciones en el Sitio o en relación con los Servicios, cambios en esta Política de privacidad, contratos entre nosotros y usted, o correspondencia similar.

                Puede revocar la autorización otorgada en este documento de forma prospectiva enviando un correo electrónico a prismadmusic@gmail.com y cesando todo uso y acceso al Sitio y/o Servicios; sin embargo, podemos continuar usando la Información recibida antes de dicha revocación o según sea necesario para nuestros fines comerciales legítimos, para cumplir con cualquier contrato entre nosotros y usted, o para cualquier otro propósito legal. Si reanuda o continúa accediendo al Sitio y/o los Servicios, se restablecerá su autorización y dicho acceso o uso se considerará su consentimiento.

                <br><a class="font-weight-bold">9. Información para niños<br></a>

                El Sitio y los Servicios no están destinados a niños menores de 13 años. Si nos damos cuenta de que un menor ha proporcionado su información, tendremos derecho a eliminar o eliminar dicha información y hacer todo lo posible para limitar el acceso. del menor al Sitio y los Servicios. Si los padres del menor se enteran de que su hijo está accediendo al Sitio, utilizando los Servicios y/o brindándonos su Información, deberán contactarnos de inmediato a prismadmusic@gmail.com.

                <br><a class="font-weight-bold">10. Divulgaciones adicionales de la UE<br></a>

                    <br><a class="font-weight-bold">10.1. Nuestro papel como controlador y procesador de datos<br></a>

                Verge Records International, Inc. actúa como controlador de datos de su Información enviada a través del Sitio. Si se encuentra en la UE y tiene alguna queja sobre nuestras prácticas de privacidad como controlador de datos, tiene derecho a presentar una queja en cualquier momento ante la autoridad de control local. Sin embargo, lo alentamos a que se comunique con nosotros primero a prismadmusic@gmail.comy haremos todo lo posible para resolver su inquietud.

                <br><a class="font-weight-bold">10.2. Suministro de datos personales y falta de suministro de datos personales<br></a>

                Cuando necesitemos recopilar datos personales por ley o según los términos de un contrato que tengamos con usted y no proporcione esos datos cuando se le solicite, es posible que no podamos cumplir con el contrato que tenemos o estamos tratando de celebrar con usted ( por ejemplo, para proporcionarle los Servicios). En este caso, no podremos prestarle los Servicios.

                <br><a class="font-weight-bold">10.3. Base legal para nuestro procesamiento de sus datos personales<br></a>

                A continuación se detallan los tipos de bases legales en las que nos basaremos para procesar sus datos personales:
                -           Interés legítimo significa el interés de nuestro negocio en llevar a cabo y administrar nuestro negocio para permitirnos brindarle el mejor servicio y la mejor y más segura experiencia. Nos aseguramos de considerar y sopesar cualquier impacto potencial sobre usted (tanto positivo como negativo) y sus derechos antes de procesar sus datos personales para nuestros intereses legítimos. No utilizamos sus datos personales para actividades en las que nuestros intereses se ven anulados por el impacto sobre usted (a menos que tengamos su consentimiento o la ley lo exija o lo permita). Puede obtener más información sobre cómo evaluamos nuestros intereses legítimos frente a cualquier impacto potencial sobre usted con respecto a actividades específicas poniéndose en contacto con nosotros en prismadmusic@gmail.com.
                -           Ejecución del contrato significa procesar sus datos según sea necesario para cumplir con nuestras obligaciones en virtud de cualquier contrato con usted, incluidas todas las acciones necesarias para prestar completamente los Servicios en virtud de cualquier contrato.
                -           Con consentimiento implícito o expreso significa procesar sus datos en base a su consentimiento, ya sea expreso o implícito por sus acciones, como para enviarle cierta información, incluidas comunicaciones de marketing, para compartir su información con socios cuando nos lo haya solicitado, o como se acuerde lo contrario.
                -           Cumplir con una obligación legal o reglamentaria significa procesar sus datos personales cuando sea necesario para el cumplimiento de una obligación legal o reglamentaria a la que estamos sujetos.

                <br><a class="font-weight-bold">10.4 .  Cambio de propósito<br></a>

                Solo utilizaremos sus datos personales para los fines para los que los recopilamos, a menos que consideremos razonablemente la necesidad de utilizarlos por otro motivo y ese motivo sea compatible con el propósito original. Si desea obtener una explicación sobre cómo el procesamiento para el nuevo propósito es compatible con el propósito original, contáctenos en prismadmusic@gmail.com. Si necesitamos usar sus datos personales para un propósito no relacionado, se lo notificaremos y le explicaremos la base legal que nos permite hacerlo. Tenga en cuenta que podemos procesar sus datos personales sin su conocimiento o consentimiento, de conformidad con las reglas anteriores, cuando así lo exija la ley.

                <br><a class="font-weight-bold">10.5. Recopilación de datos personales de fuentes de terceros<br></a>

                También recopilamos datos sobre usted de varios terceros y fuentes públicas:
                -            Si se registra en el Sitio o se vincula de otro modo a su Facebook, Twitter u otros sitios de redes sociales, importaremos sus datos de esos sitios de redes sociales.
                -           Sus estados contables e informes generados en relación con los Servicios que brindamos se basan en datos que recibimos de varias plataformas de terceros.
                -           Como se mencionó anteriormente, también obtenemos datos a través de tecnologías automatizadas (consulte la sección titulada "Información recopilada").

                <br><a class="font-weight-bold"><br><a class="font-weight-bold">10.6. Retirar su consentimiento<br></a>

                Si confiamos en su consentimiento para procesar sus datos personales, tiene derecho a retirar su consentimiento en cualquier momento poniéndose en contacto con nosotros en prismadmusic@gmail.com.

                <br><a class="font-weight-bold"><br><a class="font-weight-bold">10.7. Uso de sus datos personales con fines de marketing<br></a>

                Nos esforzamos por brindarle opciones con respecto a los usos de los datos personales, particularmente en relación con el marketing y la publicidad:
                -           Correos electrónicos de marketing de nuestra parte: podemos usar su información para formar una opinión sobre lo que creemos que puede desear o necesitar, o lo que puede ser de su interés. Recibirá nuestras comunicaciones de marketing si se ha registrado en el Sitio o ha utilizado los Servicios y, en cada caso, ha optado por recibir ese marketing.
                -           Marketing de terceros:  obtendremos su consentimiento antes de compartir sus datos personales con cualquier empresa fuera de Prismad Music con fines de marketing.

                Para ver cómo puede optar por no recibir comunicaciones de marketing, consulte la sección 6 titulada "Opción para cancelar la suscripción".

                <br><a class="font-weight-bold">10.8. Derechos de los sujetos de datos de la UE<br></a>

                En determinadas circunstancias, tiene derechos en virtud de las leyes de protección de datos en relación con sus datos personales. Tiene derecho a:
                -           Solicitar el acceso a sus datos personales (comúnmente conocido como “solicitud de acceso de titular de datos”). Esto le permite recibir una copia de los datos personales que tenemos sobre usted y verificar que los estamos procesando legalmente.
                -           Solicitar la corrección de los datos personales que tenemos sobre usted. Esto le permite corregir cualquier dato incompleto o inexacto que tengamos sobre usted, aunque es posible que necesitemos verificar la precisión de los nuevos datos que nos proporciona.
                -           Solicitar la supresión de sus datos personales . Esto le permite solicitarnos que eliminemos o eliminemos datos personales cuando no haya una buena razón para que continuemos procesándolos. También tiene derecho a solicitarnos que eliminemos o eliminemos sus datos personales cuando haya ejercido con éxito su derecho a oponerse al procesamiento (ver a continuación), cuando hayamos procesado sus datos ilegalmente o cuando se nos solicite que eliminemos sus datos personales. para cumplir con la ley local. Tenga en cuenta, sin embargo, que es posible que no siempre podamos cumplir con su solicitud de eliminación por razones legales específicas que se le notificarán, si corresponde, en el momento de su solicitud.
                -           Objetar el procesamiento de sus datos personales cuando nos basamos en un interés legítimo (o en los de un tercero) y hay algo en su situación particular que le hace querer objetar el procesamiento por este motivo, ya que cree que afecta su fundamental derechos y libertades. También tiene derecho a oponerse cuando procesamos sus datos personales con fines de marketing directo. En algunos casos, podemos demostrar que tenemos motivos legítimos convincentes para procesar sus datos que anulan sus derechos y libertades.
                -           Solicitar la restricción del tratamiento de sus datos personales . Esto le permite solicitarnos que suspendamos el procesamiento de sus datos personales en los siguientes escenarios: (i) si desea que establezcamos la exactitud de los datos; (ii) cuando nuestro uso de los datos sea ilegal pero no desee que los eliminemos; (iii) cuando necesite que conservemos los datos, incluso si ya no los necesitamos, ya que necesita establecer, ejercer o defender reclamaciones legales; o (iv) se ha opuesto a que usemos sus datos, pero necesitamos verificar si tenemos motivos legítimos imperiosos para usarlos.
                -           Solicitar la transferencia de sus datos personales a usted o a un tercero . Le proporcionaremos a usted, o a un tercero que haya elegido, sus datos personales en un formato estructurado, de uso común y legible por máquina. Tenga en cuenta que este derecho solo se aplica a los datos automatizados que inicialmente nos dio su consentimiento para usar o cuando usamos los datos para realizar un contrato con usted.
                -           Retirar el consentimiento en cualquier momento en el que dependamos del consentimiento para procesar sus datos personales . Sin embargo, esto no afectará la legalidad de cualquier procesamiento realizado antes de que retire su consentimiento. Si retira su consentimiento, es posible que no podamos proporcionarle ciertos productos o servicios. Le informaremos si este es el caso en el momento en que retire su consentimiento.

                Puede acceder a sus datos personales (o ejercer cualquiera de los otros derechos) de forma gratuita. Sin embargo, podemos cobrar una tarifa razonable si su solicitud es claramente infundada, repetitiva o excesiva. Alternativamente, podemos negarnos a cumplir con su solicitud en estas circunstancias.

                Es posible que necesitemos solicitarle información específica para ayudarnos a confirmar su identidad y garantizar su derecho a acceder a sus datos personales (o ejercer cualquiera de sus otros derechos). Esta es una medida de seguridad para garantizar que los datos personales no se revelen a ninguna persona que no tenga derecho a recibirlos. También podemos comunicarnos con usted para solicitarle más información en relación con su solicitud para acelerar nuestra respuesta.

                Intentamos responder a todas las solicitudes legítimas en el plazo de un mes. Ocasionalmente, podemos demorarnos más de un mes si su solicitud es particularmente compleja o si ha realizado varias solicitudes. En este caso, le notificaremos y lo mantendremos informado.

                Para ejercer sus derechos, póngase en contacto con prismadmusic@gmail.com.

                <br><a class="font-weight-bold">11. Transferencias transfronterizas<br></a>

                El Sitio se mantiene en los Estados Unidos. Si está visitando desde una región con leyes que rigen la recopilación y el uso de datos que difieren de las de los Estados Unidos, tenga en cuenta que puede estar transfiriendo su información a los Estados Unidos y otros países del mundo. Usted nos da libre y específicamente su consentimiento para exportar y usar su Información dentro de los Estados Unidos y en otros países como se especifica en esta Política de privacidad. Usted comprende que los datos almacenados en los Estados Unidos pueden estar sujetos a solicitudes legales por parte de los tribunales o las autoridades encargadas de hacer cumplir la ley en los Estados Unidos. Si se encuentra en la UE, siempre que transfiramos sus datos personales a procesadores fuera de la UE, nos aseguramos de que se utilicen las medidas de seguridad apropiadas y adecuadas en dicha transferencia.

                <br><a class="font-weight-bold">12. Política de California<br></a>

                Si es residente de California, esta sección se aplica a usted. Según la ley de California, los residentes de California tienen derecho a solicitar por escrito a las empresas con las que tienen una relación comercial establecida: (i) una lista de las categorías de información de identificación personal, como nombre, dirección de correo electrónico y dirección postal y el tipo de los servicios proporcionados al cliente que una empresa ha revelado a un tercero (incluidas las filiales que son entidades legales separadas) durante el año calendario inmediatamente anterior para fines de marketing directo de los terceros y (ii) los nombres y direcciones de todos esos terceros . Para solicitar la información anterior, contáctenos en prismadmusic@gmail.com. Si no desea que su información de identificación personal se comparta con ningún tercero que pueda usar dicha información con fines de marketing directo, puede optar por no recibir dichas divulgaciones enviando un correo electrónico a prismadmusic@gmail.com .

                <br><a class="font-weight-bold">13. Actualizaciones a esta Política de Privacidad<br></a>

                Nos reservamos el derecho, a nuestra discreción, de cambiar, modificar, agregar o eliminar partes de esta Política de privacidad en cualquier momento. Sin embargo, si en algún momento en el futuro planeamos usar su información que difiere materialmente de esta Política de privacidad, publicaremos dichos cambios aquí o le enviaremos un correo electrónico. Le recomendamos que revise periódicamente el Sitio para obtener la información más reciente sobre nuestras prácticas de privacidad. Está sujeto a cualquier cambio en la Política de privacidad cuando utiliza el Sitio y/o los Servicios después de que dichos cambios se hayan publicado por primera vez.

                <br><a class="font-weight-bold">14. Contáctenos<br></a>

                Prismad Music Sas
                Cll 76#12-86 of 204
                Bogota- Colombia
                prismadmusic@gmail.com
                
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
        </div>
    </div>
    <!-- Modal Términos y Condiciones-->
    <div class="modal fade" id="modalTerminosyCondiciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Términos y Condiciones Web Prismad</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <!-- MENSAJE LARGO -->
            <div class="modal-body parrafo">
                    TERMINOS Y CONDICIONES
                    Lea atentamente las siguientes condiciones de uso ("Acuerdo") antes de utilizar este sitio web. Al acceder a este sitio web y/o a los servicios ofrecidos por Prismad Music a través del sitio web, usted acepta estar sujeto a todos los términos y condiciones de este Acuerdo, con sus modificaciones ocasionales. Si no está de acuerdo con estos términos y condiciones, no use este sitio.
                    Bienvenido al sitio web de Prismad Music, ubicado en Prismad Music (el "Sitio"). El siguiente Acuerdo contiene los términos y condiciones que rigen su uso del Sitio y los servicios ofrecidos por Prismad Music a través del Sitio (colectivamente, los "Servicios").
                    1. Modificación de este Acuerdo
                    Prismad Music SAS, junto con sus licenciatarios, afiliados y cesionarios (colectivamente, "Prismad Music") se reserva el derecho de revisar este Acuerdo a su exclusivo criterio en cualquier momento y sin previo aviso, excepto mediante la publicación del Acuerdo revisado. en el sitio. Cualquier revisión de este Acuerdo entra en vigencia al momento de su publicación. Es su responsabilidad visitar esta página periódicamente para asegurarse de que continúa aceptando este Acuerdo. Su uso continuado del Sitio y/o los Servicios después de que se haya publicado una versión revisada de este Acuerdo en el Sitio constituye su aceptación vinculante de dicha revisión y el Acuerdo revisado.
                    2. Uso del Sitio y los Servicios
                    Elegibilidad _ Prismad Music solo proporcionará a sabiendas el Sitio y los Servicios a las partes que puedan celebrar y formalizar contratos de conformidad con la ley aplicable. Si tiene menos de 18 años, pero tiene al menos 13 años, puede usar el Sitio y/o los Servicios solo bajo la supervisión de un padre o tutor legal que acepta estar sujeto a este Acuerdo. El Sitio y los Servicios no están destinados a niños menores de 13 años.
                    Cumplimiento de Acuerdo y Legislación Aplicable. Debe cumplir con todos los términos y condiciones de este Acuerdo, los acuerdos y políticas aplicables a los que se hace referencia a continuación, y todas las leyes, reglamentos y normas aplicables cuando utilice el Sitio y los Servicios.
                    Licencia para usar el sitio y los servicios. Prismad Music le otorga una licencia limitada y revocable para acceder y utilizar el Sitio y los Servicios para los fines previstos, sujeto a su cumplimiento de este Acuerdo. Esta licencia no incluye el derecho de recopilar o usar información contenida en el Sitio para fines prohibidos por Prismad Music, para crear trabajos derivados basados ​​en el Sitio y su contenido o cualquier contenido de terceros disponible a través del Sitio, o para descargar o copiar el Sitio. (aparte del almacenamiento en caché de la página). Si usa el Sitio de una manera que exceda el alcance de esta licencia o infrinja este Acuerdo, Prismad Music puede revocar la licencia que se le otorgó. Prismad Music y sus licenciantes poseen única y exclusivamente toda la propiedad intelectual y otros derechos, títulos e intereses en y para el Sitio y los Servicios, excepto según lo dispuesto expresamente en este Acuerdo. No adquirirá ningún derecho, título, o interés allí, salvo que se establezca expresamente lo contrario en este Acuerdo. Prismad Music puede modificar el Sitio y/o los Servicios en cualquier momento con o sin previo aviso y no incurrirá en responsabilidad por hacerlo.
                    Servicios de terceros. Prismad Music puede utilizar a terceros para proporcionar ciertos servicios accesibles a través del Sitio. Prismad Music no controla a esos terceros o sus servicios, y usted acepta que Prismad Music no será responsable ante usted de ninguna manera por el uso que haga de dichos servicios. Estos terceros pueden tener sus propios términos de uso y otras políticas. Debe cumplir con dichos términos y políticas, así como con este Acuerdo cuando utilice estos servicios. Si dichos términos o políticas entran en conflicto con este Acuerdo o cualquier otro acuerdo o política de Prismad Music, debe cumplir con este Acuerdo o el acuerdo o la política de Prismad Music, según corresponda.
                    Usos Prohibidos. Salvo que Prismad Music lo permita expresamente, usted no puede: (i) interferir con los Servicios y/o el Sitio mediante el uso de virus o cualquier otro programa o tecnología diseñada para interrumpir o dañar cualquier software o hardware; (ii) modificar, crear trabajos derivados, realizar ingeniería inversa, descompilar o desensamblar cualquier tecnología utilizada para proporcionar los Servicios y/o el Sitio; (iii) usar un robot, araña u otro dispositivo o proceso para monitorear la actividad o copiar páginas del Sitio, excepto en la operación o uso de un "motor de búsqueda" de Internet, contadores de visitas o tecnología similar; (iv) recopilar direcciones de correo electrónico u otra información de terceros mediante el uso de los Servicios y/o el Sitio; (v) hacerse pasar por otra persona o entidad; (vi) utilizar metaetiquetas, términos de búsqueda, términos clave o similares que contengan el nombre o las marcas comerciales de Prismad Music; (vii) participar en cualquier actividad que interfiera con la capacidad de otro usuario para usar o disfrutar los Servicios y/o el Sitio; o (viii) ayudar o alentar a un tercero a participar en cualquier actividad prohibida por este Acuerdo.
                    Política de privacidad. Al celebrar este Acuerdo, acepta la recopilación, el uso y la divulgación de su información personal por parte de Prismad Music de acuerdo con la Política de privacidad de Prismad Music .
                    3. Derechos de propiedad
                    El Sitio y el contenido, las marcas, los logotipos y otros materiales del Sitio ("Contenido del sitio") están protegidos por derechos de autor, marcas registradas y otras leyes de los Estados Unidos y otros países. Usted reconoce y acepta que el Sitio y el Contenido del Sitio, incluidos todos los derechos de propiedad intelectual asociados, son propiedad exclusiva de Prismad Music y sus licenciantes. No eliminará, alterará ni ocultará ningún derecho de autor, marca comercial, marca de servicio u otros avisos de derechos de propiedad incorporados o que acompañen al Sitio o al Contenido del Sitio.
                    Todas las marcas comerciales, marcas de servicio, logotipos, nombres comerciales y cualquier designación de propiedad de Prismad Music utilizada en este documento son marcas comerciales o marcas comerciales registradas de Prismad Music. Cualquier otra marca comercial, marca de servicio, logotipo, nombre comercial y otras designaciones de propiedad son marcas comerciales o marcas comerciales registradas de sus respectivas partes.
                    4. Declaraciones y Garantías
                    Usted garantiza y declara que: (i) tiene pleno poder y autoridad para celebrar y ejecutar este Acuerdo, que es un acuerdo válido, legal y vinculante entre las partes; (ii) su uso del Sitio y/o los Servicios no infringirá los derechos de autor, marcas registradas, patentes, secretos comerciales, derechos de privacidad, derechos de publicidad, derechos contractuales u otros derechos legales de terceros y cumplirá con todas las leyes aplicables , Reglas y regulaciones; (iii) no hay reclamos, demandas o cualquier forma de litigio pendiente o, según su leal saber y entender, amenazado con respecto a cualquiera de sus contenidos o materiales proporcionados a Prismad Music por usted en relación con el Sitio y/o los Servicios ; (iv) Prismad Music no estará obligado a realizar ningún pago a terceros en relación con su uso de los Servicios y/o el Sitio;
                    5. Indemnización
                    Usted acepta indemnizar y eximir a Prismad Music y a sus empleados, representantes, agentes, afiliados, directores, funcionarios, gerentes y accionistas (las "Partes") de cualquier daño, pérdida o gasto (incluidos, entre otros, los honorarios de abogados y costos) incurridos en relación con cualquier reclamo, demanda o acción de un tercero contra cualquiera de las Partes en relación con su incumplimiento o presunto incumplimiento de este Acuerdo. Si tiene que indemnizar a Prismad Music en virtud de esta sección, Prismad Music tendrá derecho a controlar la defensa, el arreglo y la resolución de cualquier reclamo a su cargo exclusivo. Usted no puede liquidar ni resolver de otro modo ningún reclamo con el permiso expreso por escrito de Prismad Music.
                    6. Descargo de responsabilidad y limitaciones
                    Renuncia de garantías. PRISMAD MUSIC PROPORCIONA EL SITIO Y LOS SERVICIOS "TAL CUAL" Y "SEGÚN DISPONIBILIDAD". PRISMAD MUSIC NO REPRESENTA NI GARANTIZA QUE EL SITIO, LOS SERVICIOS O SU USO: (I) SERÁN ININTERRUMPIDOS, (II) ESTARÁN LIBRES DE IMPRECISIONES O ERRORES, (III) CUMPLIRÁN CON SUS REQUERIMIENTOS O (IV) FUNCIONARÁN EN EL CONFIGURACIÓN O CON EL HARDWARE O SOFTWARE QUE UTILICE. PRISMAD MUSIC NO OFRECE GARANTÍAS DISTINTAS DE LAS EXPRESAMENTE EN ESTE ACUERDO Y POR EL PRESENTE RENUNCIA A CUALQUIER GARANTÍA IMPLÍCITA, INCLUYENDO, SIN LIMITACIÓN, GARANTÍAS DE IDONEIDAD PARA UN PROPÓSITO EN PARTICULAR, COMERCIABILIDAD Y NO VIOLACIÓN.
                    Exclusión de Daños. OPRISMAD MUSIC NO SERÁ RESPONSABLE ANTE USTED NI NINGÚN TERCERO POR CUALQUIER DAÑO CONSECUENTE, INCIDENTAL, INDIRECTO, PUNITIVO O ESPECIAL (INCLUIDOS LOS DAÑOS RELACIONADOS CON LA PÉRDIDA DE BENEFICIOS, LA PÉRDIDA DE DATOS O LA PÉRDIDA DE FONDO DE COMERCIO) QUE SURJAN DE, RELACIONADOS O CONECTADOS CON EL USO DEL SERVICIO PRISMAD MUSIC, BASADO EN CUALQUIER CAUSA DE ACCIÓN, AUNQUE SE HAYA ADVERTIDO DE LA POSIBILIDAD DE TALES DAÑOS.
                    Limitación de responsabilidad. EN NINGÚN CASO LA RESPONSABILIDAD DE PRISMAD MUSIC EXCEDERÁ LA MAYOR DE (I) LA CANTIDAD PAGADA O PAGABLE POR PRISMAD MUSIC A USTED DURANTE LOS SEIS MESES INMEDIATAMENTE ANTERIORES AL EVENTO QUE DA LUGAR A DICHA RESPONSABILIDAD O (II) $100.
                    7. Terminación
                    Prismad Music puede suspender o cancelar su uso del Sitio y/o los Servicios si considera, a su exclusivo y absoluto criterio, que ha incumplido este Acuerdo. Las Secciones 4, 5, 6, 8 y 9 de este Acuerdo sobrevivirán a la terminación.
                    8. Avisos
                    Todas las notificaciones requeridas o permitidas en virtud de este Acuerdo se harán por escrito y se entregarán a la otra parte por cualquiera de los siguientes métodos: (i) correo de EE. UU., (ii) servicio de mensajería al día siguiente o (iii) correo electrónico. Si envía un aviso a Prismad Music, debe usar las siguientes direcciones: Prismad Music, Cll 76#12-86 of 204 Bogota - Colombia o al correo prismad music@gmail.com. Si Prismad Music le envía un aviso, Prismad Music utilizará la información de contacto proporcionada por usted a Prismad Music. Todos los avisos se considerarán recibidos de la siguiente manera: (i) si se envían por correo de los EE. UU., siete (7) días hábiles después del envío, (ii) si se envían por mensajería al día siguiente, en la fecha en que dicho servicio de mensajería confirma la recepción, o (iii) ) si es por correo electrónico, 24 horas después del envío del mensaje, si no se genera "error de sistema" u otro aviso de no entrega. Si la ley aplicable requiere que una determinada comunicación sea "por escrito", usted acepta que la comunicación por correo electrónico satisfará este requisito.
                    9. Resolución de disputas
                    Usted reconoce y acepta que tanto usted como Prismad Music renuncian al derecho a un juicio por jurado o a participar como demandante o miembro de la clase en cualquier supuesta demanda colectiva o procedimiento representativo. Además, a menos que tanto usted como Prismad Music acuerden lo contrario por escrito, el árbitro no puede consolidar las reclamaciones de más de una persona y no puede presidir ninguna forma de clase o procedimiento representativo. Si este párrafo específico se considera inaplicable, entonces la totalidad de esta sección de "Resolución de disputas" se considerará nula. el árbitro no puede consolidar las reclamaciones de más de una persona y no puede presidir ninguna forma de procedimiento colectivo o representativo. Si este párrafo específico se considera inaplicable, entonces la totalidad de esta sección de "Resolución de disputas" se considerará nula. el árbitro no puede consolidar las reclamaciones de más de una persona y no puede presidir ninguna forma de procedimiento colectivo o representativo. Si este párrafo específico se considera inaplicable, entonces la totalidad de esta sección de "Resolución de disputas" se considerará nula.
                    El arbitraje se llevará a cabo en idioma inglés. Se designará un solo árbitro independiente e imparcial de conformidad con las Reglas, modificadas en el presente. Usted y Prismad Music acuerdan cumplir con las siguientes reglas, cuyo objetivo es agilizar el proceso de resolución de disputas y reducir costos y cargas para las partes: (i) el arbitraje se llevará a cabo por teléfono, en línea y/o se basará únicamente en presentaciones, la forma específica a ser elegida por la parte que inicia el arbitraje; (ii) el arbitraje no requerirá ninguna comparecencia personal de las partes o testigos a menos que las partes acuerden lo contrario por escrito; y (iii) cualquier sentencia sobre el laudo dictado por el árbitro puede presentarse en cualquier tribunal de jurisdicción competente.
                    10. Reclamaciones por infracción de derechos de autor
                    Prismad Music respeta la propiedad intelectual de otros y se toma muy en serio la protección de los derechos de autor y toda otra propiedad intelectual y pide a sus usuarios que hagan lo mismo. La actividad infractora no será tolerada en oa través del Sitio o los Servicios. Prismad Music eliminará o deshabilitará de inmediato los materiales del Sitio que Prismad Music crea de buena fe, luego de recibir un aviso de acuerdo con los requisitos a continuación, de que los materiales infringen los derechos de un tercero. Ya sea que Prismad Music deshabilite o no el acceso a los materiales o los elimine, Prismad Music puede intentar reenviar la notificación por escrito, incluida la información de contacto del denunciante, al usuario que publicó el contenido y/o tomar otras medidas razonables para notificar al usuario que Prismad Music ha recibido una notificación de una supuesta violación de los derechos de propiedad intelectual u otra violación.
                    Cualquier notificación o contranotificación que envíe debe ser veraz y presentarse bajo pena de perjurio. Una notificación falsa o una contranotificación pueden dar lugar a responsabilidad personal. Es posible que desee buscar el asesoramiento de un asesor legal antes de presentar una notificación o una contranotificación.
                    Procedimiento para Reportar Infracciones Reclamadas
                    Si cree de buena fe que se han infringido sus derechos de autor u otros derechos de propiedad intelectual, envíenos un aviso por escrito que contenga:
                    I. Su nombre, número de teléfono, dirección y dirección de correo electrónico;
                    ii. Una descripción del trabajo protegido por derechos de autor que afirma que se ha infringido;
                    iii. Una descripción del material en el Sitio que cree que infringe el trabajo protegido por derechos de autor y dónde se puede encontrar dicho material en el Sitio;
                    IV. Una declaración suya de que cree de buena fe que el uso en disputa no está autorizado por el propietario de los derechos de autor, su agente o la ley;
                    v. Una declaración suya, hecha bajo pena de perjurio , de que la información en su notificación es precisa y que usted es el propietario de los derechos de autor o está autorizado para actuar en nombre del propietario de los derechos de autor; y
                    vi. Tu firma electrónica o física.
                    Envíe su aviso a Prismad Music de la siguiente manera:
                    Correo electrónico:Prismadmusic@gmail.com
                    Por correo de Colombia.:
                    Prismad Music Sas
                    Atención: Reclamos por infracción de derechos de autor
                    cll 76#12-86  Of 204
                    Bogota - Colombia
                    Debe consultar con su propio abogado y/o ver 17 USC § 512 para confirmar sus obligaciones de proporcionar un aviso válido de infracción reclamada.
                    Contraaviso para restaurar el contenido eliminado
                    Si cree que se ha enviado indebidamente una notificación de infracción de derechos de autor u otra infracción en su contra, puede enviar una Contranotificación, de conformidad con las Secciones 512(g)(2) y (3) de la DMCA, proporcionando a Prismad Music una notificación por escrito. que contiene:
                    I. Su nombre, número de teléfono, dirección y dirección de correo electrónico;
                    ii. Identificación del material retirado del Sitio o cuyo acceso ha sido deshabilitado;
                    iii. Una declaración bajo pena de perjurio de que cree de buena fe que la eliminación o inhabilitación del material fue un error o que el material se identificó erróneamente;
                    IV. Una declaración de que acepta la jurisdicción del tribunal del Distrito Federal (i) en el distrito judicial donde se encuentra su dirección si la dirección se encuentra en los Estados Unidos, o (ii) si su dirección se encuentra fuera de los Estados Unidos, cualquier tribunal distrito en el que se puede encontrar Prismad Music y que aceptará el servicio de proceso del Demandante que presenta el aviso o su agente autorizado; y
                    v. Su firma física o electrónica.
                    Envíe su aviso a Prismad Music de la siguiente manera:
                    Correo electrónico: Prismadmusic@gmail.com
                    Por correo de Colombia.:
                    Prismad Music Sas
                    Atención: Reclamos por infracción de derechos de autor
                    cll 76#12-86  Of 204
                    Bogota - Colombia
                    Una parte que envíe una Contranotificación debe consultar con un abogado y/o consultar 17 USC § 512 para confirmar las obligaciones de la parte de proporcionar una contranotificación válida en virtud de la Ley de derechos de autor.
                    Notificaciones falsas de infracción reclamada o contranotificaciones
                    Prismad Music se reserva el derecho de reclamar daños y perjuicios a cualquier parte que envíe una notificación de infracción reclamada o una contranotificación en violación de la ley.
                    11. Varios
                    Este Acuerdo será vinculante para cada una de las partes y sus sucesores y cesionarios permitidos y se regirá e interpretará de acuerdo con las leyes del Estado de Nueva York sin referencia a los principios de conflicto de leyes. Solo si la cláusula de resolución de disputas se considera nula y sin efecto, todas las disputas que surjan entre usted y Prismad Music en virtud de este Acuerdo estarán sujetas a la jurisdicción exclusiva de los tribunales estatales y federales ubicados en el condado de Nueva York, Nueva York, y usted y Prismad Music por la presente se somete a la jurisdicción personal y competencia de estos tribunales. Usted no podrá asignar ni transferir este Acuerdo sin el consentimiento previo por escrito de Prismad Music. Prismad Music puede ceder o transferir libremente cualquier derecho otorgado por usted bajo este Acuerdo. Este Acuerdo (incluidas todas las políticas y otros acuerdos descritos en este Acuerdo, que se incorporan aquí por esta referencia) contiene el entendimiento completo de las partes con respecto a su objeto y reemplaza todos los acuerdos y entendimientos anteriores y contemporáneos entre las partes con respecto a su tema en cuestión. Ninguna falla o demora por parte de una de las partes en el ejercicio de cualquier derecho, poder o privilegio bajo este Acuerdo operará como una renuncia al mismo. Este Acuerdo no pretende ni crea ninguna agencia, sociedad, empresa conjunta o relación empleado-empleador. La invalidez o inaplicabilidad de cualquier disposición de este Acuerdo no afectará la validez o aplicabilidad de cualquier otra disposición de este Acuerdo, todas las cuales permanecerán en pleno vigor y efecto.
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
        </div>
    </div>
    <!-- Modal Contrato-->
    <div class="modal fade" id="modalContrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contrato Web Prismad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- MENSAJE LARGO -->
            <form action="">
                <div class="modal-body parrafo">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/jsRegistroPersonas/scriptRegistro.js') }}"></script>
@endsection
