let elemR;

/**
 * get R from html
 */
function setR() {
    const formData = new FormData(document.getElementById('form'));
    elemR = formData.get('r_value');
}

const checkInput = function() {
    const elemY = $('#y-value-select');

    const point = $('#point');
    const value = Number(elemY.val().replace(',', '.'));
    const spaceY = elemY.val().trim().length;

    if (!spaceY > 0 || value < -5 || value > 5) {
        document.querySelector('#error').textContent = 'Y должен быть [-5;5]';
        point.attr('r', 0);
        return false;
    } else if (!isFinite(value)) {
        document.querySelector('#error').textContent = 'Y должен быть числом';
        point.attr('r', 0);
        return false;
    } else {
        document.querySelector('#error').textContent = ' ';
        const data = document.getElementById('x-value-select').value;
        const xValue = parseInt(data);
        setR();

        const calculatedX = 150 * (Number(xValue) / Number(elemR)) + 250;
        const calculatedY = -(((value * 150) / Number(elemR)) - 220);

        point.attr('r', 4);
        point.attr('cy', calculatedY);
        point.attr('cx', calculatedX);


        return true;
    }
};

const submit = function(e) {
    if (!checkInput()) {
        return;
    }
    const formData = new FormData(document.querySelector('#form'));

    superagent.post('php/check.php')
        .send(formData)
        .then((res) => {
          document.querySelector('#answer').innerHTML = res.text;
        });
};

const clear = function(e) {
    superagent.post('php/clear.php')
        .then((res) => {
          document.querySelector('#answer').innerHTML = res.text;
        });
};

document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('#clearButton').addEventListener('click', clear);
    document.querySelector('#submitButton').addEventListener('click', submit);
});


