<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<form id="form" method="post" action="otherpage.php" enctype="multipart/form-data">
    <input type="text" name="first" value="Bob" />
    <input type="text" name="middle" value="James" />
    <input type="text" name="last" value="Smith" />
    <input name="image" type="file" />
    <button type='button' id='submit_btn'>Submit</button>
</form>

<script>
    $(document).on("click", "#submit_btn", function(e) {
        //Prevent Instant Click  
        e.preventDefault();
        // Create an FormData object 
        var formData = $("#form").submit(function(e) {
            return;
        });
        //formData[0] contain form data only 
        // You can directly make object via using form id but it require all ajax operation inside $("form").submit(<!-- Ajax Here   -->)
        var formData = new FormData(formData[0]);
        $.ajax({
            url: $('#form').attr('action'),
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log(response);
            },
            contentType: false,
            processData: false,
            cache: false
        });
        return false;
    });
</script>