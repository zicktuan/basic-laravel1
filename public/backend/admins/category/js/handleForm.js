$(function() {
    $(document).on('click', '.btn-action-add-page-js', handleCreatePage);
    $(document).on('click', '.btn-action-update-page-js', handleUpdatePage);

});
function handleCreatePage(e) {

    e.preventDefault();

    let link = window.location.pathname.split('/')[1] + '/admin_cpanel/category/manage';

    let urlRequest = $(this).data('url');

    let cat_name = $('.cat-name').val(),
        cat_slug = $('.cat-slug').val(),
        cat_desc = $('.cat-description').val(),
        parent_id = $('.parent-id').val();

    $.ajax({
        type: 'POST',
        url: urlRequest,
        data: {
            cat_name,
            cat_slug,
            parent_id,
            cat_desc
        },
        success: (data) => {
            if (200 === data.code) {
                $('.info-after-sm').css('display', 'block');
                $('.info-after-sm').text('Thêm mới dữ liệu thành công');
                setTimeout(() =>{
                    $('.info-after-sm').css('display', 'none');
                }, 3000);

                document.location.href = document.location.origin + "/" +link;

            }
        }
    });
}

const handleUpdatePage = (e) => {

    e.preventDefault();

    let link = window.location.pathname.split('/')[1] + '/admin_cpanel/category/manage';

    let urlRequest = $('.request-url-update').val();

    let cat_name = $('.cat-name').val(),
        cat_slug = $('.cat-slug').val(),
        cat_desc = $('.cat-description').val(),
        parent_id = $('.parent-id').val();

    $.ajax({
        type: 'POST',
        url: urlRequest,
        data: {
            cat_name,
            cat_slug,
            parent_id,
            cat_desc
        },
        success: (data) => {
            if (200 === data.code) {
                $('.info-after-sm').css('display', 'block');
                $('.info-after-sm').text('Cập nhập dữ liệu thành công');
                setTimeout(() =>{
                    $('.info-after-sm').css('display', 'none');
                }, 3000);

                document.location.href = document.location.origin + "/" +link;
            }
        }
    });
};