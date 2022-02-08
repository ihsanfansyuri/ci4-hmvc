var success = $('#success').data('flash');
var failed = $('#failed').data('flash');

if (success) {
    Swal.fire({
        icon : 'success',
        title : 'Good job!',
        text : success
    })
} else if(failed) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: failed
    })
};

$(document).ready(function() {
    $('#btn_delete').on('click', function(e) {
        e.preventDefault();

        const action = $(this).attr('action');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data ini akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = action;
            }
        })
    })
})

// $(function() {
//     $('#btn_update').on('submit', function(e) {
//         e.preventDefault();

//         const form = $(this).attr('form')
//         const action = $(this).attr('action');

//         Swal.fire({
//             title: 'Simpan perubahan?',
//             showDenyButton: true,
//             showCancelButton: true,
//             confirmButtonText: 'Save',
//             denyButtonText: `Don't save`,
//         }).then((result) => {
//             /* Read more about isConfirmed, isDenied below */
//             if (result.isConfirmed) {
//                 location.href = form+action;
//             } else if (result.isDenied) {
//                 Swal.fire('Perubahan tidak disimpan', '', 'info')
//             }
//         })
//     })
// }) 

// function hapus() {
//     Swal.fire({
//         title: 'Apakah anda yakin?',
//         text: "You won't be able to revert this!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, delete it!'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             Swal.fire(
//                 'Deleted!',
//                 'Your file has been deleted.',
//                 'success'
//             )
//         }
//     })
// }

// $(function() {
//     $('#id_delete').on('click', function() {
//         Swal.fire({
//             title: 'Apakah anda yakin?',
//             text: "You won't be able to revert this!",
//             icon: 'warning',
//             showCancelButton: true,
//             confirmButtonColor: '#3085d6',
//             cancelButtonColor: '#d33',
//             confirmButtonText: 'Yes, delete it!'
//         }).then((result) => {
//             if (result.isConfirmed) {
//                 Swal.fire(
//                     'Deleted!',
//                     'Your file has been deleted.',
//                     'success'
//                 )
//             }
//         })
//     })
// });