<script>
    function logout()
    {
        if(confirm("Are you sure you want to Log Out?"))
        {
            localStorage.removeItem('token');
            window.location.href = "http://127.0.0.1:8000/";
        }
    }
</script>
</body>
</html>