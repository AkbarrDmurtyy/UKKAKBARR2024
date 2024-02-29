<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-blue">
        <div class="container">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/products">Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      {{-- ppp --}}
      <div class="container mb-4">
        <h1 class="mt-4 justify-content-center text-center">Add Product</h1>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('products.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                                        aria-describedby="emailHelp" value="{{ $data->name }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="judul"
                                        aria-describedby="emailHelp" value="{{ $data->judul }}">
                                </div>
                            </div>

                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Penulis</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" id="exampleInputEmail1" name="penulis"
                                      aria-describedby="emailHelp" value="{{ $data->penulis }}">
                              </div>
                          </div

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" placeholder="Input description here">{{ $data->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="date-field" class="form-label">Photo</label>
                                {{-- <br><img
                                    class="img mb-3"src="{{ asset('photo/' . $data->photo) }}"
                                    alt="" style="width: 90px" alt="">
                                <br> --}}
                                <input type="file" id="date-field" name="image"
                                    class="form-control" placeholder="Select Photo" />
                                <div class="invalid-feedback">Pilih Foto.</div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
  <script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
</html>