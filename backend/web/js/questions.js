$(".collapse-all-questions").on("click", function () {
    $(".collapse-block").slideToggle(function () {
        let bodyQuestion = $(this).find("h4");
        let titleQuestion = $(this).closest(".question").find(".card-title-question-name");

        if (!$(this).is(":visible")) {
            titleQuestion.text(bodyQuestion.text());
            bodyQuestion.text('');
        } else {
            bodyQuestion.text(titleQuestion.text());
            titleQuestion.text('');
        }
    });
});

$('.btn-save').on('click', function () {
    $('#dynamic-form').yiiActiveForm('submitForm');
});

$(document).on('click', '.btn-edit', function (event) {
    event.preventDefault();
    let url = $(this).attr('href');
    $('.modal-content').load(url, function () {
        let $form = $(this).find('form');
        $form.on('beforeSubmit', function () {
            let data = $form.serialize();
            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: data,
                success: function (data) {
                    $.pjax.reload({container: '#questionsList'});
                    $('.modal-content').empty();
                },
                error: function (jqXHR, errMsg) {
                    alert(errMsg);
                }
            });
            $("[data-dismiss=modal]").trigger({type: "click"});
            return false;
        })
    });
    $('.modal').appendTo('body');
});

$(document).ready(function () {
    // sortable('.sortable', 'serialize', {
    //     handle: '.sortable-handle',
    //     forcePlaceholderSize: true,
    //     itemSerializer: (serializedItem, sortableContainer) => {
    //         return {
    //             position:  serializedItem.index + 1,
    //             html: serializedItem.html
    //         }
    //     }
    // dropTargetContainerClass: 'sorting'
    // });
    $('.sortable').sortable({
        items: '.question',
        handle: '.sortable-handle',
        forcePlaceholderSize: true,
        opacity: .8,
        update: function (event, ui) {
            let lang = $('html').attr('lang');

            $.post({
                url: '/' + lang + '/question/question-order',
                data: {key: ui.item.attr('id'), pos: ui.item.index()},
                success: function () {
                    alert('перемещено')
                }
            });
        }
    });
});

$(document).on("pjax:success", function () {
    // document.location.replace();
});


// $('.change-status').on('change', function () {
// let id = $(this).closest('question').attr('id');
// console.log('sdg')
// })


