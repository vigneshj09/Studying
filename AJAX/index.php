<script>
    $(document).ready(function() {
        $(".edit").click(function() {
            var id = $(this).closest("tr").find(".row_id").text();
            $.ajax({
                url: "edit.php",
                method: 'POST',
                data: { id: id },
                success: function(data) {
                    alert(data);
                    location.reload();
                }
            });
        });

        $(".delete").click(function() {
            var id = $(this).closest("tr").find(".row_id").text();
            $.ajax({
                url: "delete.php",
                method: 'GET',
                data: { id_1: id },
                success: function(data) {
                    console.log(data);
                }
            });
        });
    });
</script>
