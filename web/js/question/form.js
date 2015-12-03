$(document).ready(function () {
    handleQuestionTypeInput();
    initHandlerQuestionTypeInput();
});

function handleQuestionTypeInput() {
    var questionType = $('#question-q_type').val();
    if (questionType == 1) {
        $('.field-question-answ_min').show();
        $('.field-question-answ_max').show();
        $('.field-question-israndom').show();
        $('.field-question-ivpresent').show();
        $('.field-question-openquestionanswermaxlength').hide();
        $('.question-answer-panel').show();
    } else if (questionType == 2) {
        $('.field-question-answ_min').hide();
        $('.field-question-answ_max').hide();
        $('.field-question-israndom').hide();
        $('.field-question-ivpresent').hide();
        $('.field-question-openquestionanswermaxlength').show();
        $('.question-answer-panel').hide();
    } else if (questionType == 3) {
        $('.field-question-answ_min').show();
        $('.field-question-answ_max').show();
        $('.field-question-israndom').show();
        $('.field-question-ivpresent').show();
        $('.field-question-openquestionanswermaxlength').hide();
        $('.question-answer-panel').show();
    }
}

function initHandlerQuestionTypeInput() {
    $('#question-q_type').change(function () {
        handleQuestionTypeInput();
    });
}

$(document).ready(function () {
    $(document).on('click', '.btn-create-answer-variant', function (e) {
        if (!$(this).is('[disabled')) {
            $.ajax({
                type: 'GET',
                url: $(this).attr('href'),
                success: function (response) {
                    if (response.status == true) {
                        $('.question-answer').replaceWith(response.data);
                        var questionAnswerForm = $('.question-answer-form');
                        if (questionAnswerForm.is(':visible')) {
                            questionAnswerForm.hide();
                        } else {
                            questionAnswerForm.show();
                        }
                    }
                },
                error: function () {
                    alert('Error was occurred. Please, try again.')
                }
            });
        }
        e.preventDefault();
    });

    $(document).on('submit', '#question-answer-form', function (e) {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (response) {
                if (response.status == true) {
                    location.reload();
                } else {
                    $('.question-answer').replaceWith(response.data);
                }
            },
            error: function () {
                alert('Error was occurred. Please, try again.')
            }
        });
        e.preventDefault();
    });

    $(document).on('click', '.question-answer-view', function (e) {
        $.ajax({
            type: 'GET',
            url: $(this).attr('href'),
            success: function (response) {
                if (response.status == true) {
                    $('.question-answer').replaceWith(response.data);
                    $('.question-answer-form').show();
                }
            },
            error: function () {
                alert('Error was occurred. Please, try again.')
            }
        });
        e.preventDefault();
    });

    $(document).on('click', '.question-answer-update', function (e) {
        $.ajax({
            type: 'GET',
            url: $(this).attr('href'),
            success: function (response) {
                if (response.status == true) {
                    $('.question-answer').replaceWith(response.data);
                    $('.question-answer-form').show();
                }
            },
            error: function () {
                alert('Error was occurred. Please, try again.')
            }
        });
        e.preventDefault();
    });

    $(document).on('click', '.question-answer-delete', function (e) {
        $.ajax({
            type: 'POST',
            url: $(this).attr('href'),
            success: function (response) {
                if (response.status == true) {
                    location.reload();
                }
            },
            error: function () {
                alert('Error was occurred. Please, try again.')
            }
        });
        e.preventDefault();
    });
});
