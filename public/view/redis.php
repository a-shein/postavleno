<html>
<head>
    <title>Redis keys with value</title>
</head>
<body>
<script type="text/javascript">
    get()
    function get() {
        fetch('/api/redis')
            .then(response => response.json())
            .then(function (json) {
                let data = json.data

                if (json.code === 500) {
                    alert(data.message)
                } else {
                    Object.entries(data).forEach(entry => {
                        const [key, value] = entry;
                        document.writeln(`<li>${key}: ${value} <a id='${key}' href='/' onclick="del(this.id)">delete</a></li>`);
                    });
                }
            })
    }

    function del(key) {
        fetch('/api/redis/' + key, {
            method: 'DELETE'
        })
            .then(get)
            .then(document.location.reload())
    }
</script>
</body>
</html>