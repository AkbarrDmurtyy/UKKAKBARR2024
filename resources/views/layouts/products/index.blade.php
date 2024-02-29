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
              <li class="nav-item">
                <a class="nav-link" href="/cetak">Cetak</a>
              </li>
            </ul>
          </div>
        </div>
        <form class="form" method="get" action="search">
          <div class="form-group w-100 mb-3">
              <label style="20px" for="search" class="d-block mr-2"><b>Pencarian</b></label>
              <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
              <button type="submit" class="btn btn-primary mb-1">Cari</button>
          </div>
      </form>
      </nav>

      {{-- ppp --}}
      <div class="container mb-4">
        <h1 class="mt-4 justify-content-center text-center">Buku</h1>
        <a href="/products/create" type="button" class="btn btn-primary">Add</a>
    </div>

    <div class="container">
        <div class="row">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Judul</th>
                        <th scope="col">penulis</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $row)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->judul }}</td>
                            <td>{{ $row->penulis }}</td>
                            <td>{{ $row->description }}</td>
                            <td>
                                <img src="{{ asset('image/' . $row->image) }}" alt=""
                                    width="150">
                            </td>
                            <td>
                              <a href="{{ route('products.edit', $row->id) }}" class="btn btn-warning">
                                  <i class="bi bi-pencil-square"></i> Edit
                              </a>
                              </td>
                              <td>
                                  <form action="{{ route('products.destroy', $row->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                                          <i class="bi bi-trash"></i> Delete
                                      </button>
                                  </form>
                              </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{$data->links()}} --}}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>