<html>
<head>
<!-- load all jQuery-Datatables library -->

<script type="text/javascript" src="<?php echo base_url()?>assets/js/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/datatables/dataTables.listboxPagination.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/datatables/dataTables.pipelining.js"></script>
<!-- instantiate dataTable -->

<script type="text/javascript">
    $(document).ready(function() {
        var oTable = $('#usertable').dataTable( {
            "oLanguage": {
                "sLengthMenu": " Show _MENU_ "
            },
            "bProcessing": true,
            "bServerSide": true,
            "sPaginationType": "listbox",
            "aLengthMenu": [[5, 10, 20, 30, 40, 50, 100], [5, 10, 20, 30, 40, 50, 100]],
            "bStateSave": true,
            "bAutoWidth": false,

            // call function user_listing in 'user' controller
            "sAjaxSource": "user/user_listing",
            "aoColumns": [
                { "bSortable": false, "sWidth": "20px"},
                null,
                null,
                null,
                null,
                { "sClass": "center", "bSortable": false }
            ],
            "fnServerData": fnDataTablesPipeline
        } );

        $('#check_all').click( function() {
            $('.rox', oTable.fnGetNodes()).attr('checked',this.checked);
        } );

    } );
</script>
</head>
<body>
    <table id="usertable" class="tablelist">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Active</th>
                <th style="text-align: center;" width="20"><input id="check_all" name="check" type="checkbox" /></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>
                </tr>
        </tbody>
    </table>
</body></html>

