<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>User Profile</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Name:</th>
                    <td>     <h1 class="welcome-msg">Welcome, {{ auth()->user()->name ?? 'Guest' }}!</h1></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>     <h1 class="welcome-msg">Welcome, {{ auth()->user()->email ?? 'Guest' }}!</h1></td>
                </tr>
                <tr>
                    <th>Password (Hashed):</th>
                    <td>     <h1 class="welcome-msg">Welcome, {{ auth()->user()->password ?? 'Guest' }}!</h1></td>
                </tr>
            </table>
        </div>
    </div>
</div>


</body>
</html>