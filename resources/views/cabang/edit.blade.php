<form action="/cabang/update" method="POST" id="formCabangEdit">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
                    <path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
                    <path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
                    <path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
                    <path d="M5 11h1v2h-1z"></path>
                    <path d="M10 11l0 2"></path>
                    <path d="M14 11h1v2h-1z"></path>
                    <path d="M19 11l0 2"></path>
                 </svg>
                </span>
                <input type="text" value="{{ $cabang->kode_cabang }}" id="kode_cabang" readonly class="form-control" name="kode_cabang" placeholder="Kode Cabang">
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-estate" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 21h18"></path>
                    <path d="M19 21v-4"></path>
                    <path d="M19 17a2 2 0 0 0 2 -2v-2a2 2 0 1 0 -4 0v2a2 2 0 0 0 2 2z"></path>
                    <path d="M14 21v-14a3 3 0 0 0 -3 -3h-4a3 3 0 0 0 -3 3v14"></path>
                    <path d="M9 17v4"></path>
                    <path d="M8 13h2"></path>
                    <path d="M8 9h2"></path>
                 </svg>
                </span>
                <input type="text" value="{{ $cabang->nama_cabang }}" id="nama_cabang" class="form-control" name="nama_cabang" placeholder="Nama Cabang">
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                    <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
                 </svg>
                </span>
                <input type="text" value="{{ $cabang->lokasi_cabang }}" id="lokasi_cabang" class="form-control" name="lokasi_cabang" placeholder="Lokasi Cabang">
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-radar-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                    <path d="M15.51 15.56a5 5 0 1 0 -3.51 1.44"></path>
                    <path d="M18.832 17.86a9 9 0 1 0 -6.832 3.14"></path>
                    <path d="M12 12v9"></path>
                 </svg>
                </span>
                <input type="text" value="{{ $cabang->radius_cabang }}" id="radius_cabang" class="form-control" name="radius_cabang" placeholder="Radius Cabang">
              </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="form-group">
                <button class="btn btn-primary w-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 14l11 -11"></path>
                        <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path>
                     </svg>
                    Simpan
                </button>
            </div>
        </div>
    </div>
  </form>


  <script>
    $(function(){
        $("#formCabangEdit").submit(function(){
                var kode_cabang = $("#formCabangEdit").find('#kode_cabang').val();
                var nama_cabang = $("#formCabangEdit").find("#nama_cabang").val();
                var lokasi_cabang = $("#formCabangEdit").find("#lokasi_cabang").val();
                var radius_cabang = $("#formCabangEdit").find("#radius_cabang").val();

                if(kode_cabang==""){
                    Swal.fire({
                    title: 'Warning !',
                    text: 'Kode Cabang Harus Diisi !!!',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                    }).then((result)=> {
                        $("#kode_cabang").focus();
                    });
                    return false;
                } else if(nama_cabang==""){
                    Swal.fire({
                    title: 'Warning !',
                    text: 'Nama Cabang Harus Diisi !!!',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                    }).then((result)=> {
                        $("#nama_cabang").focus();
                    });
                    return false;
                } else if(lokasi_cabang==""){
                    Swal.fire({
                    title: 'Warning !',
                    text: 'Lokasi Cabang Harus Diisi !!!',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                    }).then((result)=> {
                        $("#lokasi_cabang").focus();
                    });
                    return false;
                } else if(radius_cabang==""){
                    Swal.fire({
                    title: 'Warning !',
                    text: 'Radius Cabang Harus Diisi !!!',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                    }).then((result)=> {
                        $("#radius_cabang").focus();
                    });
                    return false;
                }
            });
    })
  </script>