@if(isset(auth()->user()->id))
    <?php $id = auth()->user()->id ?> 

    <div class="container-fluid m-2 container">
        <div class="offcanvas offcanvas-start d-flex flex-column flex-shrink-0 p-3 menucor" tabindex="-1" id="offcanvasExample" style="width: 280px;" aria-labelledby="offcanvasExampleLabel">
        
            <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-white text-decoration-none text-white">
                <span class="fs-4">Menu</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">

            <a href="/" class="nav-link link-dark text-white">
                <li class="d-flex"><img src="/icons/house-door.svg" class="icon-space">Home</li>
                <hr>
            </a>

            @if(auth()->user()->role == 'administrador' || auth()->user()->role == 'prestador')
                <a href="/dashboard?id={{$id}}" class="nav-link link-dark text-white">
                    <li class="d-flex"><img src="/icons/house-door.svg" class="icon-space">Dashboard</li>
                    <hr>
                </a>
            
                <a href="/dashboard/prestador/{{auth()->user()->id;}}?id={{auth()->user()->id;}}" class="nav-link link-dark text-white">
                    <li class="d-flex"><img src="/icons/person.svg" class="icon-space">Perfil Profissional</li>
                    <hr>
                </a>
            @endif
            <a href="/dashboard/perfil?id={{$id}}" class="nav-link link-dark text-white">
                <li class="d-flex"><img src="/icons/person.svg" class="icon-space">Conta</li>
                <hr>
            </a>

            <!-- <a href="#" class="nav-link link-dark text-white">
                <li class="d-flex"><img src="/icons/briefcase.svg" class="icon-space">Serviços</li>
                <hr>
            </a> -->

            <!-- <a href="#" class="nav-link link-dark text-white">
                <li class="d-flex"><img src="/icons/journal-bookmark.svg" class="icon-space">Agenda</li>
                <hr>
            </a> -->
            
            @if(auth()->user()->role != 'cliente' and auth()->user()->role != 'pessoal')
                <a href="/dashboard/avaliacao/{{$id}}?id={{$id}}" class="nav-link link-dark text-white">
                    <li class="d-flex"><img src="/icons/star-half.svg" class="icon-space">Avaliações</li>
                    <hr>
                </a>

                <a href="/dashboard/galeria/{{$id}}?id={{$id}}" class="nav-link link-dark text-white">
                    <li class="d-flex"><img src="/icons/images.svg" class="icon-space">Galeria</li>
                    <hr>
                </a>
            @endif

            <!-- @if(auth()->user()->role != 'cliente') -->
                <a href="/dashboard/pagamento/index?id={{$id}}" class="nav-link link-dark text-white">
                    <li class="d-flex"><img src="/icons/wrench-adjustable.svg" class="icon-space">Seja Pro!</li>
                    <hr>
                </a>
            <!-- @endif -->

            <!-- <a href="#" class="nav-link link-dark text-white">
                <li class="d-flex"><img src="/icons/gear-fill.svg" class="icon-space">Configurações</li>
                <hr>
            </a> -->

            </ul>
            <hr>
        </div>
    </div>
@endif