// $(".btn-add").on("click", function (event) {
//     event.preventDefault();
//     $(".add-question").slideDown("fast");
//     $("#addQuestion").addClass("form-active");
//     $(".btn-cancel").on("click", function () {
//         $(".add-question").slideUp("fast");
//         // $("#addQuestion").removeClass("form-active");
//         // $(".btn-save").addClass("disabled");
//         // $(".btn-save").attr("disabled", "disabled");
//     });
//
//     $('html, body').animate({scrollTop: '0px'}, 300);
//     $(".btn-save").removeClass("disabled");
//     $(".btn-save").removeAttr("disabled");
//     $("<span class=\"badge badge-success badge-dot badge-dot-lg\"> </span>").appendTo(".btn-save");
// });
//
//
// $(document).on('click', '.collapse-all-questions', function () {
//     $(".collapse-block").slideToggle(function () {
//         let bodyQuestion = $(this).find("h4");
//         let titleQuestion = $(this).closest(".question").find(".card-title-question-name");
//
//         if (!$(this).is(":visible")) {
//             titleQuestion.text(bodyQuestion.text());
//             bodyQuestion.text('');
//         } else {
//             bodyQuestion.text(titleQuestion.text());
//             titleQuestion.text('');
//         }
//     });
// })
//
// $(".btn-save").on("click", function () {
//     $('form.form-active').each(function () {
//         let form = $(this);
//         console.log(form.attr("action"));
//         form.data('yiiActiveForm').submitting = true;
//         form.yiiActiveForm("validate");
//         form.on("beforeSubmit", function () {
//             var data = form.serialize();
//             $.ajax({
//                 url: form.attr('action'),
//                 type: 'POST',
//                 data: data,
//                 success: function (data) {
//                     $.pjax.reload({container: '#questionsList'});
//                 },
//                 error: function (jqXHR, errMsg) {
//                     alert(errMsg);
//                 }
//             })
//             return false; // prevent default submit
//         })
//     });
// });
//
// $(document).on({
//     beforeValidate: function (event, messages, deferreds) {
//         // Disable button or change text with find child of event variable.
//         $(".btn-save").attr("disabled", "disabled").addClass("disabled");
//         // $(".btn-save").addClass("disabled");
//     },
//     afterValidate: function (event, messages, errorAttributes) {
//         // Restore texts...
//         // $(".btn-save").removeAttr("disabled").removeClass("disabled");
//         // $(".btn-save").removeClass("disabled");
//
//     },
//     beforeSubmit: function (event, messages, errorAttributes) {
//         // if (!errorAttributes.length) {
//         //     $(".btn-save").attr("disabled", "disabled").addClass("disabled");
//         // }
//     },
//     ajaxComplete: function () {
//         $(".btn-save").attr("disabled", "disabled").addClass("disabled");
//         // $(".btn-save").addClass("disabled");
//         $(".btn-save").find("span").remove();
//     }
// });
//
//
// $(document).on("click", ".delete-all-questions", function (event) {
//     event.preventDefault();
//     let url = $(this).attr("href");
//     const swalWithBootstrapButtons = Swal.mixin({
//         customClass: {
//             confirmButton: 'btn btn-danger',
//             cancelButton: 'btn btn-success mr-2'
//         },
//         buttonsStyling: false
//     })
//
//     swalWithBootstrapButtons.fire({
//         title: 'Вы уверены?',
//         text: "Потом вопрос нельзя будет восстановить.",
//         icon: 'question',
//         showCancelButton: true,
//         confirmButtonText: 'Да, удалить',
//         cancelButtonText: 'Нет, отменить',
//         reverseButtons: true
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.post(url, function () {
//                 // do something
//             }).done(function (data) {
//                 // отображение подтверждения успешного удаления вопроса
//                 swalWithBootstrapButtons.fire(
//                     data.title,
//                     data.body,
//                     'success'
//                 );
//                 // перезагрузка списка вопросов
//                 $.pjax.reload({container: '#questionsList'});
//             }).error(function (jqXHR, errMsg) {
//                 swalWithBootstrapButtons.fire(
//                     alert(errMsg)
//                 )
//             });
//         } else if (
//             /* Read more about handling dismissals below */
//             result.dismiss === Swal.DismissReason.cancel
//         ) {
//         }
//     });
// })
//
// $(document).on("click", ".btn-edit-question", function (event) {
//     event.preventDefault();
// });
//
// $(document).on('click', '.btn-delete-question', function (event) {
//     event.preventDefault();
//     let url = $(this).attr("href");
//     const swalWithBootstrapButtons = Swal.mixin({
//         customClass: {
//             confirmButton: 'btn btn-danger',
//             cancelButton: 'btn btn-success mr-2'
//         },
//         buttonsStyling: false
//     })
//
//     swalWithBootstrapButtons.fire({
//         title: 'Вы уверены?',
//         text: "Потом вопрос нельзя будет восстановить.",
//         icon: 'question',
//         showCancelButton: true,
//         confirmButtonText: 'Да, удалить',
//         cancelButtonText: 'Нет, отменить',
//         reverseButtons: true
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.post(url, function () {
//                 // do something
//             }).done(function (data) {
//                 // отображение подтверждения успешного удаления вопроса
//                 swalWithBootstrapButtons.fire(
//                     data.title,
//                     data.body,
//                     'success'
//                 );
//                 // перезагрузка списка вопросов
//                 $.pjax.reload({container: '#questionsList'})
//             }).error(function (jqXHR, errMsg) {
//                 swalWithBootstrapButtons.fire(
//                     alert(errMsg)
//                 )
//             });
//         } else if (
//             /* Read more about handling dismissals below */
//             result.dismiss === Swal.DismissReason.cancel
//         ) {
//         }
//     });
// });
//
// $(document).ready(function () {
//     $("#sortable").sortable({
//         handle: "a.sort-question-handle"
//     });
//

// })
