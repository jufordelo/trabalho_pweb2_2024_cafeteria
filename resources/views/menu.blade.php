<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">BREAKIE COFFEE☕</a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('encomenda/create')}}"> Encomendas </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('reserva/create')}}"> Reservas</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="{{url('personalizado/create')}}"> Personalizados</a>
             <li class="nav-item">
            <a class="nav-link" href="{{url('sugestao/create')}}">FeedBacks</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Área ADM | Colaboradores
            </a>
            <ul class="dropdown-menu">
              <li> <a class="nav-link"  style="color: black;" href="{{url('estoque/create')}}">  Estoque de Produtos </a>
        
            </ul>
          </li>

        </ul>
  <h6 style="color: white;"> Entre em contato conosco:</h6>
        <h9 style="color: white;"> 📩 contato.cafeteriabreakiecoffee@gmail.com </h9> <br>
         <h9 style="color: white;"> ☎️ (49)3324-6578</h9>
      </div>
    </div>
  </nav>