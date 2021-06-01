<script>
    function addMoreBtnForCustomCustomEdit() {
        mesermenExitCount++;
        var html14 = "";
        html14 += '<tr class="CustomRowedit' + mesermenExitCount + '">';
        html14 += '<td>';
        html14 +=
            '<input  name="customValueInputEdit[]" type="text" value="" class="form-control" placeholder="Product Dimension"/>';
        html14 += '</td>';
        html14 += '</tr>';
        $('#CustomCustomEdit').append(html14)
    }

    function customRowRemoveEdit(id) {
        $('.CustomRowedit' + id).remove();
    }

</script>
