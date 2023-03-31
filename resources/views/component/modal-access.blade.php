<div class="modal fade modalAccess" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Select Access</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="display table table-striped table-hover" width="100%" style="text-align: center;">
                        <tbody>
                            <tr class="pilihAccess" data-access="master">
                                <td>Master</td>
                            </tr>
                            <tr class="pilihAccess" data-access="sales">
                                <td>Sales</td>
                            </tr>
                            <tr class="pilihAccess" data-access="admin">
                                <td>Admin</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <p><strong>BismaM</strong></p>
            </div>
        </div>
    </div>
</div>

@push('after-script')
<script>
    $(document).on('click', '.pilihAccess', function (e) {
        $('#access').val($(this).attr('data-access'));
        $('.modalAccess').modal('hide');
    });
</script>
@endpush
