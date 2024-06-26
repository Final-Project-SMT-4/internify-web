@forelse ($data as $item)
<!-- Modal -->
  <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Dosen {{ $item->name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{-- Pake Form Pas Detail Data Modal --}}
            <form>
                <fieldset disabled>
                    <div class="mb-3">
                      <label for="disabledTextInput" class="form-label">Nama Dosen</label>
                      <input type="text" id="disabledTextInput" class="form-control" value="{{ $item->name ?? '-' }}">

                      <label for="disabledTextInput" class="form-label">NIDN</label>
                      <input type="text" id="disabledTextInput" class="form-control" value="{{ $item->no_identitas ?? '-' }}">

                      <label for="disabledTextInput" class="form-label">Email</label>
                      <input type="text" id="disabledTextInput" class="form-control" value="{{ $item->email ?? '-' }}">

                      <label for="disabledTextInput" class="form-label">No. Telp</label>
                      <input type="text" id="disabledTextInput" class="form-control" value="{{ $item->no_telp ?? '-' }}">
                    </div>
                  </fieldset>
            </form>

            {{-- Kalo Pake Table Pas Detail Data Modal --}}

            {{-- <table class="table table-bordered">
                <thead class="table-light d-flex gap-2 flex-column">
                    <tr class="d-flex gap-2">
                        <td scope="col" class="flex-grow-2 col-3 d-flex justify-content-between">
                            <p>Nama</p>
                            <p>:</p>
                        </td>
                        <td scope="col" class="flex-grow-1">
                            value
                        </td>
                    </tr>
                    <tr class="d-flex gap-2">
                        <td scope="col" class="flex-grow-2 col-3 d-flex justify-content-between">
                            <p>NIDN</p>
                            <p>:</p>
                        </td>
                        <td scope="col" class="flex-grow-1">
                            value
                        </td>
                    </tr>
                    <tr class="d-flex gap-2">
                        <td scope="col" class="flex-grow-2 col-3 d-flex justify-content-between">
                            <p>Email</p>
                            <p>:</p>
                        </td>
                        <td scope="col" class="flex-grow-1">
                            value
                        </td>
                    </tr>
                    <tr class="d-flex gap-2">
                        <td scope="col" class="flex-grow-2 col-3 d-flex justify-content-between">
                            <p>No. Telp</p>
                            <p>:</p>
                        </td>
                        <td scope="col" class="flex-grow-1">
                            value
                        </td>
                    </tr>
                    <tr class="d-flex gap-2">
                        <td scope="col" class="flex-grow-2 col-3 d-flex justify-content-between">
                            <p>Program Studi</p>
                            <p>:</p>
                        </td>
                        <td scope="col" class="flex-grow-1">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem maiores inventore cupiditate reiciendis dolorum. Officiis rerum debitis voluptas deserunt repudiandae!
                        </td>
                    </tr>
                </thead>
            </table> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><p>Close</p></button>
        </div>
      </div>
    </div>
  </div>
@empty
    
@endforelse