<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <b>
    <div class="navbar" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active" style="display: inline;">
                <a class="nav-link" href="loggedin.php">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout ( <u>
                    <?php
                    include('db.php');
                    $sql = 'SELECT Name FROM user WHERE id="' . $_SESSION['user'] . '"';

                    $name = mysqli_fetch_assoc(mysqli_query($conn, $sql))['Name'];
                    echo $name;
                    ?></u> )
                </a>
            </li>
        </ul>
    </div>
    </b>
</nav>