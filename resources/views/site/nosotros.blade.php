@extends('site.master')

@section('contenido')

      <!-- Breadcrumbs -->
      <section class="section section-bredcrumbs" style="background: url(https://images.unsplash.com/photo-1468164016595-6108e4c60c8b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80) no-repeat center / cover">
        <div class="container context-dark breadcrumb-wrapper text-left">
          <h1>Quienes Somos</h1>
          <ul class="breadcrumbs-custom">
            <li><a href="{{url('/')}}">Inicio</a></li>
            <li class="active">Quienes Somos</li>
          </ul>
        </div>
      </section>
      <!-- Join Our Team-->
      <section class="section section-lg custom-image-section">
        <div class="container relative-container">
          <div class="row row-30 row-md-60 justify-content-between">
            <div class="col-md-12">
              <h2>Acerca de nosotros</h2>
            </div>
            <div class="col-md-6">
              <div class="heading-6">Prismad Music es una compañía dedicada a la creación y administración de obras musicales,  asesoraría y gerencia de proyectos artísticos, somos expertos en creación de estrategias de  posicionamiento y marketing digital de artistas y obras musicales
            </div>
            </div>
            <div class="col-md-6 col-lg-5">
              <div class="progress-linear-wrap">
                <!-- Linear progress bar-->
                <article class="progress-linear">
                  <div class="progress-header">
                    <p>Música</p><span class="progress-value">75</span>
                  </div>
                  <div class="progress-bar-linear-wrap">
                    <div class="progress-bar-linear"></div>
                  </div>
                </article>
                <!-- Linear progress bar-->
                <article class="progress-linear">
                  <div class="progress-header">
                    <p>Nuevos</p><span class="progress-value">50</span>
                  </div>
                  <div class="progress-bar-linear-wrap">
                    <div class="progress-bar-linear"></div>
                  </div>
                </article>
                <!-- Linear progress bar-->
                <article class="progress-linear">
                  <div class="progress-header">
                    <p>Entretenmiento</p><span class="progress-value">75</span>
                  </div>
                  <div class="progress-bar-linear-wrap">
                    <div class="progress-bar-linear"></div>
                  </div>
                </article>
                <!-- Linear progress bar-->
                <article class="progress-linear">
                  <div class="progress-header">
                    <p>Playlist</p><span class="progress-value">75</span>
                  </div>
                  <div class="progress-bar-linear-wrap">
                    <div class="progress-bar-linear"></div>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection