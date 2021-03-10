$(function() {
    $(document).on('click', '.btn-action-del-js', handelDeletePage);
});


function handelDeletePage(e) {
    e.preventDefault();

    let self = this;

    let urlRequest = $(this).data('url');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                type: 'DELETE',
                url: urlRequest,
                success: (data) => {
                    if (200 === data.code){
                        $(self).parent().parent().remove();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                }
            })



        }
    });
}