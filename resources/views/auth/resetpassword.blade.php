<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>FABOCE S.R.L.</h2>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Nombre:</th>
                            <td>{{ auth()->user()->name }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ auth()->user()->email }}</td>
                        </tr>
                        <tr>
                            <th>Contrase&ntilde;a:</th>
                            <td>{{ $password }}</td>
                        </tr>
                    </table>
                    <br>
                    Cambio de contrase&ntilde;a satisfactoriamente.
                </div>
            </div>
        </div>
    </div>
</div>
