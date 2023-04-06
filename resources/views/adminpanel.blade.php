<x-layout>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
    <div class="container d-flex justify-content-center">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Nickname</th>
                <th scope="col">Email</th>
                <th scope="col">Email verificata</th>
                <th scope="col">Ruolo</th>
                <th scope="col">Utente dal:</th>
                <th></th>

              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->surname}}</td>
                    <td>{{$user->nickname}}</td>
                    <td>{{$user->email}}</td>
                    <td class="d-flex justify-content-center">
                        @if ($user->email_verified_at)
                        <i class="bi bi-check-circle text-success "></i>
                        @else
                        <i class="bi bi-x-circle text-danger "></i>
                        @endif
                        
                    </td>
                    <td>{{$user->role->type}}</td>
                    <td>{{\Carbon\Carbon::parse($user->created_at)->format('d/m/y')}}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-sm btn-warning me-1"><a href="{{ route('user.edit', $user) }}" class="text-secondary"><i class="bi bi-pencil-square text-dark"></i></a></button>
                            <form action="{{ route('user.update', $user) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="role_id" value="{{$user->role_id -1}}">
                                <button class="btn btn-sm btn-primary"><i class="bi bi-arrow-up"></i></button>
                            </form>
                            <form action="{{ route('user.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i></button>
                            </form>
                            <button class="btn btn-sm btn-success ms-1"><a href="{{ route('user.show', $user) }}" class="text-light"><i class="bi bi-person-vcard"></i></a></button>
                        </div>
                    </td>
                  </tr> 
                @endforeach
           
            </tbody>
          </table>
    </div>
    

    <div class="container d-flex justify-content-center">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo</th>
                <th scope="col">Contenuto</th>
                
                <th scope="col">Stato</th>
                <th scope="col">Utente</th>
                <th scope="col">Data creazione<th>          
                <th scope="col">Data aggiornamento</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($ticket as $ticket)
                <tr>
                    <td>{{$ticket->id}}</td>
                    <td>{{$ticket->type}}</td>
                    <td>{{$ticket->body}}</td>
                    <td>{{$ticket->state}}</td>
                    <td>{{$ticket->user_id}}</td>
                    <td colspan="2">{{\Carbon\Carbon::parse($ticket->created_at)->format('d/m/y')}}</td> 
                    <td >{{\Carbon\Carbon::parse($ticket->updated_at)->format('d/m/y')}}</td> 
                    <td>
                        <div class="d-flex justify-content-end">
                            <form action="{{ route('ticket.update', $ticket) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="action" value="rejected">
                                <button class="btn btn-sm btn-danger"><i class="bi bi-x-circle"></i></button>
                            </form>
                            <form action="{{ route('ticket.update', $ticket) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="action" value="accepted">
                                <button class="btn btn-sm btn-success ms-1"><i class="bi bi-check2-circle"></i></button>
                            </form>
                        </div>
                    </td>
                </tr> 
                @endforeach
            </tbody>
          </table>
    </div>
     



    <div class="container d-flex justify-content-center">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Contenuto</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Utente</th>
                <th scope="col">Data creazione<th>          
                <th scope="col">Data aggiornamento</th>
                <th scope="col">Stato</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->user_id}}</td>
                    <td colspan="2">{{\Carbon\Carbon::parse($product->created_at)->format('d/m/y')}}</td> 
                    <td >{{\Carbon\Carbon::parse($product->updated_at)->format('d/m/y')}}</td> 
                    <td>{{$product->state}}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <form action="{{ route('product.update', $product) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="action" value="rejected">
                                <button class="btn btn-sm btn-danger"><i class="bi bi-x-circle"></i></button>
                            </form>
                            <form action="{{ route('product.update', $product) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="action" value="accepted">
                                <button class="btn btn-sm btn-success ms-1"><i class="bi bi-check2-circle"></i></button>
                            </form>
                        </div>
                    </td>
                    
                </tr> 
                @endforeach
            </tbody>
          </table>
    </div>

</x-layout>