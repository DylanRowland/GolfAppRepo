<?php require($_SERVER['DOCUMENT_ROOT'].'/functions.php');?>
<body>
<div class="container">
    <h2>Login</h2>
    <form action="/handlers/loginHandler.php" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Login" class="btn">
        </div>
    </form>
</div>
