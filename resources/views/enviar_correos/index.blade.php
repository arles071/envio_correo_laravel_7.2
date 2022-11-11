@extends('layouts.template')
@section('title', 'Formularios')
@section('content')

<div class="row mt-2">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Enviar un correo de prueba</h5>
              <form action="{{ route('enviar-correo-form') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Mensaje *</label>
                    <textarea name="message" id="message" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="documento" class="form-label">Va a enviar un documento adjunto ?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="document_send" id="document_send1" value="si">
                        <label class="form-check-label" for="document_send1">
                          Si
                        </label>
                      </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="document_send" id="document_send2" value="no" checked>
                        <label class="form-check-label" for="document_send2">
                          No
                        </label>
                      </div>
                </div>

                <div class="mb-3" id="elemento_document">
                    <label for="documento" class="form-label">Documento (Opcional)</label>
                    <input type="file" name="documento" id="documento" class="form-control" />
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Enviar">
                </div>

              </form>
             
            </div>
          </div>
    </div>
</div>
@endsection

@section('scriptsown')

<script>
    const radios = document.querySelectorAll('input[type=radio][name=document_send]');
    radios.forEach(radio => {
        radio.addEventListener('change', () => {
            const value = radio.value;
            const elemento_document = document.getElementById('elemento_document');
            if(value === "si"){
                elemento_document.classList.remove("d-none");
            } else {
                elemento_document.classList.add("d-none");
            }
        })
        
    });
    //console.log(document.querySelector('input[name=gender]:checked').value)
</script>
@endsection