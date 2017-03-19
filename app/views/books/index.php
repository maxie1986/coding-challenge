<script>
    $(document).ready(function() {
        var table = $("#table-books").DataTable({
            "processing": true,
            "serverSide": true,
            'scrollCollapse': true,
            'ordering': true,
            'order': [[0, 'asc']],
            'searching': true,
            'paging': true,
            "draw": true,
            "lengthMenu": [ [5, 10, 20, -1], [5, 10, 20, "All"] ],
            "pageLength": 10,
            "ajax": {
                "url": "/soft-exercise/public/index.php/books/get",
                data: []
            },
            'columns': [
                { data: 'id', name: 'Id', "sortable": true, 'searchable': true},
                { data: 'author', name: 'Author', "sortable": true, 'searchable': true},
                { data: 'title', name: 'Title', "sortable": true, 'searchable': true}
            ]
        });
    });
</script>
<div class="box">

    <div class="box-header with-border">
        <h3>Admin Books</h3>
    </div>

    <div class="box-body table-responsive">
        <table id="table-books" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>