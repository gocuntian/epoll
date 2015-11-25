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
    } else if (questionType == 2) {
        $('.field-question-answ_min').hide();
        $('.field-question-answ_max').hide();
        $('.field-question-israndom').hide();
        $('.field-question-ivpresent').hide();
        $('.field-question-openquestionanswermaxlength').show();
    } else if (questionType == 3) {
        $('.field-question-answ_min').show();
        $('.field-question-answ_max').show();
        $('.field-question-israndom').show();
        $('.field-question-ivpresent').show();
        $('.field-question-openquestionanswermaxlength').hide();
    }
}

function initHandlerQuestionTypeInput() {
    $('#question-q_type').change(function () {
        handleQuestionTypeInput();
    });
}
